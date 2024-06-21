<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js"> </script>
<?php
$sayfa="Users";
include("inc/ahead.php");
if($_SESSION["permission"]!=1){
    echo "<script> Swal.fire( {
        title: 'Error!',
        text: 'Permission denied!',
        icon: 'error',
        confirmButtonText: 'I understand'
    }).then((value)=>{
        if(value.isConfirmed){
            window.location.href='index.php'}})</script>";
}
include("../inc/db.php");
$hata = "";
$sorgu = $baglanti->prepare("SELECT * FROM users WHERE ID=:ID");
$sorgu->execute([
    'ID'=>$_GET['ID']]);
$sonuc = $sorgu->fetch();
if($_POST){

    $Active=1;
    if(isset($_POST["Active"])){
        $Active=1;
    }
    if($_POST["username"] !="" && $_POST['email'] !="" && $_POST["permission"] !="" ){
            $ekleSorgu =$baglanti->prepare("UPDATE  users SET username=:username, email=:email, 
          permission=:permission, active=:active WHERE ID=:ID ");
            $ekle=$ekleSorgu->execute([
                'username'=>($_POST['username']),
                'email'=>($_POST['email']),
                'permission'=>($_POST['permission']),
                'active'=>$Active,
                'ID'=>$_GET['ID']
            ]);   
            
            if($ekle){
                echo "<script> Swal.fire( {
                    title: 'Added',
                    text: 'Update is Succesful!.',
                    icon: 'success',
                    confirmButtonText: 'I understand'
                }).then((value)=>{
                    if(value.isConfirmed){
                        window.location.href='users.php'}})</script>";
 
}    else{
    echo "<script> Swal.fire( {
        title: 'Error!',
        text: 'Update Unssuccesful!',
        icon: 'error',
        confirmButtonText: 'I understand'
    }).then((value)=>{
        if(value.isConfirmed){
            window.location.href='users.php'}})</script>";

}  
        }
    }


?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">?Update Users</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard - Update Users</li>
                        </ol>
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                    <br>

                                        <label>User Name</label>
                                        <input type="text" class="form-control" required name="username"value="<?= $sonuc["username"]?>" >

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="emial" class="form-control" required name="email" value="<?= $sonuc["email"]?>">

                                    </div>
                                    <br>

          

                                    <div class="form-group">
                                        <label>Permission</label><br>
                                        <label><input type="radio" name="permission" value="1" <?= $sonuc['permission']=='1'?'checked':'' ?>> Admin </label><br>
                                        <label><input type="radio" name="permission" value="2" <?= $sonuc['permission']=='2'?'checked':'' ?>>Normal User</label>

                                    </div>
                                    <br>
                                    <div class="form-group form-check">
                                        <label>
                                        <input type="checkbox" <?= $sonuc['active']=='1'?'checked':'' ?> class="form-check-input"  name="active">Is Active?</label>

                                    </div>
                                    <br>
                                    <div class="form-group">
                                            <input type="submit" value="Update User" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php
include("inc/afooter.php")
?>             