<?php
if (! include_once "p/partials/head.php"){echo "no head found";die();}
 ?>

<aside id="slidding_menu">
  <?php include_once "p/partials/nav.php"; ?>
</aside>
 <div id="panel">
   <button class="hamburger hamburger--arrow" type="button">
      <span class="hamburger-box m-nav-toggler">
        <span class="hamburger-inner"></span>
      </span>
   </button>
   <header id="hero">
     <?php include_once "p/partials/hero.php"; ?>
   </header>
   <section id="intro">
     <?php include_once "p/partials/intro.php"; ?>
   </section>
   <section id="metropol">
     <?php include_once 'p/partials/metropol.php' ?>
   </section>
   <section id="movilidad">
     <?php include_once 'p/partials/movilidad.php' ?>
   </section>
   <section id="cintillo_posible">
       <?php include_once 'p/partials/cintillo-posible.php' ?>
   </section>
   <section id="grande">
     <?php include_once 'p/partials/grande.php' ?>
   </section>
   <section id="futuro">
     <?php include_once 'p/partials/futuro.php' ?>
   </section>
   <section id="verde">
     <?php include_once 'p/partials/verde.php' ?>
   </section>
   <section id="medible">
     <?php include_once 'p/partials/medible.php' ?>
   </section>
   <section id="buzon">
     <div class="container">
       <?php include_once "p/components/forma_buzon.php"; ?>
     </div>
   </section>
   <section id="comunidades">
     <?php include_once "p/partials/comunidades.php";?>
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
