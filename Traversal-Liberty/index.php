<?php
$page="Home";
include('inc/db.php');
include ("inc/head.php");
$sorgu = $baglanti->prepare("SELECT * FROM homepage");
$sorgu -> execute();
$sonuc = $sorgu->fetch();
?>

  <!-- //header -->
  <!--banner-slider-->
  <!-- main-slider -->
  <section class="w3l-main-slider" id="home">
    <div class="banner-content">
      <div id="demo-1"
        data-zs-src='["assets/images/image(2).png", "assets/images/image(3).png","assets/images/image(4).png", "assets/images/image(5).png"]'
        data-zs-overlay="dots">
        <div class="demo-inner-content">
          <div class="container">
            <div class="banner-infhny">
              <h3><?php 
              echo $sonuc["firstTitle"];
              ?></h3>
              <h6 class="mb-3"><?php 
              echo $sonuc["firstLittleTitle"];
              ?></h6>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /main-slider -->
  <!-- //banner-slider-->

  <!--/grids-->
  <section class="w3l-grids-3 py-5">
    <div class="container py-md-5">
      <div class="title-content text-left mb-lg-5 mb-4">
        <h6 class="sub-title">Explore</h6>
        <h3 class="hny-title">Popular Products</h3>
      </div>
      <div class="row bottom-ab-grids">
  <!--/row-grids-->
  <?php 
  require_once('inc/db.php');
  $sql = "SELECT * FROM products LIMIT 5";
  $all_products = $baglanti->query($sql);
  while($row = $all_products->fetch()){

  ?>
        <div class="col-lg-6 subject-card mt-lg-0 mt-4">
          <div class="subject-card-header p-4">
            <a href="#" class="card_title p-lg-4d-block">
              <div class="row align-items-center">
                <div class="col-sm-5 subject-img">
                  <img src="assets/images/ÜRÜN GÖRSELLERİ/<?php echo $row["ProductImage"] ?>" class="img-fluid" alt="">
                </div>
                <div class="col-sm-7 subject-content mt-sm-0 mt-4">
                  <h4><?php echo $row["ProductName"] ?></h4>
                  <p>See Details</p>
                  <div class="dst-btm">
                    <h6 class=""> Start From </h6>
                    <span>$1650</span>
                  </div>
                  <p class="sub-para">Per person on twin sharing</p>
                </div>
              </div>
            </a>
          </div>
        </div><br>
        <?php } ?>
          <!--//row-grids-->
      </div>
    </div>
  </section>
  <!--//grids-->
  <!-- stats -->

  <!-- //stats -->
  <!--/-->
  <div class="best-rooms py-5">
    <div class="container py-md-5">
        <div class="ban-content-inf row">
            <div class="maghny-gd-1 col-lg-6">
              <div class="maghny-grid">
                <figure class="effect-lily border-radius  m-0">
                    <img class="img-fluid" src="assets/images/g10.jpg" alt="" />
                    <figcaption>
                        <div>
                            <h4>3Days, 4 Nights</h4>
                            <p>From 1720$ </p>
                        </div>

                    </figcaption>
                </figure>
            </div>
            </div>
            <div class="maghny-gd-1 col-lg-6 mt-lg-0 mt-4">
                <div class="row">
                    <div class="maghny-gd-1 col-6">
                        <div class="maghny-grid">
                            <figure class="effect-lily border-radius">
                                <img class="img-fluid" src="assets/images/g9.jpg" alt="" />
                                <figcaption>
                                    <div>
                                        <h4>3Days, 4 Nights</h4>
                                        <p>From 1220$ </p>
                                    </div>

                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="maghny-gd-1 col-6">
                        <div class="maghny-grid">
                            <figure class="effect-lily border-radius">
                                <img class="img-fluid" src="assets/images/g8.jpg" alt="" />
                                <figcaption>
                                    <div>
                                        <h4>3Days, 4 Nights</h4>
                                        <p>From 1620$ </p>
                                    </div>

                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="maghny-gd-1 col-6 mt-4">
                        <div class="maghny-grid">
                            <figure class="effect-lily border-radius">
                                <img class="img-fluid" src="assets/images/g7.jpg" alt="" />
                                <figcaption>
                                    <div>
                                        <h4>3Days, 4 Nights</h4>
                                        <p>From 1820$ </p>
                                    </div>

                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="maghny-gd-1 col-6 mt-4">
                        <div class="maghny-grid">
                            <figure class="effect-lily border-radius">
                                <img class="img-fluid" src="assets/images/g6.jpg" alt="" />
                                <figcaption>
                                    <div>
                                        <h4>3Days, 4 Nights</h4>
                                        <p>From 1520$ </p>
                                    </div>

                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- //stats -->
  <!--/w3l-bottom-->
  <section class="w3l-bottom py-5">
    <div class="container py-md-4 py-3 text-center">
      <div class="row my-lg-4 mt-4">
        <div class="col-lg-9 col-md-10 ml-auto">
          <div class="bottom-info ml-auto">
            <div class="header-section text-left">
              <h3 class="hny-title two"><?php 
              echo $sonuc["secondTitle"];
              ?></h3>
              <p class="mt-3 pr-lg-5"><?php 
              echo $sonuc["littleDescription"];
              ?></p>
              <a href="about.php" class="btn btn-style btn-secondary mt-5">Read More</a>
            </div>
           

          </div>
        </div>
      </div>
    </div>
  </section>
  <!--//w3l-bottom-->
  <!-- testimonials -->

  <!-- //testimonials -->

  <!--/w3l-footer-29-main-->
  <?php
  include ("inc/footer.php")
  ?>
  <!-- Template JavaScript -->
  <?php
  include ("inc/scripts.php")
  ?>

</body>

</html>