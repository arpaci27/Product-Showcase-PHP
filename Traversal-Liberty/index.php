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
              echo $language['SliderTitle'];
              ?></h3>
              <h6 class="mb-3"><?php 
              echo $language["SecondTitle"];
              ?></h6>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /main-slider -->
  <!-- //banner-slider--><script>$(document).ready(function() {
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
        $('.subject-card').each(function() {
            if (isInViewport(this)) {
                $(this).addClass('visible');
            }
        });
    }

    $(window).scroll(animateIfVisible);
    animateIfVisible();
});$(document).ready(function() {
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
        $('.best-rooms').each(function() {
            if (isInViewport(this)) {
                $(this).addClass('visible');
            }
        });
    }

    $(window).scroll(animateIfVisible);
    animateIfVisible();
});</script>
<style>@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(50px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
.best-rooms {
    opacity: 0; /* Initially hidden */
    transform: translateY(20px);
    transition: opacity 1s, transform 1s;
}

.best-rooms.visible {
    opacity: 1;
    transform: translateY(0);
}
.subject-card:hover {
    transform: scale(1.05);
}
.subject-card {
    opacity: 0;
    animation: fadeInUp 1s ease forwards;
}</style>
  <!--/grids-->
  <section class="w3l-grids-3 py-5">
    <div class="container py-md-5">
      <div class="title-content text-left mb-lg-5 mb-4">
        <h6 class="sub-title"><?php echo $language['Explore'] ?></h6>
        <h3 class="hny-title"><?php echo $language['PopularProducts'] ?></h3>
      </div>
      <div class="row bottom-ab-grids">
  <!--/row-grids-->
  <?php 
  require_once('inc/db.php');
  $sql = "SELECT * FROM products LIMIT 5";
  $all_products = $baglanti->query($sql);
  while($row = $all_products->fetch()){

  ?>

<div class="col-lg-6 subject-card mt-lg-0 mt-4 visible">
    <div class="subject-card-header p-4">
        <a href="products.php" class="card_title p-lg-4d-block">
            <div class="row align-items-center">
                <div class="col-sm-5 subject-img">
                    <img  class="img-thumbnail" src="assets/images/ÜRÜN GÖRSELLERİ/<?php echo $row["ProductImage"] ?>" class="img-fluid" alt="">
                </div>
                <div class="col-sm-7 subject-content mt-sm-0 mt-4">
                    <h4><?php echo $row["ProductName"] ?></h4>
                    <p><?php echo $language['See Details'] ?></p>
                   
                </div>
            </div>
        </a>
    </div><br>
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
  <div class="best-rooms py-5 visible">
    <div class="container py-md-5">
        <div class="ban-content-inf row">
            <div class="maghny-gd-1 col-lg-6">
              <div class="maghny-grid">
                <figure class="effect-lily border-radius  m-0">
                    <img class="img-fluid" class="img-thumbnail" src="assets/images/ÜRÜN GÖRSELLERİ/Product 12.1.jpeg" alt="" />
                    <figcaption>
                        <div>
                            <h4>Sleepwear</h4>
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
                                <img class="img-fluid" src="assets/images/ÜRÜN GÖRSELLERİ/Product 11.1.jpeg" alt="" />
                                <figcaption>
                                    <div>
                                        <h4>Stone Top</h4>
                                    </div>

                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div href="products.php" class="maghny-gd-1 col-6">
                        <div class="maghny-grid">
                            <figure class="effect-lily border-radius">
                                <img  class="img-fluid" src="assets/images/ÜRÜN GÖRSELLERİ/product 2.1.jpeg" alt="" />
                                <figcaption>
                                    <div>
                                        <h4>Denim</h4>
                                    </div>

                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="maghny-gd-1 col-6 mt-4">
                        <div class="maghny-grid">
                            <figure class="effect-lily border-radius">
                                <img class="img-fluid" src="assets/images/ÜRÜN GÖRSELLERİ/Product 13.1.jpeg" alt="" />
                                <figcaption>
                                    <div>
                                        <h4>Jacket</h4>
                                    </div>

                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="maghny-gd-1 col-6 mt-4">
                        <div class="maghny-grid">
                            <figure class="effect-lily border-radius">
                                <img class="img-fluid" src="assets/images/ÜRÜN GÖRSELLERİ/Product 14.1.jpeg" alt="" />
                                <figcaption>
                                    <div>
                                        <h4>Shirt</h4>
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
              echo $language["SliderTitle"];
              ?></h3>
              <p class="mt-3 pr-lg-5"><?php 
              echo $language["SecondTitle"];
              ?></p>
              <a href="about.php" class="btn btn-style btn-secondary mt-5"><?php 
              echo $language["GetInTouch"];
              ?></a>
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