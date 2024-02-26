<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js"> </script>
<?php
$sayfa="Products Edit";
include("inc/ahead.php");
if($_SESSION["permission"]!=1){
    echo "<script> Swal.fire( {
        title: 'Error!',
        text: 'Permission denied!',
        icon: 'error',
        confirmButtonText: 'I understand'
    }).then((value)=>{
        if(value.isConfirmed){
            window.location.href='products.php'}})</script>";
}
include("../inc/db.php");

if($_POST){

    $hata = "";
    $Active=0;
    if(isset($_POST["Active"])){
        $Active=1;
    }
    else{$hata="";}
    if(isset($_POST["Link"]) !="" && isset($_POST['Description']) !="" && isset($_FILES["ProductImage"]["name"]) != ""){
        
        if($_FILES['ProductImage']['error'] != 0){
            $hata.="Image is not selected.";
        }else{
            copy($_FILES['ProductImage']['tmp_name'], "../assets/images/ÜRÜN GÖRSELLERİ/".strtolower($_FILES['ProductImage']['name']));
            $ekleSorgu =$baglanti->prepare("INSERT INTO products SET ProductName=:ProductName, Description=:Description, ProductImage=:ProductImage, Link=:Link,  Active=:Active ");
            $ekle=$ekleSorgu->execute([
                'ProductName'=>($_POST['ProductName']),
                'ProductImage'=>strtolower($_FILES['ProductImage']['name']),
                'Link'=>($_POST['Link']),
                'Description'=>($_POST['Description']),
                'Active'=>$Active,
            ]);   
            
            if($ekle){
                echo "<script> Swal.fire( {
                    title: 'Added',
                    text: 'New Product Has Added.',
                    icon: 'success',
                    confirmButtonText: 'I understand'
                }).then((value)=>{
                    if(value.isConfirmed){
                        window.location.href='products.php'}})</script>";
 
}    
        }
        if($hata !=''){
            echo "<script> Swal.fire( {
                title: 'Error!',
                text: '$hata',
                icon: 'error',
                confirmButtonText: 'I understand'
            }).then((value)=>{
                if(value.isConfirmed){
                    window.location.href='products.php'}})</script>";
        
        }  
    }

   
}


?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard - Add Products</li>
                        </ol>
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                    <br>

                                        <label>Product's Name</label>
                                        <input type="text" class="form-control" required name="ProductName" >

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label>Product's Image</label>
                                        <input type="file" class="form-control" required name="ProductImage" >

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label>Product Link</label>
                                        <input type="text" class="form-control" required name="Link" value="<?= @$_POST["Link"] ?>" >

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control"required name="Description" value="<?= @$_POST["Description"]?>" >

                                    </div>
                                    <br>
                                    <div class="form-group form-check">
                                        <label>
                                        <input type="checkbox" class="form-check-input" required name="Active">Is Active?</label>

                                    </div>
                                    <br>
                                    <div class="form-group">
                                            <input type="submit" value="Add Product" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php
include("inc/afooter.php")
?>             