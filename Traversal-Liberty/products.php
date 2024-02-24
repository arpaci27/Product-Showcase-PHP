<?php
$page="Products";
include('inc/head.php');

require_once('inc/db.php');
$sql = "SELECT * FROM products";
$all_products = $baglanti->query($sql);
?>
  <!-- //header -->
  <!-- about breadcrumb -->
  <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container">
        <h2 class="title">Products </h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="#url">Home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Products </li>
        </ul>
      </div>
    </div>
  </section>
  <!-- //about breadcrumb -->
 <!--  Work gallery section -->
 <section class="grids-1 py-5">
  <div class="grids py-lg-5 py-md-4">
      <div class="container">
          <h3 class="hny-title mb-5">Products</h3>
          <div class="row">
            <?php 
            while($row = $all_products->fetch()){

            
            ?>
              <div class="col-lg-4 col-md-4 col-6">
                  <div class="column">
                      <a href="blog-single.php"><img src="assets/images/g1.jpg" alt="" class="img-fluid"></a>
                      <div class="info">
                          <h4><a href="blog-single.php"><?php echo $row["ProductName"];?></a></h4>
                          <p>See Details </p>
                          <div class="dst-btm">
                            <h6 class="">Start From </h6>
                            <span>$1750</span>
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