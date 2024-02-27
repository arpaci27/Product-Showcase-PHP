<?php
$page ="Product";
include('inc/head.php');
include('inc/db.php');
$id=$_GET["ID"];
$sorgu = $baglanti->prepare("SELECT * FROM products WHERE ID=:ID");
$sorgu->execute(['ID'=>$id]);
$sonuc = $sorgu->fetch();
?>
  <!-- //header -->
  <!-- about breadcrumb -->
  <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container">
        <h2 class="title"><?= $sonuc['ProductName'] ?></h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="#url">Home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span><?= $sonuc['ProductName']?></li>
        </ul>
      </div>
    </div>
  </section>
  <!-- //about breadcrumb -->
  <!--/blog-->
  <div class="py-5 w3l-homeblock1 text-center">
    <div class="container mt-md-3">
        <h3 class="blog-desc-big text-center mb-4"><?= $sonuc['ProductName'] ?></h3>
    </div>
</div>
<section class="w3l-team" id="team">
    <div class="team-block py-5">
      <div class="container py-lg-5">
        <div class="title-content text-center mb-lg-3 mb-4">
          <h3 class="hny-title">Product Images</h3>
        </div>
        <div class="row">
          <div class="col-lg-3 col-6 mt-lg-5 mt-4">
            <div class="box16">
              <a href="#url"><img src="assets/images/ÜRÜN GÖRSELLERİ/<?= $sonuc['ProductImage'] ?>" class="img-fluid radius-image" alt=""></a>
              <div class="box-content">
                <h3 class="title"><a href="#url"><?= $sonuc['ProductName'] ?></a></h3>
               
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6 mt-lg-5 mt-4">
            <div class="box16">
              <a href="#url"><img src="assets/images/ÜRÜN GÖRSELLERİ/<?= $sonuc['ProductImage'] ?>" class="img-fluid radius-image" alt=""></a>
              <div class="box-content">
                <h3 class="title"><a href="#url"><?= $sonuc['ProductName'] ?></a></h3>
               
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6 mt-lg-5 mt-4">
            <div class="box16">
              <a href="#url"><img src="assets/images/ÜRÜN GÖRSELLERİ/<?= $sonuc['ProductImage'] ?>" class="img-fluid radius-image" alt=""></a>
              <div class="box-content">
                <h3 class="title"><a href="#url"><?= $sonuc['ProductName'] ?></a></h3>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- //team -->
            <div class="single-post-content">
                <p class="alphabet mb-4"><span class="big-letter">A</span>Lorem ipsum dolor sit amet,Ea consequuntur
                    illum facere aperiam sequi optio
                    dolor set consectetur.Ea ipsum sed consequuntur illum facere aperiam sequi optio consectetur
                    adipisicing elitFuga, suscipit totam animi consequatur saepe. Lorem ipsum dolor sit amet,
                    illum facere sequi optio elit..</p>
                <p class="mb-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. At, corrupti odit? At
                    iure facere, porro repellat officia quas, dolores magnam assumenda soluta odit harum voluptate
                    inventore ipsa maiores fugiat accusamus eos nulla. Iure explicabo officia. Lorem ipsum dolor sit
                    amet, consectetur adipisicing elit, dolorem.</p>
                <blockquote class="blockquote my-5">
                    <div class="icon-quote"><span class="fa fa-quote-left" aria-hidden="true"></span></div>
                    Lorem ipsum dolor sit amet,Ea consequuntur illum facere aperiam sequi optio consectetur.Ea
                    consequuntur illum facere aperiam sequi optio consectetur adipisicing elitFuga, suscipit
                    totam animi, dolores magnam assumenda soluta odit harum.
                    <footer class="blockquote-footer mt-3">
                        Smith lara</footer>
                </blockquote>
                <h3 class="blog-desc-big m-0 mb-4">Excepteur sint occaecat non proident</h3>
                <p class="mb-4">Excepteur sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id
                    erat eu. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in
                    culpa quis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde expedita esse error enim
                    repellat, architecto corporis rerum ipsa alias cum! </p>
                <p class="mb-4">Dolor sit sed amet, excepteur sint occaecat non proident, sunt in culpa quis. Phasellus
                    lacinia id erat eu. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in
                    culpa quis. </p>
                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, veritatis. Excepteur
                    sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id
                    erat eu. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in
                    culpa quis. Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                <div class="sing-post-thumb mb-5 row pt-3">
                    <div class="col-sm-6">
                        <a href="#url"><img src="assets/images/ÜRÜN GÖRSELLERİ/<?= $sonuc['ProductImage'] ?>" class="img-fluid radius-image" alt=""></a>
                    </div>
                    <div class="col-sm-6 mt-sm-0 mt-3">
                        <a href="#url"><img src="assets/images/ÜRÜN GÖRSELLERİ/<?= $sonuc['ProductImage'] ?>" class="img-fluid radius-image" alt=""></a>
                    </div>
                </div>
                <h3 class="blog-desc-big m-0 mb-lg-4 mb-3">Lorem ipsum dolor sit</h3>
                <p class="mb-4">Dolor sit sed amet, excepteur sint occaecat non proident, sunt in culpa quis. Phasellus
                    lacinia id erat eu. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in
                    culpa quis. Lorem ipsum dolor, sit amet elit. </p>
               
                <p class="mb-4">Excepteur sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id
                    erat eu. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in
                    culpa quis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde expedita esse error enim
                    repellat, architecto corporis rerum ipsa alias cum! </p>
                <p class="mb-4">Dolor sit sed amet, excepteur sint occaecat non proident, sunt in culpa quis. Phasellus
                    lacinia id
                    erat eu. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in
                    culpa quis. </p>

                <h3 class="blog-desc-big m-0 mt-5 mb-4">Search for Inspiration</h3>
                <p class="mb-4">Excepteur sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id erat eu. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in culpa quis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde expedita esse error enim repellat, architecto corporis rerum ipsa alias cum!</p>
                <p class="mb-4">Dolor sit sed amet, excepteur sint occaecat non proident, sunt in culpa quis. Phasellus
                    lacinia id erat eu. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in
                    culpa quis. </p>

                <div class="d-grid left-right mt-5 pb-md-5">
                    <div class="buttons-singles tags">
                        <h4>Tags :</h4>
                        <a href="#blog-tag">Travel</a>
                        <a href="#blog-tag">Culture</a>
                        <a href="#blog-tag">Hotel</a>
                        <a href="#blog-tag">Food</a>
                    </div>
                    <div class="buttons-singles">
                        <h4>Share :</h4>
                        <a href="#blog-share"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                        <a href="#blog-share"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                        <a href="#blog-share"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                        <a href="#blog-share"><span class="fa fa-pinterest-p" aria-hidden=" true"></span></a>
                    </div>
                </div>

                


            </div>
        </div>
        <!--//blog-post-->
</section>

<?php
include('inc/footer.php');
?>

<?php
include('inc/scripts.php');
?>

</body>

</html>