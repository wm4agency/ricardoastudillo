<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (! include_once "p/partials/head.php"){echo "no head found";die();}
if (! include_once "p/components/graphic_assets.php"){echo "no graphic assets!";}
 ?>

 <!-- PRELOADER
 -------------------->
<?php include_once "p/components/preloader.php"; ?>


<aside id="slidding_menu">
  <?php include_once "p/partials/nav.php"; ?>
</aside>
 <div id="panel">
<!--
   <button class="hamburger hamburger--arrow" type="button">
      <span class="hamburger-box m-nav-toggler">
        <span class="hamburger-inner"></span>
      </span>
   </button>
-->
<i class="burger m-nav-toggler"></i>
   <header id="hero">
     <?php include_once "p/partials/hero.php"; ?>
   </header>
   <section id="intro">
     <?php include_once "p/partials/intro.php"; ?>
   </section>
   <section id="puntos" class="skewed">
     <?php include_once "p/partials/puntos.php"; ?>
   </section>
   <section id="metropol" class="skewed preceded">
     <?php include_once 'p/partials/metropol.php' ?>
   </section>
   <section id="movilidad">
     <?php include_once 'p/partials/movilidad.php' ?>
   </section>
   <section id="cintillo_posible">
       <?php include_once 'p/partials/cintillo-posible.php' ?>
   </section>
   <section id="grande" class="skewed">
     <?php include_once 'p/partials/grande.php' ?>
   </section>
   <section id="futuro" class="skewed preceded">
     <?php include_once 'p/partials/futuro.php' ?>
   </section>
   <section id="verde" class="skewed preceded">
     <?php include_once 'p/partials/verde.php' ?>
   </section>
   <section id="medible" class="skewed ">
     <?php include_once 'p/partials/medible.php' ?>
   </section>
   <section id="buzon">
     <div class="container">
       <?php include_once "p/components/forma_buzon.php"; ?>
     </div>
   </section>
   <section id="cintillo_frase">
     <?php include_once 'p/partials/cintillo-frase.php' ?>
   </section>
   <section id="comunidades">
     <?php //include_once "p/partials/comunidades.php";?>
     <div class="social-feed-container"></div>
   </section>
   <section id="reclutamiento">
     <div class="container">
       <?php include_once "p/components/forma_registro.php"; ?>
       <figure class="corregidora">
         <hgroup>
           <h3>Corregidora</h3>
           <h4>¡Posible!</h4>
         </hgroup>
       </figure>
     </div>
   </section>
   <footer>
     <?php include_once 'p/partials/foot.php'; ?>
   </footer>
 </div>
</body>
<?php include_once "p/scripts.php"; ?>
</html>
