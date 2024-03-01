<?php
$page="Categories";
include('inc/head.php');
require_once('inc/db.php');
$sorgu = $baglanti->prepare("SELECT * FROM products");
                                        $sorgu -> execute();
?>
  <!-- //header -->
  <!-- about breadcrumb -->
  <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container">
        <h2 class="title">Categories </h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="#url">Home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Categories </li>
        </ul>
      </div>
    </div>
  </section>
  <script>$(window).scroll(function() {
    $('.col-lg-4').each(function() {
        var top_of_element = $(this).offset().top;
        var bottom_of_element = $(this).offset().top + $(this).outerHeight();
        var bottom_of_screen = $(window).scrollTop() + $(window).height();
        var top_of_screen = $(window).scrollTop();

        if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){
            $(this).removeClass('hidden');
        }
    });
}); </script><style>@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
    
}

.col-lg-4 {
    opacity: 0; /* Initially hidden */
    animation: fadeIn 1.5s ease-in-out forwards;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow */
}

.hidden {
    visibility: hidden;
} </style>
  <!-- //about breadcrumb -->
 <!--  Work gallery section -->
 <section class="grids-1 py-5">
  <div class="grids py-lg-5 py-md-4">
      <div class="container">
          <h3 class="hny-title mb-5">Products</h3>
          <div class="row">
            <?php 
            while($sonuc=$sorgu->fetch()){

            
            ?>
              <div class="col-lg-4 col-md-4 col-6 hidden">
    <div class="column">
        <a href="productsingle.php?ID=<?= $sonuc["ID"] ?>"><img class="img-thumbnail" src="assets/images/ÜRÜN GÖRSELLERİ/<?php echo $sonuc["ProductImage"]?>" alt="" class="img-fluid"></a>
        <div class="info">
            <h4><a href="blog-single.php"><?php echo $sonuc["ProductName"];?></a></h4>
            <p>See Products </p>
            <div class="dst-btm">
              
            </div>
        </div>
    </div>
</div>
             <?php } 
             ?>
              
          </div>
      </div>
</div></section>
<!--  //Work gallery section -->
<!-- grids block 5 -->
  <!--/w3l-footer-29-main-->
<?php
include('inc/footer.php');
?>

  <!-- Template JavaScript -->
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/theme-change.js"></script>
  <!--/MENU-JS-->
  <script>
    $(window).on("scroll", function () {
      var scroll = $(window).scrollTop();

      if (scroll >= 80) {
        $("#site-header").addClass("nav-fixed");
      } else {
        $("#site-header").removeClass("nav-fixed");
      }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function () {
      $("header").toggleClass("active");
    });
    $(document).on("ready", function () {
      if ($(window).width() > 991) {
        $("header").removeClass("active");
      }
      $(window).on("resize", function () {
        if ($(window).width() > 991) {
          $("header").removeClass("active");
        }
      });
    });
  </script>
  <!--//MENU-JS-->

  <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>