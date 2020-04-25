<!DOCTYPE html>
<html lang="en">

<?php require_once("php_require/header.php"); ?>

<body>

   <?php require_once("php_require/navigation.php"); ?>
   <main class="my-auto">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-9  col-11 mr-md-auto mx-auto py-5 mt-0 mt-md-5">
                        <h2 class="mb-3 mb-md-4">Contact</h2>
                        <p><strong>Adresa</strong> : <a href="https://goo.gl/maps/KNcwPdndytNwN7fE6">Jurija Gagarina, Novi Beograd</a></p>
                        <p><strong>Telefon</strong> : <a href="tel:+0621175230">062/113343</a></p>
                        <p><strong>Email</strong> : <a href="mailto:info@fashionx.com">info@technews.com</a></p>
                        <?php 
                            
                            if (isset($_POST['submitContact'])){
                                $ime=$_POST['ime'];
                                $prezime=$_POST['prezime'];
                                $email=$_POST['email'];
                                $tekst=$_POST['tekst'];
                                $to="nikola9@gmail.com";
                                mail($to,$ime,$prezime,$tekst);
                            }
                        ?>
                        <form id="kontaktForma" class="mb-0 mb-md-5" onsubmit="return proveraKontaktForma()" action="" method="post"> 
                            <div class="form-group">
                                
                                    <input type="text" class="form-control" id="ime" name="ime" placeholder="Name">
                                    <p class="greskaKontakt"></p>
                              
                            </div>
                            <div class="form-group">
                                
                                    <input type="text" class="form-control" id="prezime" name="prezime" placeholder="Lastname">
                                    <p class="greskaKontakt"></p>
                            
                            </div>        
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                <p class="greskaKontakt"></p>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" id="comment" name="tekst" placeholder="Your Comment (max characters 200)"></textarea>
                                <p class="greskaKontakt"></p>
                            </div>
                            <input type="submit" class="btn btn-primary" id="btnSubmit" name="submitContact"/>
                            <div id="greskaKontakt" class="float-none mt-4"></div>
                        </form>
                    
</div>
</div>
</div>
</main>
   <?php require_once("php_require/footer.php")?>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>
