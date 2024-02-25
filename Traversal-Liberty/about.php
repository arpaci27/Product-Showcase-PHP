<?php
$page="About Us";
include('inc/db.php');
include('inc/head.php');

$sorgu = $baglanti->prepare("SELECT * FROM aboutus");
$sorgu->execute();
$sonuc = $sorgu->fetch();
?>
  <!-- //header -->
  <!-- about breadcrumb -->
  <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container py-2">
        <h2 class="title">About Us</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="#url">Home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> About </li>
        </ul>
      </div>
    </div>
  </section>
  <!-- //about breadcrumb -->
  <!-- /about-6-->
  <section class="w3l-cta4 py-5">
      <div class="container py-lg-5">
        <div class="ab-section text-center">
          <h6 class="sub-title">About Us</h6>
          <h3 class="hny-title"><?php echo $sonuc["FirstTitle"] ?>.</h3>
          <p class="py-3 mb-3"><?php 
              echo $sonuc["FirstText"];
              ?></p>
            <a href="services.html" class="btn btn-style btn-primary">See the products</a>
        </div>
        <div class="row mt-5">
          <div class="col-md-9 mx-auto">
            <img src="assets/images/image(4).png" class="img-fluid" alt="">
          </div>
        </div>
      </div>
  </section>
  <!-- //about-6-->
   <!-- /content-6-->
   <section class="w3l-content-6 py-5">
    <div class="container py-lg-5">
      <div class="row">
        <div class="col-lg-6 content-6-left pr-lg-5">
          <h6 class="sub-title">Why Choose Us</h6>
          <h3 class="hny-title"><?php 
              echo $sonuc["SecondTitle"];
              ?></h3>
        </div>
        <div class="col-lg-6 content-6-right mt-lg-0 mt-4">
          <p class="mb-3"><?php 
              echo $sonuc["SecondText"];
              ?></p>
              <a href="products.php" class="btn btn-style btn-primary mt-4">See the products</a>
        </div>
      </div>
    </div>
</section>
<!-- //content-6-->
<section class="w3l-grids1">
  <div class="hny-three-grids py-5">
    <div class="container py-lg-5">
      <div class="row">
        <?php
      require_once('inc/db.php');
  $sql = "SELECT * FROM products LIMIT 3";
  $all_products = $baglanti->query($sql);
  while($row = $all_products->fetch()){?>
        <div class="col-md-4 col-sm-6 mt-0 grids5-info">
          <a href="#url"><img src="assets/images/ÜRÜN GÖRSELLERİ/<?= $row["ProductImage"] ?>" class="img-fluid" alt=""></a>
          <h5>Lorem</h5>
          <h4><a href="#url"> <?php echo $row["ProductName"] ?></a></h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam esse? dolores impedit doloremque.</p>
        </div>
       <?php
       } ?> 
      </div>
    </div>
  </div>
</section>
  <!-- stats -->
  <section class="w3l-statshny py-5" id="stats">
    <div class="container py-lg-5 py-md-4">
      <div class="w3-stats-inner-info">
        <div class="row">
          
        </div>
      </div>
    </div>
  </section>
  <!-- //stats -->
  <!-- team -->
  <section class="w3l-team" id="team">
    <div class="team-block py-5">
      <div class="container py-lg-5">
        <div class="title-content text-center mb-lg-3 mb-4">
          <h6 class="sub-title">Our team</h6>
          <h3 class="hny-title">Meet our Guides</h3>
        </div>
        <div class="row">
          <div class="col-lg-3 col-6 mt-lg-5 mt-4">
            <div class="box16">
              <a href="#url"><img src="assets/images/team1.jpg" alt="" class="img-fluid" /></a>
              <div class="box-content">
                <h3 class="title"><a href="#url">Alexander</a></h3>
                <span class="post">Description</span>
                <ul class="social">
                  <li>
                    <a href="#" class="facebook">
                      <span class="fa fa-facebook-f"></span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="twitter">
                      <span class="fa fa-twitter"></span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6 mt-lg-5 mt-4">
            <div class="box16">
              <a href="#url"><img src="assets/images/team2.jpg" alt="" class="img-fluid" /></a>
              <div class="box-content">
                <h3 class="title"><a href="#url">Victoria</a></h3>
                <span class="post">Description</span>
                <ul class="social">
                  <li>
                    <a href="#" class="facebook">
                      <span class="fa fa-facebook-f"></span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="twitter">
                      <span class="fa fa-twitter"></span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6 mt-lg-5 mt-4">
            <div class="box16">
              <a href="#url"><img src="assets/images/team3.jpg" alt="" class="img-fluid" /></a>
              <div class="box-content">
                <h3 class="title"><a href="#url">Smith roy</a></h3>
                <span class="post">Description</a></span>
                <ul class="social">
                  <li>
                    <a href="#" class="facebook">
                      <span class="fa fa-facebook-f"></span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="twitter">
                      <span class="fa fa-twitter"></span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6 mt-lg-5 mt-4">
            <div class="box16">
              <a href="#url"><img src="assets/images/team4.jpg" alt="" class="img-fluid" /></a>
              <div class="box-content">
                <h3 class="title"><a href="#url">Johnson</a></h3>
                <span class="post">Description</a></span>
                <ul class="social">
                  <li>
                    <a href="#" class="facebook">
                      <span class="fa fa-facebook-f"></span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="twitter">
                      <span class="fa fa-twitter"></span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- //team -->

  <!--/w3l-footer-29-main-->
  <?php
  include('inc/footer.php');
  ?>
  <?php
  include('inc/scripts.php');
  ?>
  <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>