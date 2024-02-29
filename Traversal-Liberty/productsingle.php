<?php
$page ="Product";
include('inc/head.php');
include('inc/db.php');
$id = $_GET["ID"];
?>


  <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container">
        <h2 class="title">Denım</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="#url">Home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span>Denım</li>
        </ul>
      </div>
    </div>
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
            echo '<section class="w3l-team" id="team">';
            echo '<div class="team-block py-5">';
            echo '<div class="container py-lg-5">';
            echo '<div class="title-content text-center mb-lg-3 mb-4">';
            echo '<h3 class="hny-title">' . $productName . '</h3>';
            echo '</div>';
            echo '<div class="row justify-content-center">';
            
            foreach ($photos as $photo) {
                echo '<div class="col-lg-3 col-6 mt-lg-5 mt-4">';
                echo '<div class="box16">';
                echo '<a href="#url"><img class="rounded foat-start" src="' . $photo . '" class="img-fluid radius-image" alt=""></a>';
                echo '<div class="box-content">';
                echo '<div class="dst-btm">
              
                </div>';
                echo '</div>';
                echo '</div>';
                echo '</div>'; 
            }
            
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</section>';
        }
    } else {
        echo "No matching records found.";
    }
} else {
    echo "Error executing query: " . $errorInfo[2];
}

?>
  <div class="py-5 w3l-homeblock1 text-center">
    <div class="container mt-md-3">
        <h3 class="blog-desc-big text-center mb-4">Denım</h3>
    </div>
</div>
<style>
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .box16 {
        opacity: 0; /* Initially hidden */
        visibility: hidden;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

  <!-- //team -->
           

<?php
include('inc/footer.php');
?>

<?php
include('inc/scripts.php');
?>

</body>

</html>