<?php 
$page="Contact";
include('inc/db.php');
$tanimlama = "contactpage";
$key = "contact";
include('inc/head.php');

$sorgu = $baglanti->prepare("SELECT * FROM contact");
$sorgu->execute();
$sonuc2 = $sorgu->fetch();
 ?>
  <!-- //header -->
  <!-- about breadcrumb -->
  <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container py-2">
        <h2 class="title"><?php echo $language['GetInTouch'] ?></h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="#url"><?php echo $language['Home'] ?></a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> <?php echo $language['Contact'] ?> </li>
        </ul>
      </div>
    </div>
  </section>
  <!-- //about breadcrumb -->
<!-- contact-form -->
<section class="w3l-contact" id="contact">
  <div class="contact-infubd py-5">
    <div class="container py-lg-3">
      <div class="contact-grids row">
        <div class="col-lg-6 contact-left">
          <div class="partners">
            <div class="cont-details">
              <h5><?php echo $language['GetInTouch'] ?></h5>
           
            </div>
            <div class="hours">
              <h6 class="mt-4"><?php echo $language['email'] ?></h6>
              <p> <a href="mailto:<?= $sonuc2['email'] ?>">
               <?= $sonuc2['email'] ?></a></p>
              <h6 class="mt-4"><?php echo $language['visitus'] ?></h6>
              <p> <?= $sonuc2['adress'] ?></p><h6 class="mt-4">İzmir</h6>
              <p> <?= $sonuc2['adress2'] ?></p>
              <h6 class="mt-4"><?php echo $language['phone'] ?> </h6>
              <p class="margin-top"><a href="tel:<?= $sonuc2['phone'] ?>"><?= $sonuc2['phone'] ?></a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mt-lg-0 mt-5 contact-right">
          <form action="contact.php" id="contactform" name="sendMessage" method="post" class="signin-form">
            <div class="input-grids">
              <div class="form-group">
                <input type="text" name="txtName" id="name" placeholder="<?php echo $language['YourName'] ?>" class="contact-input" />
              </div>
              <div class="form-group">
                <input type="email" name="txtEmail" id="email" placeholder="<?php echo $language['YourEmail'] ?>" class="contact-input" required="" />
              </div>
              
            </div>
            <div class="form-group">
              <textarea name="txtMessage" id="message" placeholder="<?php echo $language['Message'] ?>" required=""></textarea>
            </div>
            <div class="text-right">
              <button class="btn btn-style btn-primary" id="sendMessageButton" type="submit"><?php echo $language['SendMessage'] ?></button>
            </div>
          </form>
          <script type="text/javascript" src="assets/js/sweetalert2.all.min.js"> </script>
          <?php 
        if($_POST){
            
             

            $sorgu = $baglanti->prepare("INSERT INTO contactform SET name=:name, email=:email, message=:message");
            $ekle=$sorgu->execute(
            [
              "name"=>htmlspecialchars($_POST["txtName"]),
              "email"=>htmlspecialchars($_POST["txtEmail"]),
              "message"=>htmlspecialchars($_POST["txtMessage"]),
            ]);

            if($ekle){
              echo "<script> Swal.fire( 'Success!', 'Your message has been sent successfully!', 'success')
                </script>" ;

              function mailgonder(){
                require "inc/class.phpmailer.php"; // PHPMailer dosyamızı çağırıyoruz  
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->From     = $_POST["txtEmail"]; //Gönderen kısmında yer alacak e-mail adresi  
                $mail->Sender   = $_POST["txtEmail"];
                $mail->FromName = $_POST["txtName"];
                $mail->Host     = "mail.easlytrade.com"; //SMTP server adresi  
                $mail->SMTPAuth = true;
                $mail->Username = "deneme@mesutd.com"; //SMTP kullanıcı adı  
                $mail->Password = "*****"; //SMTP şifre  
                $mail->SMTPSecure="";
                $mail->Port = "587";
                $mail->CharSet = "utf-8";
                $mail->WordWrap = 50;
                $mail->IsHTML(true); //Mailin HTML formatında hazırlanacağını bildiriyoruz.  
                $mail->Subject  = "Konu";
            
                $mail->Body = "mesaj";
                $mail->AltBody = strip_tags("mesaj");
                $mail->AddAddress("info@easlytrade.com");
                return ($mail->Send())?true:false;
                $mail->ClearAddresses();
                $mail->ClearAttachments();











              
          } 
          
          }else{
            echo "<script> Swal.fire( 'Error!', 'Your message could not be sent!', 'error')
                </script>" ;
        }
        }
          

          ?>
        </div>

      </div>
      <div class="map mt-5 pt-md-5">
        <h5><?php echo $language['Map'] ?></h5>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d101856.98668823444!2d37.3365207!3d37.0805725!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1531e6b4f7f18c2f%3A0xc02e8b35116baad0!2sGaziantep!5e0!3m2!1str!2str!4v1710368650564!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
</section>
<!-- /contact-form -->

 
      <?php
include('inc/footer.php');
?>
  
    
      <?php
include('inc/scripts.php');
?>
 
      
</body>

</html>