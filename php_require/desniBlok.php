<?php require_once("php_require/konekcija.php"); ?>
<div class="col-md-3 col-11 mx-auto mx-md-0 ml-md-auto desniInfo">

                <div class="desniBlok">
                    <h4 class="mb-3 text-uppercase">Search</h4>
                    <form action="search.php" method="post">
                        <div class="input-group my-4">
                            <input type="text" name="search" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button name="submitSearch" class="btn btn-primary searchIcon" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                   
                </div>

            
                <div class="desniBlok">
                    <h4 class="mb-3 text-uppercase">Blog Categories</h4>
                    <div class="row my-4">
                        <div class="col-lg-10 text-left">
                            <ul class="list-unstyled pl-3 kategorije">
                               
                            <?php
                                $query = "SELECT * FROM kategorije";
                                $rezultat = $konekcija->query($query)->fetchAll();
                               
                                foreach($rezultat as $i):?>
                                <li><a href="postcat.php?idKat=<?=$i['idKat'] ?>"><?=$i['naslovKat'] ?></a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        
                    </div>
                  
                </div>

            
                

            </div>

        </div>