<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$page ="Product";
include('inc/head.php');
include('inc/db.php');
$id = $_GET["ID"];
?>
<style>
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .box16 {
        opacity: 0; /* Initially hidden */
        visibility: hidden;transition: opacity 1s, transform 1s;
    }
</style>
<script>
    $(window).scroll(function() {
        $('.box16').each(function() {
            var top_of_element = $(this).offset().top;
            var bottom_of_element = $(this).offset().top + $(this).outerHeight();
            var bottom_of_screen = $(window).scrollTop() + $(window).height();
            var top_of_screen = $(window).scrollTop();

            if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){
                $(this).css({
                    visibility: 'visible',
                    animation: 'fadeIn 1s ease-in-out forwards'
                });
            }
        });
    });
</script>
  <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container">
        <h2 class="title"><?php echo $language['Products'] ?></h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="index.php"><?php echo $language['Home'] ?></a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span><?php echo $language['Products'] ?></li>
        </ul>
      </div>
    </div><style></style>
  </section>
  <?php
$sorgu = $baglanti->prepare("SELECT p.*, pd.*, pdi.* 
FROM products p
JOIN productdetails pd ON p.ProductName = pd.ProductName
JOIN productdetailsimage pdi ON pd.product_id = pdi.product_id
WHERE p.ID = :ID");
$sorgu->execute(['ID' => $id]);

if ($sorgu) {
$sonuc = $sorgu->fetchAll(); // Use fetchAll() to fetch all rows
if ($sonuc) {
$groupedPhotos = array();

foreach ($sonuc as $row) {
$productName = $row['product_name'];
$image = $row['image_name'];

if (!isset($groupedPhotos[$productName])) {
$groupedPhotos[$productName] = array();
}

$groupedPhotos[$productName][] = $image;
}

foreach ($groupedPhotos as $productName => $photos) {
?>
<section class="w3l-team" id="team">
<div class="team-block py-5">
<div class="container py-lg-5">
<div class="title-content text-center mb-lg-3 mb-4">
<h3 class="hny-title"><?php echo $productName; ?></h3>
</div>
<div class="row justify-content-center">
<?php foreach ($photos as $photo) { ?>
    <div class="col-lg-3 col-6 mt-lg-5 mt-4">
        <div class="box16">
            <a href="#url"><img class="rounded foat-start" src="<?php $photo = substr($photo, 3); echo $photo?>" class="img-fluid radius-image" alt=""></a>
            <div class="box-content"> 
                <div class="dst-btm"></div>
            </div>
        </div>
    </div>
<?php } ?>
</div>
</div>
</div>
</section>
<?php
}
} else {
echo "No matching records found.";
}
} else {
echo "Error executing query: " . $errorInfo[2];
}?>



  <!-- //team -->
           

<?php
include('inc/footer.php');
?>

<?php
include('inc/scripts.php');
?>

</body>

</html>