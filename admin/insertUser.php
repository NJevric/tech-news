<?php
session_start();
if(!isset($_SESSION['korisnik']) || $_SESSION['korisnik']['imeUloga']!='admin'){
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
                    if(isset($_POST['insertUser'])){

                        
                        $ime=$_POST['ime'];
                        $prezime=$_POST['prezime'];
                        $username=$_POST['username'];
                        $ulogaId=$_POST['uloga'];
                        $email=$_POST['email'];
                        
                       
                        $password=$_POST['password'];
                       $lozinka=md5($password);

                      

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
                        // $queryNaslovKat = "INSERT INTO kategorije (naslovKat) VALUES ('$postKat')";
                        $queryImgPost="INSERT INTO userimg (srcUser,altUser) VALUES ('$slika','User Profile Picture')";
                        if ($konekcija->query($queryImgPost)) {
                            $last_id = $konekcija->lastInsertId();
                            $query="INSERT INTO users VALUES (NULL,'$ime','$prezime','$username','$email','$lozinka',now(),$ulogaId,$last_id)";
                        
                        }
                        
                        $rezultatImgPost = $konekcija->exec($queryImgPost);
                        
                        $rezultat = $konekcija->exec($query);
                       
                    }

                ?>
       <h2 class="mb-4">Add Usser</h2>        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ime">First Name</label>
                <input type="text" class="form-control" name="ime">
            </div>
            <div class="form-group">
                <label for="prezime">Last Name</label>
                <input type="text" class="form-control" name="prezime">
            </div>
            <div class="form-group">
                <label for="uloga">Role</label>
                <select class="form-control" name="uloga">
                
                    <?php $query1="SELECT * FROM uloge";
                    $rezultat=$konekcija->query($query1);
                    foreach($rezultat as $i):?>
                        <option value="<?=$i['idUloga'] ?>"><?=$i['imeUloga'] ?></option>
                    <?php endforeach;?>
                 </select>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
            </div>            
            <div class="form-group">
                <label for="slika">Profile Image</label>
                <input type="file" class="form-control" name="slika">
            </div>
   
            <div class="form-group">
                <input type="submit" class="btn btn-danger" name="insertUser" value="Publish">
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