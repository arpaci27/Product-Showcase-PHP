<?php
$sayfa="Catalogs";
include("inc/ahead.php");
include("../inc/db.php");
$sorgu = $baglanti->prepare("SELECT * FROM catalogs");
$sorgu -> execute();
$sonuc = $sorgu->fetch();
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?= $sayfa ?> </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard - Catalogs</li>
                        </ol>
                     
                        <div class="card mb-4">
                            <div class="card-header">
                               <a class="btn btn-primary" href="addcatalog.php">Add Catalog</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Catalog</th>
                                           
                                           
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                        <tr>
                                        <td><?= $sonuc['ID'] ?> </td>

                                            <td><embed src="../assets/pdf/Yarn-Catalogue-Easlytrade-.pdf" type="application/pdf" height="500px" width="100%"> </td>
                                                
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