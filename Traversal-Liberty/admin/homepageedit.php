<?php
$sayfa="Anasayfa";
include("inc/ahead.php");
include("../inc/db.php");
$sorgu = $baglanti->prepare("SELECT * FROM homepage WHERE ID=:ID");
$sorgu -> execute(['ID' =>(int)$_GET['ID']]);
$sonuc = $sorgu->fetch();
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
                                        <label for="firstTitle">First Title</label>
                                        <input type="text" class="form-control" id="firstTitle" name="firstTitle" value="<?php echo $sonuc["firstTitle"] ?>">

                                    </div>
                                    <div class="form-group">
                                        <label for="firstTitle">Second Title</label>
                                        <input type="text" class="form-control" id="firstLittleTitle" name="firstLittleTitle" value="<?php echo $sonuc["firstLittleTitle"] ?>">

                                    </div>
                                    <div class="form-group">
                                        <label for="firstTitle">First Little Title</label>
                                        <input type="text" class="form-control" id="secondTitle" name="secondTitle" value="<?php echo $sonuc["secondTitle"] ?>">

                                    </div>
                                    <div class="form-group">
                                        <label for="firstTitle">First Title</label>
                                        <input type="text" class="form-control" id="littleDescription" name="littleDescription" value="<?php echo $sonuc["littleDescription"] ?>">

                                    </div>
                                    <div class="form-group">
                                            <input type="submit" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php
include("inc/afooter.php")
?>             