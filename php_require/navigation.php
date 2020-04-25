<?php require_once("konekcija.php");
 ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav">
        <div class="container">
        <a class="navbar-brand mr-5" href="index.php"> TechNews</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <?php
              $query = "SELECT * FROM nav";
              $rezultat = $konekcija->query($query)->fetchAll();
              ?>
              <?php
              
              
              foreach( $rezultat as $i):?>
                <?php $navNaslov = $i['naslov'];
                if(!isset($_SESSION['korisnik'])){
                  if($i['naslov']=='Logout'){continue;}
                  if($i['naslov']=='AdminPanel'){continue;}
                }
                if(isset($_SESSION['korisnik'])){
                  if($i['naslov']=='Login'){continue;}
                  if($i['naslov']=='Register'){continue;}
                }
                if (isset($_SESSION['korisnik']) && $_SESSION['korisnik']['imeUloga']=='korisnik'){
                  if($i['naslov']=='AdminPanel'){continue;}
                }
                
                ?>
                <li><a href="<?=$i['link']?>"><?=$navNaslov?></a></li>
              <?php endforeach;?>
          </ul>
          
        </div>
    </div>
      </nav>