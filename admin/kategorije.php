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
                    <h2 class="mb-4">Categories</h2>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                <?php 
                    if(isset($_SESSION['greska'])){
                        echo "<h4 class='mb-2'>" . $_SESSION['greska'] . "</h4>";
                        unset($_SESSION['greska']);
                    }
                ?>
                <form action="require/insertKat.php" method="post">
                    <div class="form-group">
                        <label for="naslov">Add Category</label>
                        <input type="text" class="form-control" name="naslovKat">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-danger" type="submit" name="submitKat" value="Add Category">
                    </div>
                </form>
                <form action="" method="post">
                        <div class="form-group">
                            <label for="naslov">Edit Category</label>
                            <?php updateKat(); ?>
                        <div class="form-group">
                            <input class="btn btn-danger" type="submit" name="updateKat" value="Edit Category">
                        </div>
                        
                </form>
                </div>
            </div>
            <div class="col-lg-6 mx-auto">
                            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        prikaziSveKat();
                                
                        deleteKat();
                           
                    ?>
                </tbody>
                </table>
            </div>
            
            <!-- /.row -->
            
        </div>
      
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>