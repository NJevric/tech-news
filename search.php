<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<?php require_once("php_require/header.php"); ?>

<body>

   <?php require_once("php_require/navigation.php"); ?>

    
    <div class="container">

        <div class="row">
        <h1>
                        TechNews
                        <small>The Tech News World</small>
                    </h1>
            <div class="col-md-8">
            <?php 
                if(isset($_POST['submitSearch'])){
                    $search = $_POST['search'];
                    $query = $konekcija->prepare("SELECT * FROM postovi WHERE tagPost LIKE '%$search%'");
                    $rezultatBrojUpita = $query->execute();
                    $brojUpita=$query->rowCount();


                    if($brojUpita==0){
                        echo "<h1>No results for this Tag</h1>";
                    }   
                    else{?>
                        <?php
                         $query = "SELECT p.idPost,p.naslovPost,p.autorPost,p.datumPost,p.tekst,ip.srcPost FROM postovi p INNER JOIN imgpostovi ip ON p.idImgPost = ip.idImgPost WHERE p.tagPost LIKE '%$search%'";
                         $rezultat = $konekcija->query($query)->fetchAll();
                        
                        foreach( $rezultat as $i):?>
                        <?php $idPost=$i['idPost'];?>
                            <div class="blog">
                                <img class="img-fluid mb-4" src="img/<?=$i['srcPost']?>" alt="<?=$i['altPost']?>">
                                <h2>
                                    <a href="#"><?=$i['naslovPost']?></a>
                                </h2>
                                <div class="d-flex">
                                    <p>by <a href="#"><?=$i['autorPost']?></a> /&nbsp;</p>
                                    <p> Posted on <?=$i['datumPost']?></p>
                                </div>
                                <div class="row my-3">
                                    <div class="col-lg-12 text-justify blogTekst">
                                        <p><?=$i['tekst']?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 text-center mb-4">
                                        <a class="btn dugme" href="postid.php?id=<?=$idPost?>">Read More </a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        <?php endforeach;?>
                   <?php }
                }?>
            
            </div>

       
            <?php require_once("php_require/desniBlok.php")?>
        

     

      

    </div>
    <!-- /.container -->

    <?php require_once("php_require/footer.php")?>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>
