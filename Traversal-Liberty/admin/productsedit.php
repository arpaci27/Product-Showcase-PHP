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
$id=$_GET["ID"];
$sorgu = $baglanti->prepare("SELECT * FROM products WHERE ID=:ID");
$sorgu->execute(['ID'=>$id]);
$sonuc = $sorgu->fetch();

if($_POST){
    $foto="";
    $hata = "";
    $Active=0;
    if(isset($_POST["Active"])){
        $Active=1;
    }
    else{$hata="";}
    if(($_POST["Link"]) !="" && ($_POST['Description']) !="" && ($_FILES["ProductImage"]["name"]) != ""){
        
        if($_FILES['ProductImage']['error'] != 0){
            $hata.="Image is not selected.";
        }else{
            copy($_FILES['ProductImage']['tmp_name'], "../assets/images/ÜRÜN GÖRSELLERİ/".strtolower($_FILES['ProductImage']['name']));
            //unlink("../assets/images/ÜRÜN GÖRSELLERİ/".$sonuc['ProductImage']);
            $foto=strtolower($_FILES['ProductImage']['name']);
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
    }else{
        $foto=$sonuc["ProductImage"];
    }
    if(isset($_POST["Link"]) !="" && ($_POST['Description']) !="" && $hata==""){
        $guncelleSorgu = $baglanti->prepare("UPDATE products SET ProductName=:ProductName,
         Description=:Description, ProductImage=:ProductImage, Link=:Link,  Active=:Active WHERE ID=:ID");
         $guncelle=$guncelleSorgu->execute([
             'ProductName'=>($_POST['ProductName']),
             'ProductImage'=> $foto,
             'Link'=>($_POST['Link']),
             'Description'=>($_POST['Description']),
             'Active'=>$Active,
             'ID'=>$id
         ]);
    }if($guncelle){
        echo "<script> Swal.fire( {
            title: 'Succes!',
            text: 'The product Updated!',
            icon: 'success',
            confirmButtonText: 'I understand'
        }).then((value)=>{
            if(value.isConfirmed){
                window.location.href='products.php'}})</script>";
    }
   
}


?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Product</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard - Update Product</li>
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
                                        <input type="text" class="form-control" required name="ProductName" value="<?= $sonuc["ProductName"] ?>">

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <img src="../assets/images/ÜRÜN GÖRSELLERİ/<?= $sonuc['ProductImage'] ?>" width="160" height="180" alt="">
                                        <label>Product's Image</label>
                                        <input type="file" class="form-control"  name="ProductImage" >

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label>Product Link</label>
                                        <input type="text" class="form-control" required name="Link" value="<?= $sonuc["Link"] ?>" >

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control"required name="Description" value="<?= $sonuc["Description"]?>" >

                                    </div>
                                    <br>
                                    <div class="form-group form-check">
                                        <label>
                                        <input type="checkbox" class="form-check-input <?= $sonuc['Active']==1?'checked':'' ;  ?>" required name="Active">Is Active?</label>

                                    </div>
                                    <br>
                                    <div class="form-group">
                                            <input type="submit" value="Update Product" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php
include("inc/afooter.php")
?>             