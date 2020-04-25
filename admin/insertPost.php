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
// require_once("require/funkcijeAdmin.php");

?>
<body>
<div class="wrapper d-flex align-items-stretch adminPanel">
		<?php require_once("require/navigacijaAdmin.php");?> 
        <div class="container">
        
        <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- <h2 class="mb-4">Add Post</h2> -->
                    
                </div>
                <div class="col-lg-6 col-11 table-responsive mr-auto">
                <?php 
                     if (isset($_POST['insertPost'])){
                 
                        $naslov=$_POST['naslov'];
                      
                        $postKat=$_POST['postKat'];
   
                        $autor=$_POST['autor'];
      
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
                       
                            $queryImgPost="INSERT INTO imgpostovi (srcPost,altPost) VALUES ('$slika','Opis Slike')";
                            if ($konekcija->query($queryImgPost)){
                            $last_id = $konekcija->lastInsertId();
                            $queryInsert="INSERT INTO postovi (idPost,naslovPost,tekst,autorPost,datumPost,tagPost,idImgPost,idKat) VALUES (NULL,'$naslov','$tekst','$autor',now(),'$tag',$last_id,$postKat)";
                        }
                        
                        
                        $rezultatImgPost = $konekcija->exec($queryImgPost);
                        
                        $rezultat=$konekcija->exec($queryInsert);
                       
                    }

                ?>
       <h2 class="mb-4">Add Post</h2>        
<form action="insertPost.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="naslov">Post Title</label>
        <input type="text" class="form-control" name="naslov">
    </div>
    <div class="form-group">
        <label for="postKat">Post Category ID</label>
        <select class="form-control" name="postKat">
                
                <?php $query1="SELECT * FROM kategorije";
                $rezultat=$konekcija->query($query1);
                foreach($rezultat as $i):?>
                    <option value="<?=$i['idKat'] ?>"><?=$i['naslovKat'] ?></option>
                <?php endforeach;?>
        </select>
        <!-- <input type="text" class="form-control" name="postKat"> -->
    </div>
    <div class="form-group">
        <label for="autor">Post Author</label>
        <input type="text" class="form-control" name="autor">
    </div>
    
    <div class="form-group">
        <label for="slika">Post Image</label>
        <input type="file" class="form-control" name="slika">
    </div>
    <div class="form-group">
        <label for="tag">Post Tags</label>
        <input type="text" class="form-control" name="tag">
    </div>
    <div class="form-group">
        <label for="tekst">Post Content</label>
        <textarea class="form-control" name="tekst"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-danger" name="insertPost" value="Publish">
    </div>
</form>

</div>

        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>