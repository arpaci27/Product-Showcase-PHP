<?php
$sayfa = "Categories";
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
               <a href="addproducts.php" class="btn btn-primary">Add Category</a>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered text-left text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category Name</th>
                            <th>Category Image</th>
                            <th>Link</th>

                              <th>Description</th>
                            <th>Active</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sorgu = $baglanti->prepare("SELECT * FROM products");
                        $sorgu->execute();
                        while ($sonuc = $sorgu->fetch()) {
                        ?>
                            <tr>
                                <td><?php echo $sonuc["ID"] ?></td>
                                <td class="text-center"><?php echo $sonuc["ProductName"] ?></td>
                                <td>
                                    <img src="../assets/images/ÜRÜN GÖRSELLERİ/<?php echo $sonuc["ProductImage"] ?>" width="160" height="180" alt="">
                                </td>
                                <td><?php echo $sonuc["Link"] ?></td>
                                <td><?php echo $sonuc["Description"] ?></td>
                                <td><span class="fa fa-2x fa-<?php echo $sonuc['Active'] == "1" ? "check text-succes" : "times"  ?>"></span></td>
                                <td class="text-center">

                                    <?php if ($_SESSION['permission'] == 1) {  ?>
                                        <a href="productsedit.php?ID=<?= $sonuc["ID"] ?>">
                                            <span class="fa fa-edit fa-2x"></span></a>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($_SESSION['permission'] == 1) {  ?>
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
      <img src="../assets/images/ÜRÜN GÖRSELLERİ/<?php echo $sonuc["ProductImage"] ?>" width="160" height="180" alt="">
      Are you sure you want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="delete.php?ID=<?php echo $sonuc['ID'] ?>&table=products" class="btn btn-danger">Delete</a>
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