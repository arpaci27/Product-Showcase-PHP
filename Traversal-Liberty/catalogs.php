<?php
$page= "Catalog";
include("inc/head.php");
?>
<style>
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.price-box {
    opacity: 0; /* Initially hidden */
    animation: fadeInUp 1s ease forwards;
}
</style>

  <!-- //header -->
  <!-- about breadcrumb -->
  <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container">
        <h2 class="title"><?php echo $language['Catalog'] ?></h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="#url"><?php echo $language['Home'] ?></a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span><?php echo $language['Catalog'] ?></li>
        </ul>
      </div>
    </div>
  </section>
  <!-- //about breadcrumb -->
  
  <section class="w3l-pricinghny">
    <div class="pricing-inner-info py-5">
      <div class="container py-lg-4">
        <!--/pricing-info-grids-->
        <div class="pricing-info-grids">
          <!--/box-->
          <div class="price-box py-5 visible">
    <h1>Yarn <?php echo $language['Catalog'] ?></h1>
    <br>
    <embed src="assets/pdf/Yarn-Catalogue-Easlytrade-.pdf" width="100%" height="600px" type="application/pdf">
</div>
<div class="price-box py-5 visible">
    <h1>Knitwear-Fashion <?php echo $language['Catalog'] ?></h1>
    <br>
    <embed src="assets/pdf/Knitwear-Fashion-Catalog-1-3.pdf" width="100%" height="600px" type="application/pdf">
</div><div class="price-box py-5 visible">
    <h1>Yarn-Collection <?php echo $language['Catalog'] ?></h1>
    <br>
    <embed src="assets/pdf/Yarn-Collection-2.pdf" width="100%" height="600px" type="application/pdf">
</div>
          <!--/box-->
     <!--/box-->
     
    <!--/box-->
    <!--/box-->
    
    <!--/box-->
        </div>
        <!--/pricing-info-grids-->
      </div>
    </div>
  </section>
  <!--//pricing-->
  <!--/w3l-footer-29-main-->
  <?php
include('inc/footer.php');
?>
  
    
      <?php
include('inc/scripts.php');
?>
 <script>$(document).ready(function() {
    function isInViewport(element) {
        var rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    function animateIfVisible() {
        $('.price-box').each(function() {
            if (isInViewport(this)) {
                $(this).addClass('visible');
            }
        });
    }

    $(window).scroll(animateIfVisible);
    animateIfVisible();
});</script>
      
</body>

</html>