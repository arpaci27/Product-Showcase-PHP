<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js"> </script>

<?php
$sayfa="Delete Page";
include("inc/ahead.php");
include("../inc/db.php");
if($_SESSION["permission"]!=1){
    echo "<script> Swal.fire( {
        title: 'Error!',
        text: 'Permission denied!',
        icon: 'error',
        confirmButtonText: 'I understand'
    }).then((value)=>{
        if(value.isConfirmed){
            window.location.href='index.php'}})</script>";
            exit;
}


if($_GET){
    $table=$_GET["table"];
    $product_id=(int)$_GET["product_id"]; 

    $sorgu =$baglanti->prepare("DELETE FROM $table WHERE product_id=:product_id");
    $sonuc=$sorgu->execute(['product_id'=>$product_id]);
    if($sonuc){
        echo "<script> Swal.fire( {
            title: 'Succes!',
            text: 'Deleted!',
            icon: 'success',
            confirmButtonText: 'I understand'
        }).then((value)=>{
            if(value.isConfirmed){
                window.location.href='$table.php'}})</script>";
    }
}
?>

<?php
include("inc/afooter.php")
?>  