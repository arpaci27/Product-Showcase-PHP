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
    $table = $_GET["table"];
    $table2 = $_GET["table2"];
    $product_id = (int)$_GET["product_id"]; 

    // Delete from the table with the foreign key constraint first
    $sorgu2 = $baglanti->prepare("DELETE FROM $table2 WHERE product_id=:product_id");
    $sonuc2 = $sorgu2->execute(['product_id' => $product_id]);

    // If the deletion from the table with the foreign key constraint was successful, delete from the parent table
    if($sonuc2){
        $sorgu = $baglanti->prepare("DELETE FROM $table WHERE product_id=:product_id");
        $sonuc = $sorgu->execute(['product_id' => $product_id]);

        if($sonuc){
            echo "<script> Swal.fire( {
                title: 'Success!',
                text: 'Deleted!',
                icon: 'success',
                confirmButtonText: 'I understand'
            }).then((value)=>{
                if(value.isConfirmed){
                    window.location.href='productdetails.php';
                }
            })</script>";
        } else {
            echo "Error deleting from $table: " . $baglanti->errorInfo()[2];
        }
    } else {
        echo "Error deleting from $table2: " . $baglanti->errorInfo()[2];
    }
}
?>

<?php
include("inc/afooter.php")
?>  