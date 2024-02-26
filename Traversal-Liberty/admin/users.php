<?php
$sayfa = "Users";
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
            window.location.href='products.php'}})</script>";
}
include("../inc/db.php");
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $sayfa ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard - <?= $sayfa ?></li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
               <a href="adduser.php" class="btn btn-primary">Add User</a>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered text-left text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Permission</th>
                            <th>Active</th>
                            <th>Password<br>Update</th>
                            <th>Update</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sorgu = $baglanti->prepare("SELECT * FROM users");
                        $sorgu->execute();
                        while ($sonuc = $sorgu->fetch()) {
                        ?>
                            <tr>
                                <td><?php echo $sonuc["ID"] ?></td>
                                <td class="text-center"><?php echo $sonuc["username"] ?></td>
                                
                                <td><?php echo $sonuc["email"] ?></td>
                                
                                <td><?php echo $sonuc["permission"]==1?'Admin':'Normal user' ?></td>
                                <td><span class="fa fa-2x fa-<?php echo $sonuc['active'] == "1" ? "check text-succes" : "times"  ?>"></span></td>
                                <td class="text-center">

                                        <a href="userpasswordchange.php?ID=<?= $sonuc["ID"] ?>">
                                            <span class="fa fa-key fa-2x"></span></a>
                                </td>
                                <td class="text-center">

<a href="useredit.php?ID=<?= $sonuc["ID"] ?>">
    <span class="fa fa-edit fa-2x"></span></a>
</td>
                                <td class="text-center">
                                    
                                        <a  href="#"data-toggle="modal" data-target="#deleteModal<?php echo $sonuc["ID"] ?>"><span class="fa fa-trash fa-2x"></span></a>
                                        <div class="modal fade" id="deleteModal<?php echo $sonuc["ID"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Are you sure you want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="delete.php?ID=<?php echo $sonuc['ID'] ?>&table=users" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
                                       <?php } ?>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php
include("inc/afooter.php")
?>