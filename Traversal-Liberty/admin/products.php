<?php
$sayfa="Products";
include("inc/ahead.php");
include("../inc/db.php");

?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?=$sayfa ?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard - <?=$sayfa ?></li>
                        </ol>
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Product Image</th>
                                           <th>Active</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                        <?php 
                                        $sorgu = $baglanti->prepare("SELECT * FROM products");
                                        $sorgu -> execute();
                                       while($sonuc = $sorgu->fetch()){
                                        ?>
                                        <tr>
                                            <td><?php echo $sonuc["ID"] ?></td>
                                            <td><?php echo $sonuc["ProductName"] ?></td>
                                            <td>
                                                <img src="../assets/images/ÜRÜN GÖRSELLERİ/<?php echo $sonuc["ProductImage"]?>" width="80" height="90" alt="">
                                                </td>
                                            <td><?php echo $sonuc["Active"]?></td>
                                            <td class="text-center">
                                               
                                                    <?php if($_SESSION['permission']==1){  ?>
                                            <a href="productsedit.php?ID=<?=$sonuc["ID"]?>">
                                            <span class="fa fa-edit fa-2x"></span></a>
                               <?php } ?>         
                                        </td>
                                        <td class="text-center">
                                            SIL
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