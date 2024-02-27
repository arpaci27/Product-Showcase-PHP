<?php
$sayfa = "Products";
include("inc/ahead.php");
include("../inc/db.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Assuming $baglanti is your PDO connection to the database
        $baglanti->beginTransaction();

        // Insert the product name into the productdetails table
        $productName = $_POST['ProductName1']; // You might need to adjust this based on your form structure
        $stmt = $baglanti->prepare("INSERT INTO productdetails (product_name) VALUES (:productName)");
        $stmt->execute([':productName' => $productName]);
        $productId = $baglanti->lastInsertId(); // Get the ID of the inserted product

        // Loop through uploaded files and insert into productdetailsimage table
        foreach ($_FILES as $file) {
            // Assuming you have a mechanism to save files and generate their names
            $filename = saveUploadedFile($file); // Implement this function based on your file handling
            if ($filename) {
                $stmt = $baglanti->prepare("INSERT INTO productdetailsimage (product_id, image_name) VALUES (:productId, :imageName)");
                $stmt->execute([':productId' => $productId, ':imageName' => $filename]);
            }
        }

        $baglanti->commit();
    } catch (Exception $e) {
        $baglanti->rollBack();
        echo "Error: " . $e->getMessage();
    }
}

function saveUploadedFile($file) {
    // Your file saving logic here
    // This function should handle the file upload and return the filename or filepath
    // Example implementation can vary based on how you're handling uploads

    $targetDirectory = "../assets/images/ÜRÜN GÖRSELLERİ"; // Specify the directory where files should be saved
    $targetFile = $targetDirectory . basename($file["name"]);
    $uploadOk = 1;
    // You can add file validation checks here (file size, type, etc.)

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return false;
    } else {
        // if everything is ok, try to upload file
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $targetFile; // Return the path of the uploaded file
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }
}
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard - <?= $sayfa ?></li>
        </ol>



        <div class="container-fluid px-4">


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <br>

                            <select class="form-select" aria-label="Default select example">
                                <option selected>Choose A Category</option>
                                <?php
                                $sorgu = $baglanti->prepare("SELECT * FROM products");
                                $sorgu->execute();
                                while ($sonuc = $sorgu->fetch()) {
                                ?>

                                    <option value="<?= $sonuc['ProductName'] ?>"><?= $sonuc['ProductName'] ?></option><?php } ?>
                            </select>

                        </div>
                        <div class="form-group">
                                    <br>

                                        <label>Title of Product</label>
                                        <input type="text" class="form-control" required name="ProductName" >

                                    </div>
                        <br>
                        <button id="plusButton" class="btn btn-primary"><i class="fa fa-plus"></i></button>
<div id="elementsContainer"></div>

<script>
let formGroupCounter = 0; // Counter for the entire form group

document.getElementById("plusButton").addEventListener("click", function(event) {
    event.preventDefault();
    var container = document.getElementById("elementsContainer");
    formGroupCounter++; // Increment the form group counter

    var newContent = `
        <div class="product-form-group" data-group="${formGroupCounter}">
            <div class="form-group">
                <br>
                <label>Product's Name</label>
                <input type="text" class="form-control" required name="ProductName${formGroupCounter}">
            </div>
            <br>
            <div class="image-container"></div>
            <button type="button" class="add-image-btn">Add Image</button>
            <button type="button" class="delete-group-btn">Delete Group</button>
        </div>
    `;

    var newElement = document.createElement("div");
    newElement.innerHTML = newContent;
    container.appendChild(newElement);

    // Initially add one image input
    addImageInput(newElement.querySelector('.image-container'), formGroupCounter, 1);

    // Add event listener for the "Add Image" button
    newElement.querySelector(".add-image-btn").addEventListener("click", function() {
        let imageContainer = this.previousElementSibling; // Select the image container
        let imageCount = imageContainer.querySelectorAll('.product-image-group').length + 1;
        addImageInput(imageContainer, formGroupCounter, imageCount); // Add image input
    });

    // Event listener for deleting the whole group
    newElement.querySelector(".delete-group-btn").addEventListener("click", function() {
        this.parentNode.remove();
    });
});

// Function to dynamically add image input fields
function addImageInput(container, groupCounter, imageCounter) {
    var newImageContent = `
        <div class="form-group product-image-group">
            <label>Product's Image</label>
            <input type="file" class="form-control product-image-input" required name="ProductImage${groupCounter}_${imageCounter}">
            <button type="button" class="delete-image-btn">Delete Image</button>
        </div>
    `;

    // Create a container for the new content
    var div = document.createElement("div");
    div.innerHTML = newImageContent.trim(); // Use .trim() to avoid any leading/trailing whitespace creating text nodes

    // Now, div.firstElementChild will be the .product-image-group div
    var imageGroup = div.firstElementChild;

    // Append the imageGroup to the container
    container.appendChild(imageGroup);

    // Now you can safely use querySelector on imageGroup
    imageGroup.querySelector(".delete-image-btn").addEventListener("click", function() {
        this.parentNode.remove(); // Remove this image input
        // Assuming container is the parent of imageGroup, update names accordingly
        var container = this.closest('.image-container');
        var groupCounter = this.closest('.product-form-group').getAttribute('data-group');
        updateImageInputNames(container, groupCounter);
    });
}

</script>
                        <br>
                        <div class="form-group">
                            <input type="submit" value="Add Category" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>

</main>
<?php
include("inc/afooter.php")
?>