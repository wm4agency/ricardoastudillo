<?php
if (! include_once "p/partials/head.php"){echo "no head found";die();}
 ?>

<aside>
  <?php include_once "p/partials/nav.php"; ?>
</aside>
 <div id="panel">
   <header id="hero">
     <?php include_once "p/partials/hero.php"; ?>
   </header>
   <section id="intro">
     <?php include_once "p/partials/intro.php"; ?>
   </section>
   <section id="comunidades">
     <?php include_once "p/partials/comunidades.php";?>
   </section>
   <section id="buzon">
     <div class="container">
       <?php include_once "p/components/forma_buzon.php"; ?>
     </div>
   </section>
   <section id="reclutamiento">
     <div class="container">
       <?php include_once "p/components/forma_registro.php"; ?>
     </div>
   </section>
   <footer>
     <?php include_once "p/partials/foot.php"; ?>
   </footer>
 </div>
</body>
</html>
