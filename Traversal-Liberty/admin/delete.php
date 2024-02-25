<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js"> </script>

<?php
$sayfa="Delete Page";
include("inc/ahead.php");

if($_SESSION["permission"]!=1){
    echo "<script> Swal.fire( {
        title: 'Error!',
        text: 'Permission denied!',
        icon: 'error',
        confirmButtonText: 'I understand'
    }).then((value)=>{
        if(value.isConfirmed){
            window.location.href='homepage.php'}})</script>";
}
?>

<?php
include("inc/afooter.php")
?>  