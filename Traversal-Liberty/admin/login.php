<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <?php 
                                        session_start();
                                        include("../inc/db.php");
                                        $username="";
                                        if(isset($_SESSION['Oturum']) && $_SESSION["Oturum"]==6789){
                                            header("Location: index.php");
                                        }
                                        elseif(isset($_COOKIE["cookie"])){
                                            $sorgu=$baglanti->prepare("SELECT username, permission FROM users WHERE active=1 ");
                                            $sorgu->execute();
                                           while($sonuc=$sorgu->fetch()){
                                            if($_COOKIE["cookie"]==md5(md5($password)))
                                            {   
                                                $_SESSION["Oturum"]=6789;
                                                $_SESSION["username"]=$sonuc["username"];
                                                $_SESSION["permission"]= $sonuc["permission"];
                                                header("Location: index.php");
                                            

                                            }
                                           }
                                        }






                                        if($_POST){
                                            $username=$_POST["txtUname"];
                                            $password=$_POST["txtPassword"];
                                        }else

                                       // echo md5(md5("1234"));
                                        ?>
                                        <form method="post" action="login.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username"value="<?php echo $username ?>" autocomplete="username" type="text" name="txtUname" placeholder="UserName" />
                                                <label for="inputEmail">User Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="current-password" name=" txtPassword" type="password" placeholder="Password"autocomplete="current-password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" name="cbRemembers" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <input type="submit"class="btn btn-primary" value="Enter"/>
                                           
                                            </div>
                                        </form>
                                        <script type="text/javascript" src="../assets/js/sweetalert2.all.min.js"> </script>
                                        <?php 
                                        if($_POST){
                                            

                                            $sorgu=$baglanti->prepare("SELECT password, permission FROM users WHERE username=:username AND active=1 ");
                                            $sorgu->execute([
                                                'username'=>htmlspecialchars($username)
                                            ]);
                                            $sonuc=$sorgu->fetch();
                                            if(md5(md5($password))==$sonuc["password"]){

                                                $_SESSION["Oturum"]=6789;
                                                $_SESSION["username"]=$username;
                                                $_SESSION["permission"]= $sonuc["permission"];

                                                if(isset($_POST["cbRemembers"])){
                                                   setcookie("cookie",(md5($username)), time()+(60*60*24*7));
                                                }

                                                header("Location: index.php");
                                        }else{
                                            echo "<script> Swal.fire( 'Error!', 'User name or password is wrong!', 'error')
                                            </script>" ;
                                        }
                                   
                                }
                                
                                        ?>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
