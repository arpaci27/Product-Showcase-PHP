<?php
$sayfa = "Contact Form";
include("inc/ahead.php");
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
               <a href="addproducts.php" class="btn btn-primary">Contact Form</a>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered text-left text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>

                              <th>Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sorgu = $baglanti->prepare("SELECT * FROM contactform");
                        $sorgu->execute();
                        while ($sonuc = $sorgu->fetch()) {
                        ?>
                            <tr>
                                <td><?php echo $sonuc["ID"] ?></td>
                                <td ><?php echo $sonuc["name"] ?></td>
                                <td><?php echo $sonuc["email"] ?></td>
                                <td> <?php if ($_SESSION['permission'] == 1) {  ?>
                                        <a class="btn btn-primary" href="#"data-toggle="modal" data-target="#okuModal<?php echo $sonuc["ID"] ?>">Read</a>
                                        <div class="modal fade" id="okuModal<?php echo $sonuc["ID"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Message </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <?php echo $sonuc['message'] ?>
      </div>
      <div class="modal-footer">
        <a href="delete.php?ID=<?php echo $sonuc['ID'] ?>&table=contactform" class="btn btn-primary">DELETE</a>
      </div>
    </div>
  </div>
</div>
                                       <?php } ?></td>
                                <td><?= $sonuc['date'] ?></td>
                                <td class="text-center">

                                    
                                </td>
                                <td class="text-center">
                                    <?php if ($_SESSION['permission'] == 1) {  ?>
                                        <a  href="#"data-toggle="modal" data-target="#deleteModal<?php echo $sonuc["ID"] ?>"><span class="fa fa-trash fa-2x " style="color:red"></span></a>
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
        <a href="delete.php?ID=<?php echo $sonuc['ID'] ?>&table=contactform" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
                                       <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php
include("inc/afooter.php")
?>