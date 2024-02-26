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
if($_POST){

    $Active=0;
    if(isset($_POST["Active"])){
        $Active=1;
    }
    if($_POST["username"] !="" && $_POST['email'] !="" && $_POST['password'] !="" && $_POST["permission"] !="" ){
            $ekleSorgu =$baglanti->prepare("INSERT INTO users SET username=:username, email=:email, 
            password=:password,permission=:permission, active=:active ");
            $ekle=$ekleSorgu->execute([
                'username'=>($_POST['username']),
                'email'=>($_POST['email']),
                'password'=>md5(($_POST['password'])),
                'permission'=>($_POST['permission']),
                'active'=>$Active,
            ]);   
            
            if($ekle){
                echo "<script> Swal.fire( {
                    title: 'Added',
                    text: 'New User Has Added.',
                    icon: 'success',
                    confirmButtonText: 'I understand'
                }).then((value)=>{
                    if(value.isConfirmed){
                        window.location.href='users.php'}})</script>";
 
}    else{
    echo "<script> Swal.fire( {
        title: 'Error!',
        text: 'Addin Unssuccesful!',
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
                        <h1 class="mt-4">Add Users</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard - Add Users</li>
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
                                        <input type="text" class="form-control" required name="username"value="<?= @$_POST["username"]?>" >

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="emial" class="form-control" required name="email" value="<?= @$_POST["email"]?>">

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" required name="password" >

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label>Permission</label><br>
                                        <label><input type="radio" name="permission" value="1">Admin</label><br>
                                        <label><input type="radio" name="permission" value="2">Normal User</label>

                                    </div>
                                    <br>
                                    <div class="form-group form-check">
                                        <label>
                                        <input type="checkbox" class="form-check-input" required name="active">Is Active?</label>

                                    </div>
                                    <br>
                                    <div class="form-group">
                                            <input type="submit" value="Add User" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php
include("inc/afooter.php")
?>             