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
    if(isset($_FILES["catalog"]["name"]) != ""){
        
        if($_FILES['catalog']['error'] != 0){
            $hata.="Catalog is not selected.";
        }else{
            copy($_FILES['catalog']['tmp_name'], "../assets/pdf".strtolower($_FILES['catalog']['name']));
            $ekleSorgu =$baglanti->prepare("INSERT INTO catalogs SET catalog=:catalog");
            $ekle=$ekleSorgu->execute([
                'catalog'=>($_POST['catalog']),
                
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
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                    <br>

                                        <label>Catalog</label>
                                        <input type="file" class="form-control" required name="catalog" >

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