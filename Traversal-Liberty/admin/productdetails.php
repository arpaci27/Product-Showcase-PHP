<?php
$sayfa = "Products";
include("inc/ahead.php");
include("../inc/db.php");

?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $sayfa ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard - <?= $sayfa ?></li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
               <a href="addproductdetails.php" class="btn btn-primary">Add Product</a>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered text-left text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Product Image</th>

                            
                        </tr>
                    </thead>

                    <tbody><?php
                    $sorgu = $baglanti->prepare("SELECT * FROM productdetails");
$sorgu->execute();

// Iterate over each product
while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
    // For each product, fetch its images
    $productId = $sonuc["product_id"];
    $sql = "SELECT image_name FROM productdetailsimage WHERE product_id = :productId";
    $stmt = $baglanti->prepare($sql);
    $stmt->execute([':productId' => $productId]);
    
    // Display product details
    echo "<tr>";
    echo "<td>" . $sonuc["product_id"] . "</td>";
    echo "<td class='text-center'>" . $sonuc["product_name"] . "</td>";
    
    // Initialize an empty string to hold image tags
    $imageTags = "";

    // Append each image to the image tags string
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $imageTags .= "<img src='" . $row['image_name'] . "' width='160' height='180' alt=''>";
    }
    
    // If there are images, display them in a new table cell
    if (!empty($imageTags)) {
        echo "<td>" . $imageTags . "</td>";
    } else {
        echo "<td>No images available</td>";
    }
    
    echo "</tr>";
}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php
include("inc/afooter.php")
?>