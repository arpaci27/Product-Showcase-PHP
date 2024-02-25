<?php
$sayfa="Anasayfa";
include("inc/ahead.php");
include("../inc/db.php");
$sorgu = $baglanti->prepare("SELECT * FROM homepage");
$sorgu -> execute();
$sonuc = $sorgu->fetch();
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Home Page</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard - Home Page</li>
                        </ol>
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>First Title</th>
                                            <th>First Little Title</th>
                                            <th>Second Title</th>
                                            <th>Little Description</th>
                                           
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                        <tr>
                                            <td><?php echo $sonuc["firstTitle"] ?></td>
                                            <td><?php echo $sonuc["firstLittleTitle"]?></td>
                                            <td><?php echo $sonuc["secondTitle"]?></td>
                                            <td><?php echo $sonuc["littleDescription"]?></td>
                                            <td class="text-center">
                                                    <?php if($_SESSION['permission']==1){  ?>
                                            <a href="homepageedit.php?ID=<?=$sonuc["ID"]?>">
                                            <span class="fa fa-edit fa-2x"></span></a>
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