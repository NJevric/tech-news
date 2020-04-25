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
;
?>
<body>
<div class="wrapper d-flex align-items-stretch adminPanel">
		<?php require_once("require/navigacijaAdmin.php");?> 
        <div class="container">
        
        <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="mb-4">Comments</h2>
               
                </div>
                <div class="col-lg-12 col-11 table-responsive mx-auto tabele">
                <table class="table table-hover overflow-auto">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Author</th>
                        <th>Comment</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Response</th>
                        <th>Approve</th>
                        <th>Unapprove</th>
                        
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    
                    $query="SELECT * FROM komentari INNER JOIN postovi ON komentari.postId=postovi.idPost";
                    $rezultat=$konekcija->query($query);
                    ?>
            
                    <?php foreach($rezultat as $i):?>
                      <?php $idKom=$i['idKomentar'];?>
                    <tr>
                        <td><?=$i['idKomentar']?></td>
                        <td><?=$i['komentarAutor']?></td>
                        <td class="tekstKomentar"><?=$i['komentarTekst']?></td>
                        <td><?=$i['komentarEmail']?></td>
                        <td class="w-50"><?=$i['komentarStatus']?></td>
                        
                        <td><?=$i['komentarDatum']?></td>
                        <td><?=$i['naslovPost']?></td>
                       
                        
                       
                        <td><a href="komentariAdmin.php?approve=<?=$idKom?>">Approve</a></td>
                        <td><a href="komentariAdmin.php?unapprove=<?=$idKom?>">Unapprove</a></td>
                      
                        <td><a href="komentariAdmin.php?delete=<?=$idKom?>">Delete</a></td>
                    </tr>
                    <?php endforeach;?>

                    
                    <?php
                        if(isset($_GET['delete'])){
                        $delete = $_GET['delete'];
                        $queryKomentarDelete="DELETE FROM komentari WHERE idKomentar=$delete";
                        $rezultatKomentarDelete=$konekcija->query($queryKomentarDelete);
                        header("Location: komentariAdmin.php");
                    }?>
                    <?php
                        if(isset($_GET['unapprove'])){
                        $unapprove = $_GET['unapprove'];
                        $queryKomentarUnapprove="UPDATE komentari SET komentarStatus='Unapproved' WHERE idKomentar=$unapprove";
                        $rezultatKomentarUnapprove=$konekcija->exec($queryKomentarUnapprove);
                        header("Location: komentariAdmin.php");
                    }?>
                     <?php
                        if(isset($_GET['approve'])){
                        $approve = $_GET['approve'];
                        $queryKomentarApprove="UPDATE komentari SET komentarStatus='Approved' WHERE idKomentar=$approve";
                        $rezultatKomentarApprove=$konekcija->exec($queryKomentarApprove);
                        header("Location: komentariAdmin.php");
                    }?>
                    
                </tbody>
                </table>
              
                </div>
                <?php if (isset($_GET['edit'])):?>
            
                    <?php 
                    $editId=$_GET['edit'];
                    // echo $editId;
                    $queryEdit = "SELECT * FROM postovi WHERE idPost=$editId";
                    $rezultatEdit = mysqli_query($konekcija, $queryEdit);
                    ?>
                    <?php while($row = mysqli_fetch_assoc($rezultatEdit)){
                        $postNaslov=$row['naslovPost'];
                        $autorIme=$row['autorPost'];
                        $status=$row['status'];
                        $tag=$row['tagPost'];
                        $tekst=$row['tekst'];
                        $idImg=$row['idImgPost'];
                    }?>

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
                              $rezultat=mysqli_query($konekcija,$query1);
                              while($row=mysqli_fetch_assoc($rezultat)):?>
                                  <option value="<?=$row['idKat'] ?>"><?=$row['naslovKat'] ?></option>
                              <?php endwhile;?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="autor">Post Author</label>
                      <input type="text" class="form-control" name="autor" value="<?= $autorIme ?>">
                  </div>
                  <div class="form-group">
                      <label for="status">Post Status</label>
                      <input type="text" class="form-control" name="status" value="<?= $status ?>">
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
                   
                     $status=$_POST['status'];
                
                    
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
                        if (mysqli_query($konekcija, $queryImgPost)) {
                            $last_id = mysqli_insert_id($konekcija);
                            $queryUpdate = "UPDATE postovi SET naslovPost = '$naslov', autorPost = '$autor', status='$status', datumPost=now(), tagPost='$tag',  tekst='$tekst' , idKat=$postKat WHERE idPost = $editId";

                        
                        }
                    // $queryUpdate = "UPDATE postovi SET naslovPost = '$naslov', autorPost = '$autor', status='$status', datumPost=now(), tagPost='$tag',  tekst='$tekst' , idKat=$postKat WHERE idPost = $editId";
                    // $queryUpdate = "UPDATE kategorije SET naslovKat = 'Telefoni' WHERE idKat = $editId";
                    $rezultatImgPost = mysqli_query($konekcija,$queryImgPost);
                    $rezultatUpdate = mysqli_query($konekcija,$queryUpdate);
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