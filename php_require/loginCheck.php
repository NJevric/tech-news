<?php
    session_start();
    if(isset($_POST["btnLogin"])){

        $username=$_POST["usernameLog"];
        $lozinka=$_POST["passLog"];
    
        $greske=[];
    
        if(!preg_match("/^.{5,50}/", $username)){
            $greske[]="Enter valid username format (min 5 / max 60 characters)";
        }
        if(!preg_match("/^.{5,60}$/", $lozinka)){
            $greske[]="Enter valid password format (min 5 / max 50 characters)";
        }
    
        if(count($greske)){
            $_SESSION["greskeLog"]=$greske;
            header("Location: ../login.php");
        }
        else{

            require("konekcija.php");

            $priprema = $konekcija->prepare("SELECT * from users u inner join uloge ul on u.idUloga=ul.idUloga where username=:username and password=:pass");

            $priprema->bindParam(":username",$username);
            $pass = md5($lozinka);
            $priprema->bindParam(":pass", $pass);
            $priprema->execute();

            if($priprema->rowCount()==1){
                $korisnik=$priprema->fetch();
              
                $_SESSION['korisnik']=$korisnik;
              
                header("Location: ../index.php");
            }else{
                $_SESSION["greskeLog"]=["Korisnik sa unetim podacima ne postoji"];
                header("location: ../login.php");
            }
        }
    }
    else{
        $_SESSION['greskeLog'] = $greske;
    }
?>