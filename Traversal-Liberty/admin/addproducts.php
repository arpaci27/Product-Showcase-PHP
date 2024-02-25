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


    $Active=0;
    if(isset($_POST["Active"])){
        $Active=1;
    }
    $hata="";
    if(isset($_POST["Link"]) !="" && isset($_POST['Description']) !="" && isset($_FILES['ProductImage']["ProductName"]) != ""){
        
        if($_FILES['ProductImage']['error'] != 0){
            $hata.="Image is not selected.";
        }else{
            copy($_FILES['ProductImage']['tmp_name'], "../assets/images/ÜRÜN GÖRSELLERİ/".strtolower($_FILES['ProductImage']['ProductName']));
            $ekleSorgu =$baglanti->prepare("UPDATE products SET ProductName=:ProductName, ProductImage=:ProductImage, Link=:Link, Description=:Description, Active=:Active WHERE ID=:ID");
            $guncelle=$ekleSorgu->execute([
                'ProductName'=>htmlspecialchars($_POST['ProductName']),
                'ProductImage'=>strtolower($_FILES['ProductImage']['ProductName']),
                'Link'=>htmlspecialchars($_POST['Link']),
                'Description'=>htmlspecialchars($_POST['Description']),
                'Active'=>$Active,
            ]);   
            
if($guncelle){
    echo "<script> Swal.fire( {
        title: 'Added',
        text: 'The record has been updated.',
        icon: 'success',
        confirmButtonText: 'I understand'
    }).then((value)=>{
        if(value.isConfirmed){
            window.location.href='homepage.php'}})</script>";
 
}         
        }
        if($hata){
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

                                        <label>Products Name</label>
                                        <input type="text" class="form-control" required name="firstTitle" >

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label>Product Image</label>
                                        <input type="file" class="form-control" required name="firstLittleTitle" >

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label>Product Link</label>
                                        <input type="text" class="form-control" required name="secondTitle" >

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control"required name="littleDescription" >

                                    </div>
                                    <br>
                                    <div class="form-group form-check">
                                        <label>
                                        <input type="checkbox" class="form-check-input" required name="Active">Is Active?</label>

                                    </div>
                                    <br>
                                    <div class="form-group">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php
include("inc/afooter.php")
?>             