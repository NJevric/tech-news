<?php require_once("konekcija.php");?>
<?php

function postovi(){
    global $konekcija;
    $query = "SELECT p.naslovPost,p.autorPost,p.datumPost,p.tekst,ip.srcPost FROM postovi p INNER JOIN imgpostovi ip ON p.idImgPost = ip.idImgPost ORDER BY ASC p.datumPost";
    $rezultat = mysqli_query($konekcija, $query);
   while($row = mysqli_fetch_assoc($rezultat)):?>
       <div class="blog">
           <img class="img-fluid mb-4" src="img/<?=$row['srcPost']?>" alt="<?=$row['altPost']?>">
           <h2>
               <a href="#"><?=$row['naslovPost']?></a>
           </h2>
           <div class="d-flex">
               <p>by <a href="index.php"><?=$row['autorPost']?></a> /&nbsp;</p>
               <p> Posted on <?=$row['datumPost']?></p>
           </div>
           <div class="row my-3">
               <div class="col-lg-12 text-justify blogTekst">
                   <p><?=$row['tekst']?></p>
               </div>
           </div>
           <div class="row">
               <div class="col-lg-12 text-center mb-4">
                   <a class="btn dugme" href="#">Read More </a>
               </div>
           </div>
           <hr>
       </div>
   }
}