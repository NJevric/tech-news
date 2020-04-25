<?php
session_start();
if(!isset($_SESSION['korisnik']) || $_SESSION['korisnik']['imeUloga']=='korisnik'){
	header("Location:403.php");
}
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("require/headerAdmin.php");
require_once("require/funkcijeAdmin.php");

?>
<body>
<div class="wrapper d-flex align-items-stretch adminPanel">
		<?php require_once("require/navigacijaAdmin.php");?> 
        <div class="container">
        
        <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="mb-4">Posts</h2>
                    
                </div>
                <div class="col-lg-12 col-11 table-responsive mx-auto tabele">
                <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Category</th>
                        
                        <th>Image</th>
                        <th>Tags</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                       
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $query = "SELECT p.idPost, p.naslovPost,p.autorPost,p.datumPost,p.tekst,p.tagPost,ip.srcPost,k.naslovKat FROM postovi p INNER JOIN imgpostovi ip ON p.idImgPost = ip.idImgPost INNER JOIN kategorije k ON p.idKat = k.idKat";
                    $rezultat = $konekcija->query($query)->fetchAll();
                    ?>
            
                    <?php foreach($rezultat as $i):?>
                        <?php $idPost=$i['idPost']?>
                    <tr>
                        <td><?=$i['idPost']?></td>
                        <td><?=$i['autorPost']?></td>
                        <td><?=$i['naslovPost']?></td>
                        <td><?=$i['naslovKat']?></td>
                        
                        <td><img src="../img/<?=$i['srcPost']?>" class="slikaPostTabela"></td>
                        <td><?=$i['tagPost']?></td>
                        
                        <td><?=$i['datumPost']?></td>
                       
                        <td><a href="postovi.php?edit=<?=$idPost?>">Edit</a></td>
                        <td><a href="postovi.php?delete=<?=$idPost?>">Delete</a></td>
                    </tr>
                    <?php endforeach;?>

                    
                    <?php
                        if(isset($_GET['delete'])){
                        $delete = $_GET['delete'];
                        $query="DELETE FROM postovi WHERE idPost = $delete";
                        
                        $obrisiPost = $konekcija->exec($query);
                        
                    }?>
                </tbody>
                </table>
              
                </div>
                <?php if (isset($_GET['edit'])):?>
            
                    <?php 
                    $editId=$_GET['edit'];
                    // echo $editId;
                    $queryEdit = "SELECT * FROM postovi WHERE idPost=$editId";
                    $rezultatEdit = $konekcija->query($queryEdit)->fetch();
                    ?>
                    <?php
                        $postNaslov=$rezultatEdit['naslovPost'];
                        $autorIme=$rezultatEdit['autorPost'];
                     
                        $tag=$rezultatEdit['tagPost'];
                        $tekst=$rezultatEdit['tekst'];
                        $idImg=$rezultatEdit['idImgPost'];
                    ?>

               <div class="col-lg-6 col-11 table-responsive mr-auto">
               <h2 class="mt-5 mb-4">Edit Post</h2>
                  <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label for="naslov">Post Title</label>
                      <input type="text" class="form-control" name="naslov" value="<?=$postNaslov ?>">
                  </div>
                  <div class="form-group">
                      <label for="postKat">Post Category ID</label>
                      <select class="form-control" name="postKat">
                              
                              <?php $query1="SELECT * FROM kategorije";
                              $rezultat=$konekcija->query($query1)->fetchAll();
                              foreach($rezultat as $i):?>
                                  <option value="<?=$i['idKat'] ?>"><?=$i['naslovKat'] ?></option>
                              <?php endforeach;?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="autor">Post Author</label>
                      <input type="text" class="form-control" name="autor" value="<?= $autorIme ?>">
                  </div>
                  
                  <div class="form-group">
                      <label for="slika">Post Image</label>
                      <img src=""/>
                      <input type="file" class="form-control" name="slika" >
                  </div>
                  <div class="form-group">
                      <label for="tag">Post Tags</label>
                      <input type="text" class="form-control" name="tag" value="<?= $tag ?>">
                  </div>
                  <div class="form-group">
                      <label for="tekst">Post Content</label>
                      <textarea class="form-control" name="tekst" ><?=$tekst?></textarea>
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn btn-danger" name="editPost" value="Publish">
                  </div>
              </form>
              </div>
              <?php if (isset($_POST['editPost'])){
                 
                     $naslov=$_POST['naslov'];
                   
                     $postKat=$_POST['postKat'];

                     $autor=$_POST['autor'];
                   
                    //  $status=$_POST['status'];
                
                    
                     $tag=$_POST['tag'];
                 
                     $tekst=$_POST['tekst'];
                
                     $datum = date('d-m-y');
                        
                     $slika=$_FILES['slika']['name'];
                        $temp_slika = $_FILES['slika']['tmp_name'];
                        if(isset($slika) and !empty($slika)){
                            $location = '../img/';      
                            if(move_uploaded_file($temp_slika, $location.$slika)){
                                echo 'File uploaded successfully';
                                
                            }
                        } else {
                            echo 'You should select a file to upload !!';
                        }
                        $queryImgPost="UPDATE imgpostovi i INNER JOIN postovi p ON i.idImgPost = p.idImgPost SET srcPost='$slika' WHERE i.idImgPost = $idImg";
                        if ($konekcija->query($queryImgPost)) {
                            $last_id = $konekcija->lastInsertId();
                            $queryUpdate = "UPDATE postovi SET naslovPost = '$naslov', autorPost = '$autor', datumPost=now(), tagPost='$tag', tekst='$tekst' , idKat=$postKat WHERE idPost = $editId";

                        
                        }
                    // $queryUpdate = "UPDATE postovi SET naslovPost = '$naslov', autorPost = '$autor', status='$status', datumPost=now(), tagPost='$tag',  tekst='$tekst' , idKat=$postKat WHERE idPost = $editId";
                    // $queryUpdate = "UPDATE kategorije SET naslovKat = 'Telefoni' WHERE idKat = $editId";
                    $rezultatImgPost = $konekcija->exec($queryImgPost);
                    $rezultatUpdate = $konekcija->exec($queryUpdate);
                    header("Location:postovi.php");
                }?>  
                <?php endif;?>
               
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>