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
                            <th>Product Category</th>

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
    echo "<td> " . $sonuc["ProductName"] . "</td>";
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
    echo '<td class="text-center">';
    if ($_SESSION['permission'] == 1) {
        echo '<a href="#" data-toggle="modal" data-target="#deleteModal' .$sonuc['product_id'] . '"><span class="fa fa-trash fa-2x"></span></a>';
        echo '<div class="modal fade" id="deleteModal' . $sonuc['product_id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
        echo '<div class="modal-dialog" role="document">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<h5 class="modal-title" id="exampleModalLabel">Delete </h5>';
        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
        echo '<div class="modal-body">';
        echo 'Are you sure you want to delete   '.$sonuc['product_name'].' ?';
        echo '</div>';
        echo '<div class="modal-footer">';
        echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>';
        echo '<a href="deleteproduct.php?product_id='. $sonuc['product_id'] . '&table=productdetails" class="btn btn-danger">Delete</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</td>';
    
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