<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<?php require_once("php_require/header.php"); ?>

<body>
   <?php require_once("php_require/navigation.php"); ?>

    <div class="container">
    <h1>TechNews <small>The Tech News World</small></h1>
        <div class="row">
            
            <!-- Blog Post Content Column -->
            <div class="col-md-8 col-11 mx-auto mx-md-0">
                <?php 
                    if(isset($_GET['id'])){

                    $idPost=$_GET['id'];
                    $query = "SELECT p.naslovPost,p.autorPost,p.datumPost,p.tekst,ip.srcPost FROM postovi p INNER JOIN imgpostovi ip ON p.idImgPost = ip.idImgPost WHERE idPost=$idPost";
                   
                    $rezultat=$konekcija->query($query)->fetch();
                    ?>
                    
                    <div class="blog">
                        <img class="img-fluid mb-4" src="img/<?=$rezultat['srcPost']?>" alt="Opis">
                        <h2><a href="#"><?=$rezultat['naslovPost']?></a></h2>
                        <div class="d-flex">
                            <p>by <a href="index.php"><?=$rezultat['autorPost']?></a> /&nbsp;</p>
                            <p> Posted on <?=$rezultat['datumPost']?></p>
                        </div>
                        <div class="row my-3">
                            <div class="col-lg-12 text-justify blogTekst">
                                <p><?=$rezultat['tekst']?></p>
                              
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="well">
                                    <h4>Leave a Comment:</h4>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                <input type="text" class="form-control" name="imeAutor" placeholder="Username">
                                                </div>
                                                <div class="col-lg-6">
                                                <input type="text" class="form-control" name="emailAutor" placeholder="Email">
                                                </div>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" name="tekstKomentar"></textarea>
                                        </div>
                                        <input type="submit" class="btn btn-primary mb-5" name="submitKomentar">
                                    </form>
                                    <!-- INSERT KOMENTARI -->
                                    <?php 
                                        if(isset($_POST['submitKomentar'])){

                                        $idPost=$_GET['id']; 
                                        $imeAutor=$_POST['imeAutor'];
                                        $emailAutor=$_POST['emailAutor'];
                                        $tekstKomentar=$_POST['tekstKomentar'];
                                      
                                        $queryKomentarInsert="INSERT INTO komentari  VALUES (NULL,$idPost,'$imeAutor','$emailAutor','$tekstKomentar','Unapproved',now())";
                                        $rezultatKomentarInsert = $konekcija->exec($queryKomentarInsert);
                                        }

                                     ?>
                                   
                                </div>

                                <?php
                                    $queryKomentari="SELECT * FROM komentari k INNER JOIN postovi p ON k.postId=p.idPost WHERE k.postId = $idPost AND komentarStatus='Approved' ORDER BY idKomentar DESC";
                                    $rezultatKomentari=$konekcija->query($queryKomentari)->fetchAll();
                                    foreach($rezultatKomentari as $i):?>
                                             <div class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                                                 </a>
                                                <div class="media-body mb-4 ml-4">
                                                    <h4 class="media-heading mb-3"><?=$i['komentarAutor']?>
                                                    <small><?=$i['komentarDatum']?></small>
                                                    </h4>
                                                    <p><?=$i['komentarTekst']?> </p>
                                                </div>
                                            </div>
                                    <?php endforeach;?>
                                

                               

                        
                            </div>
                        </div>
                        <hr>
                    </div>
                   
                <?php }
                ?>
            </div> 
                   
            <?php require_once("php_require/desniBlok.php")?>
        </div>
    </div>
        
    <?php require_once("php_require/footer.php")?>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>
