<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js"> </script>
<?php
$sayfa="Anasayfa";
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
include("../inc/db.php");
$sorgu = $baglanti->prepare("SELECT * FROM homepage WHERE ID=:ID");
$sorgu -> execute(['ID' =>(int)$_GET['ID']]);
$sonuc = $sorgu->fetch();

if($_POST){
    $guncelleSorgu = $baglanti->prepare("UPDATE homepage SET firstTitle=:firstTitle, firstLittleTitle=:firstLittleTitle, secondTitle=:secondTitle, littleDescription=:littleDescription WHERE ID=:ID");
    $guncelle = $guncelleSorgu->execute([
        'firstTitle' => $_POST['firstTitle'],
        'firstLittleTitle' => $_POST['firstLittleTitle'],
        'secondTitle' => $_POST['secondTitle'],
        'littleDescription' => $_POST['littleDescription'],
        'ID' => (int)$_GET['ID']
    ]);
}

if($guncelle){
    echo "<script> Swal.fire( {
        title: 'Updated',
        text: 'The record has been updated.',
        icon: 'success',
        confirmButtonText: 'I understand'
    }).then((value)=>{
        if(value.isConfirmed){
            window.location.href='homepage.php'}})</script>";
 
}
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Home Page Edit</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard - Home Page Edit</li>
                        </ol>
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                    <br>

                                        <label for="firstTitle">First Title</label>
                                        <input type="text" class="form-control" id="firstTitle" name="firstTitle" value="<?php echo $sonuc["firstTitle"] ?>">

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="firstTitle">Second Title</label>
                                        <input type="text" class="form-control" id="firstLittleTitle" name="firstLittleTitle" value="<?php echo $sonuc["firstLittleTitle"] ?>">

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="firstTitle">First Little Title</label>
                                        <input type="text" class="form-control" id="secondTitle" name="secondTitle" value="<?php echo $sonuc["secondTitle"] ?>">

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="firstTitle">First Title</label>
                                        <input type="text" class="form-control" id="littleDescription" name="littleDescription" value="<?php echo $sonuc["littleDescription"] ?>">

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