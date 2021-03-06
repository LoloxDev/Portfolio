<?php
    include_once dirname(__FILE__) . './fonctions/connexion_sgbd.php';
    $sgbd= connexion_sgbd();
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Loris Labarre</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/normalizer.css" />
        <link rel="stylesheet" href="css/fullpage.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link rel="shortcut icon" href="img/bitmoji.png"/>
        <link rel="apple-touch-icon" href="img/bitmoji.png"/>
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
        <link
            rel="stylesheet"
            media="screen and (max-width: 1400px)"
            href="media-querries/media-1400.css"
        />
        <link
            rel="stylesheet"
            media="screen and (max-width: 1200px)"
            href="media-querries/media-1200.css"
        />
        <link
            rel="stylesheet"
            media="screen and (max-width: 1000px)"
            href="media-querries/media-1000.css"
        />
        <link
            rel="stylesheet"
            media="screen and (max-width: 750px)"
            href="media-querries/media-750.css"
        />
        <link
            rel="stylesheet"
            media="screen and (max-width: 600px)"
            href="media-querries/media-600.css"
        />
        <link
            rel="stylesheet"
            media="screen and (max-width: 400px)"
            href="media-querries/media-400.css"
        />
        <link
            rel="stylesheet"
            media="screen and (max-height: 750px) and (max-width: 550px)"
            href="media-querries/media-750-550.css"
        />

        <link rel="stylesheet/less" type="text/css" href="css/monStyle.less">
        <link rel="stylesheet/scss" type="text/css" src="https://cdn.jsdelivr.net/gh/alphardex/aqua.css@master/dist/aqua.min.css">
        <script src="https://cdn.jsdelivr.net/npm/less@4" ></script>
        <script src="https://code.createjs.com/easeljs-0.7.1.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.9/fullpage.min.js" integrity="sha512-JSVRnP8UFs0ieN/cvP9v4vmW1CotIaEKKN7W+4JaKNrllZolTv2aJfVGn4BFdfZ1jRZxgTAAaXWdlZbEm9iwFA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
        <script
            type="text/javascript"
            src="https://rawgit.com/akm2/simplex-noise.js/master/simplex-noise.js"
        ></script>

        <link
            href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Comic+Neue:wght@300&family=Montserrat&family=Montserrat+Alternates&family=Oswald&family=Playball&display=swap"
            rel="stylesheet"
        />
    </head>
    <body>
        <div id="fullpage">
            <canvas id="projector"
                >Your browser does not support the Canvas element.</canvas
            >
            

            <div class="section a1">
                
                <div id="connect">
                    <form action="exec/verifications.php" method="POST">

                        <div class="flexform">
                            <h1>Connexion</h1>
                            <button
                            type="button"
                            class="btnForm cancel"
                            onclick="closeForm2()"
                            >
                                X
                            </button>
                        </div>
                        <label><b>Nom d'utilisateur</b></label>
                        <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
        
                        <label><b>Mot de passe</b></label>
                        <input type="password" placeholder="Entrer le mot de passe" name="password" required>
        
                        <input type="submit" id='submit' value='LOGIN' >
                        
                    </form>
                </div>
                <header class="nav" id="nav">
                    <a href="#section1" class="btn">
                        <div class="arrow arrow1">
                            <div class="arrow arrow2"></div>
                            <span class="s1">olo</span>
                            <span class="s2">X</span>
                            <span class="s3">Dev</span>
                            <div class="littleArrow arrow3"></div>
                            <div class="littleArrow arrow4"></div>
                        </div>
                    </a>

                    <nav>
                        <ul id="myMenu">
                            <li>
                                <a href="#section2"> Projets </a>
                            </li>

                            <li>
                                <a href="#section3"> Parcours </a>
                            </li>

                            <li>
                                <a href="#section4"> Comp??tences </a>
                            </li>

                            <li>
                                <a href="#section5"> Pr??sentation </a>
                            </li>

                            <li>
                                <a href="CV_STAGE.pdf" download>
                                    <span class="iconify" data-icon="academicons:cv-square" style="color: white; font-size: 50px;"></span>
                                </a>
                            </li>
                        </ul>

                        <a class="cup" <?php if(empty($_SESSION['username'])) {  
                            echo 'onclick="openForm2()"';
                         } else {
                            echo 'href="php/index.php"';
                         } ?> ></a>
                    </nav>
                </header>

                <section>
                    <h1>Labarre Loris</h1>

                    <h3>D??veloppeur FULL Stack</h3>

                    <div id="community">
                        <a href="https://github.com/LoloxDev">
                            <img
                                src="img/icons8-githubb.svg"
                                alt="Icone de github"
                            />
                        </a>
                        <a href="https://www.linkedin.com/in/loris-labarre/">
                            <img
                                src="img/icons8-linkedin-entoure.svg"
                                alt="Icone de linkedin"
                            />
                        </a>
                    </div>

                    <div class="open-btn portfolio-experiment" id="openBtn">
                        <a>
                            <button
                                class="open-button text"
                                onclick="openForm()"
                            >
                                <strong>Contactez moi</strong>
                            </button>
                            <span class="line -right"></span>
                            <span class="line -top"></span>
                            <span class="line -left"></span>
                            <span class="line -bottom"></span>
                        </a>
                        <div class="portrait">
                            <img src="img/bitmoji.png" alt="Mon portrait" />
                        </div>
                    </div>

                    <div class="login-popup">
                        <div class="form-popup" id="popupForm">
                            
                                <form
                                    action="php/mail.php"
                                    class="form-container"
                                    method="post"
                                >
                                    <div class="flexform">
                                        <h2>Une id??e ? Un projet ? Parlons-en !</h2>

                                        <button
                                        type="button"
                                        class="btnForm cancel"
                                        onclick="closeForm()"
                                        >
                                            X
                                        </button>
                                    </div>

                                    <label for="name">
                                        <strong>Nom / Prenom</strong>
                                    </label>
                                    <input
                                        type="text"
                                        id="name"
                                        placeholder="Nom/Prenom"
                                        name="name"
                                        required
                                    />

                                    <label for="email">
                                        <strong>E-mail</strong>
                                    </label>
                                    <input
                                        type="email"
                                        id="email"
                                        placeholder="Votre Email"
                                        name="email"
                                        required
                                    />

                                    <label for="tel">
                                        <strong>T??l??phone</strong>
                                    </label>
                                    <input
                                        type="tel"
                                        id="tel"
                                        placeholder="Votre num??ro de t??l??phone"
                                        name="tel"
                                    />

                                    <div class="motif">
                                        <label for="motif"></label>
                                        <select
                                            placeholder="Objet"
                                            name="motif"
                                            id="objet"
                                            required
                                        >
                                            <option disabled hidden selected>
                                                Objet
                                            </option>
                                            <option>
                                                Je veux d??marrer un projet
                                            </option>
                                            <option>
                                                Je veux poser une question
                                            </option>
                                            <option>Je veux un devis</option>
                                            <option>Autre</option>
                                        </select>
                                    </div>

                                    <label for="message">
                                        <strong>Message</strong>
                                    </label>
                                    <textarea
                                        rows="3"
                                        id="msg"
                                        placeholder="Votre Message"
                                        name="msg"
                                    ></textarea>

                                    <input
                                        type="checkbox"
                                        id="valid"
                                        name="valid"
                                        checked
                                        required
                                    />

                                    <label for="valid">
                                        En soumettant ce formulaire, j'accepte que
                                        les informations saisies soient exploit??es
                                        dans le cadre de la demande de contact et de
                                        la relation commerciale qui peut en
                                        d??couler.
                                    </label>

                                    <button type="submit" class="btnForm">
                                        Envoyer
                                    </button>

                                </form>
                        </div>
                    </div>

                    <div class="bottom" id="bottom">
                        <img src="img/icons8-double-bas-64.png" alt="Fleche" />
                    </div>

                    <div id="loader" class="box">
                        <div id="imgLoader" class="circle">
                            <img src="img/Logo_loris.png" alt="Logo du site"/>
                        </div>
                    </div>

                    <div id="turnphone">
                         <p> Ce site web ne s'affiche qu'en portrait </p>
                    </div>
                    
                </section>
            </div>

            <section class="section a2">
                <ul id="waterprojets">
                    <li>
                        <a href="https://loloxdev.github.io/Jadoo/">
                            <figure id="Jadoo" class="proj">
                                <img
                                    src="img/logo_jadoo_1.svg"
                                    alt="Logo Jadoo"
                                />
                                <figcaption></figcaption>
                            </figure>
                        </a>
                    </li>

                    <li>
                        <a href="https://loloxdev.github.io/LabarreLoris_2_01062021_RESERVIA/">
                            <figure id="Reservia" class="proj">
                                <img
                                    src="img/reservia_logo.svg"
                                    alt="Logo Reservia"
                                />
                                <figcaption></figcaption>
                            </figure>
                        </a>
                    </li>

                    <li>
                        <a href="https://pctronique.fr/project/springfield/">
                            <figure id="Springfield" class="proj">
                                <img
                                    src="img/hommer.png"
                                    alt="Logo Springfield"
                                />
                                <figcaption></figcaption>
                            </figure>
                        </a>
                    </li>

                    <li>
                        <a href="https://loloxdev.github.io/Projet_commun_EnoLo/">
                        
                            <figure id="Enolo" class="proj">
                                <img src="img/logoblanc.png" alt="Logo Enolo" />
                                <figcaption></figcaption>
                            </figure>
                        </a>
                    </li>

                    <li>
                        <a href="https://loloxdev.github.io/GitesMontigny/">
                            <figure id="Gites" class="proj">
                                <img
                                    src="img/logo_pisserotte.png"
                                    alt="Logo Pisserotte"
                                />
                                <figcaption></figcaption>
                            </figure>
                        </a>
                    </li>
                </ul>


    

                <ul id="slidelist">

                <?php

                $requete = $sgbd->query ('SELECT projets.nom, projets.statut, projets.objectif, projets.id_projet, images.src, images.alt, images.id_projet 
                        FROM projets INNER JOIN images ON projets.id_projet = images.id_projet');

                        $requete->execute();

                        $resultat_requete = $requete->fetchAll((PDO::FETCH_ASSOC));

                        foreach( $resultat_requete as $projets ) {
                        

                            echo '                    
                                    <li class="slide" id="'.($projets['nom']).'">
                                        <div class="descr">
                                            <h3>'.($projets['nom']).'</h3>
                                            <p class="paraph">'.($projets['objectif']).'</p>
                                            <p class="paraph">'.($projets['statut']).'</p>
                                        </div>
                                        <div class="containeurillu">
                                            <img class="illuProj" src="img/'.($projets['src']).'" alt ="'.($projets['alt']).'"/>
                                        </div>
                                        
                                        
                                    </li>';
                        }
                    
                        ;



                    ?>


                        <!-- CODE POUR GIF -->
                         <!-- <div class="gif">
                             <button class="closeBtn" onclick="closeGif()">X</button>
                            <img src="https://i.gyazo.com/be6d09e07641ff12dc148db0c4409588.gif" alt="Image from Gyazo" width="1280"/>
                        </div> --> 
    


                </ul>


                <a class="jauge j1" href="#">
                    <span class="jauge-remplissage2 r1"></span>
                </a>
                <a class="jauge j2" href="#">
                    <span class="jauge-remplissage2 r2"></span>
                </a>
                <a class="jauge j3" href="#">
                    <span class="jauge-remplissage2 r3"></span>
                </a>
                <a class="jauge j4" href="#">
                    <span class="jauge-remplissage2 r4"></span>
                </a>
                <a class="jauge j5" href="#">
                    <span class="jauge-remplissage2 r5"></span>
                </a>
                <a class="jauge j6" href="#">
                    <span class="jauge-remplissage2 r6"></span>
                </a>
                <a class="jauge j7" href="#">
                    <span class="jauge-remplissage2 r7"></span>
                </a>

                <div class="wavesbox">
                    <svg
                        class="waves"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 24 150 28"
                        preserveAspectRatio="none"
                        shape-rendering="auto"
                    >
                        <defs>
                            <path
                                id="gentle-wave"
                                d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"
                            />
                        </defs>
                        <g class="parallax">
                            <use
                                xlink:href="#gentle-wave"
                                x="48"
                                y="0"
                                fill="rgba(255,255,255,0.7"
                            />
                            <use
                                xlink:href="#gentle-wave"
                                x="48"
                                y="3"
                                fill="rgba(255,255,255,0.5)"
                            />
                            <use
                                xlink:href="#gentle-wave"
                                x="48"
                                y="5"
                                fill="rgba(255,255,255,0.3)"
                            />
                            <use
                                xlink:href="#gentle-wave"
                                x="48"
                                y="7"
                                fill="#fff"
                            />
                        </g>
                    </svg>
                </div>
                    

                <div id="buttproj">

                    <button id="proj1" class="projbutton" type="button">
                        <div class='line'></div> 
                        <div class='line'></div>
                        <div class='line'></div>
                        <div class='line'></div>
                        <div class='line'></div>
                        <div class='line'></div>
                        <span>1</span>
                    </button>

                    <button id="proj2" class="projbutton" type="button">
                        <div class='line'></div> 
                        <div class='line'></div>
                        <div class='line'></div>
                        <div class='line'></div>
                        <div class='line'></div>
                        <div class='line'></div>
                        <span>2</span>
                    </button>

                </div>
                    
            </section>

            <section class="section a3">
                <div class="area" >
                    <ul class="circles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div >
                <h3>Mon parcours de vie</h3>
                <ul id="myLife">
                    <li>
                        <span> CAP Cuisine </span>
                    </li>

                    <li>
                        <span> BAC PRO Cuisine </span>
                    </li>

                    <li>
                        <span> D??but de carri??re en cuisine </span>
                    </li>

                    <li>
                        <span> Australie </span>
                    </li>

                    <li>
                        <span> D??couverte du d??veloppement WEB </span>
                    </li>

                    <li>
                        <span> D??but de formation d??veloppeur WEB </span>
                    </li>

                    <li>
                        <span> Stage front-end chez Orange </span>
                    </li>
                </ul>
            </section>

            <section class="section a4">
                <div class="gridContain">
                    <h4>Mes comp??tences en programmation</h4>

                    <?php

                        $requete1 = $sgbd->query ('SELECT langages.nom, langages.type, langages.id_langage, langages.id_img, images.src, images.alt, images.id_img 
                        FROM langages INNER JOIN images ON langages.id_img = images.id_img WHERE langages.type = "Programmation"');

                        $requete1->execute();

                        $resultat_requete1 = $requete1->fetchAll((PDO::FETCH_ASSOC));

                        foreach( $resultat_requete1 as $langages1 ) {
                        

                            echo '                    
                                    <figure>
                                        '.($langages1['src']).'
                                        <figcaption>'.($langages1['nom']).'</figcaption>
                                    </figure>';
                        };

                    ?>

                </div>

                <div class="gridContain2">
                    <h4>Mes comp??tences en design</h4>

                    <?php

                        $requete2 = $sgbd->query ('SELECT langages.nom, langages.type, langages.id_langage, langages.id_img, images.src, images.alt, images.id_img 
                        FROM langages INNER JOIN images ON langages.id_img = images.id_img WHERE langages.type = "Design"');

                        $requete2->execute();

                        $resultat_requete2 = $requete2->fetchAll((PDO::FETCH_ASSOC));

                        foreach( $resultat_requete2 as $langages2 ) {
                        

                            echo '                    
                                    <figure>
                                        '.($langages2['src']).'
                                        <figcaption>'.($langages2['nom']).'</figcaption>
                                    </figure>';
                        }; 
                    ?>
                </div>
                
                <div class="ocean">
                    <div class="bubble bubble--1"></div>
                    <div class="bubble bubble--2"></div>
                    <div class="bubble bubble--3"></div>
                    <div class="bubble bubble--4"></div>
                    <div class="bubble bubble--5"></div>
                    <div class="bubble bubble--6"></div>
                    <div class="bubble bubble--7"></div>
                    <div class="bubble bubble--8"></div>
                    <div class="bubble bubble--9"></div>
                    <div class="bubble bubble--10"></div>
                    <div class="bubble bubble--11"></div>
                    <div class="bubble bubble--12"></div>
                    <div id="octocat"></div>
                </div>
            </section>

            <section class="section a5">
                <h3 class="myHistory">Mon histoire</h3>
                <div id="bitWork">
                    <img src="img/bitmojiWork.png" alt="Un personnage qui ??tudie"/>
                </div>
                <p>
                    Anciennement cuisinier, j'ai d??cid?? de me r??orienter vers
                    le d??veloppement informatique car j'y ai d??couvert un
                    univers passionant.<br/><br/>
                    Je suis actuellement ?? la recherche d'un stage de 2 mois pour la p??riode septembre/octobre 2022, n'h??sitez surtout pas ?? me contacter!
                </p>
                <div id="footer">
                    <p id="rights">?? Copyright 2022 - All rights reserved - Webdesign by Loris Labarre</p>
                    <a href="mentions-legales.html" id="ml">Mentions l??gales</a>
                </div>

                <div id="Clouds">
                    <div class="Cloud Foreground"></div>
                    <div class="Cloud Background"></div>
                    <div class="Cloud Foreground"></div>
                    <div class="Cloud Background"></div>
                    <div class="Cloud Foreground"></div>
                    <div class="Cloud Background"></div>
                    <div class="Cloud Background"></div>
                    <div class="Cloud Foreground"></div>
                    <div class="Cloud Background"></div>
                    <div class="Cloud Background"></div>
                  <!--  <svg viewBox="0 0 40 24" class="Cloud"><use xlink:href="#Cloud"></use></svg>-->
                  </div>
                  
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                       width="40px" height="24px" viewBox="0 0 40 24" enable- xml:space="preserve">
                    <defs>
                      <path id="Cloud" d="M33.85,14.388c-0.176,0-0.343,0.034-0.513,0.054c0.184-0.587,0.279-1.208,0.279-1.853c0-3.463-2.809-6.271-6.272-6.271
                      c-0.38,0-0.752,0.039-1.113,0.104C24.874,2.677,21.293,0,17.083,0c-5.379,0-9.739,4.361-9.739,9.738
                      c0,0.418,0.035,0.826,0.084,1.229c-0.375-0.069-0.761-0.11-1.155-0.11C2.811,10.856,0,13.665,0,17.126
                      c0,3.467,2.811,6.275,6.272,6.275c0.214,0,27.156,0.109,27.577,0.109c2.519,0,4.56-2.043,4.56-4.562
                      C38.409,16.43,36.368,14.388,33.85,14.388z"/>
                    </defs>
                  </svg>


            </section>
        </div>
        <div id="fp-nav" class="fp-right">
            <ul>
                <li>
                    <a href="#page1" class="">
                        <span class="fp-sr-only"> fullPage </span>
                        <span> </span>
                    </a>
                    <div class="fp-tooltip fp-right">fullPage</div>
                </li>

                <li>
                    <a href="#page2" class="">
                        <span class="fp-sr-only"> Open </span>
                        <span> </span>
                    </a>
                    <div class="fp-tooltip fp-right">Open</div>
                </li>
                <li>
                    <a href="#page3" class="active">
                        <span class="fp-sr-only"> Easy </span>
                        <span> </span>
                    </a>
                    <div class="fp-tooltip fp-right">Easy</div>
                </li>
                <li>
                    <a href="#page4" class="">
                        <span class="fp-sr-only"> Touch </span>
                        <span> </span>
                    </a>
                    <div class="fp-tooltip fp-right">Touch</div>
                </li>
            </ul>
        </div>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/fullpage.js"></script>
        <script type="text/javascript" src="js/canva1.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript">
        $(window).load(function() {
        $("#loader").fadeOut(1500); })
        </script>

    </body>
</html>
