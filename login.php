<?php
    session_start();  
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8"/>
        <title>Photos for everyone / Register</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
    <header id="register_login">  
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-6 mx-auto my-auto">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            
                            <h1 class="text-center mb-4 text-uppercase profilna">Login</h1>
                            <?php 
                                if(isset($_SESSION['uspeh'])){
                                    echo "<h3 class='text-center mb-5'>" . $_SESSION['uspeh'] . "</h3>";
                                    unset($_SESSION['uspeh']);
                                }
                            ?>
                            <p class="text-center mb-3 mb-md-5">Welcome back</p>
                            <form action="php_require/loginCheck.php" method="POST" onSubmit="return proveraLogin();">
                                <div class="form-group row">
                                    <div class="col-lg-12 col-10 mb-0 mb-md-0 mx-auto">
                                        <input type="text" class="form-control" name="usernameLog" id="usernameLog" placeholder="Username"/>
                                         <p class="greskaKontakt"></p>
                                    </div>
                                    <div class="col-lg-12 col-10 mb-3 mb-md-0 mx-auto">
                                        <input type="password" class="form-control" name="passLog" id="passLog" placeholder="Password"/>
                                        <p class="greskaKontakt"></p>
                                    </div>
                                    <div class="col-lg-12 col-10 mb-3 mb-md-0 mx-auto">
                                        <input type="submit" class="btn-primary form-control" name="btnLogin" value="Login"/>
                                        <p class="text-center mt-4">Don't have an account? <a href="register.php">Join</a></p>
                                    </div>
                                    <?php 
                                        if (isset($_SESSION['greskeLog'])){
                                            foreach($_SESSION['greskeLog'] as $greska){
                                                echo "<p>$greska</p>";
                                            }
                                            unset($_SESSION["greskeLog"]);
                                        }
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
    <script type="text/javascript"  src="js/main.js"></script>
    </body>
</html>
