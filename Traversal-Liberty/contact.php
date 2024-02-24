<?php 
$page="Contact";
include('inc/db.php');
$tanimlama = "contactpage";
$key = "contact";
include('inc/head.php');
session_start();
 ?>
  <!-- //header -->
  <!-- about breadcrumb -->
  <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container py-2">
        <h2 class="title">Contact Us</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="#url">Home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Contact </li>
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
              <h5>Get in touch</h5>
              <p class="mt-3 mb-4">Hi there, We are available 24/7 by fax, e-mail or by phone. Drop us line so we can talk
                futher about that.</p>
            </div>
            <div class="hours">
              <h6 class="mt-4">Email:</h6>
              <p> <a href="mailto:mail@traversal.com">
                mail@traversal.com</a></p>
              <h6 class="mt-4">Visit Us:</h6>
              <p> 78-80 Upper St Giles St. Norwich NR2 1LT United Kingdom.</p>
              <h6 class="mt-4">Contact:</h6>
              <p class="margin-top"><a href="tel:+44-255-366-88">+44-255-366-88</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mt-lg-0 mt-5 contact-right">
          <form action="contact.php" id="contactform" name="sendMessage" method="post" class="signin-form">
            <div class="input-grids">
              <div class="form-group">
                <input type="text" name="txtName" id="name" placeholder="Your Name*" class="contact-input" />
              </div>
              <div class="form-group">
                <input type="email" name="txtEmail" id="email" placeholder="Your Email*" class="contact-input" required="" />
              </div>
              <div class="form-group">
                <img src="inc/captcha.php" alt="">
                <input type="text" class="form-control" placeholder="Enter code" name="captcha"required="required" ></input>
              </div>
            </div>
            <div class="form-group">
              <textarea name="txtMessage" id="message" placeholder="Type your message here*" required=""></textarea>
            </div>
            <div class="text-right">
              <button class="btn btn-style btn-primary" id="sendMessageButton" type="submit">Send Message</button>
            </div>
          </form>
          <script type="text/javascript" src="assets/js/sweetalert2.all.min.js"> </script>
          <?php 
        if($_POST){
            if($_SESSION["captcha"] == $_POST["captcha"]){
             

            $sorgu = $baglanti->prepare("INSERT INTO contactform SET name=:name, email=:email, message=:message");
            $ekle=$sorgu->execute(
            [
              "name"=>htmlspecialchars($_POST["txtName"]),
              "email"=>htmlspecialchars($_POST["txtEmail"]),
              "message"=>htmlspecialchars($_POST["txtMessage"]),
            ]);

            if($ekle){


              function mailgonder(){
                require "inc/class.phpmailer.php"; // PHPMailer dosyamızı çağırıyoruz  
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->From     = "deneme@mesutd.com"; //Gönderen kısmında yer alacak e-mail adresi  
                $mail->Sender   = $_POST["txtEmail"];
                $mail->FromName = $_POST["txtName"];
                $mail->Host     = "mail.mesutd.com"; //SMTP server adresi  
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
                $mail->AddAddress("deneme@mesutd.com");
                return ($mail->Send())?true:false;
                $mail->ClearAddresses();
                $mail->ClearAttachments();











              echo "<script> Swal.fire( 'Success!', 'Your message has been sent successfully!', 'success')
                </script>" ;
          } 
          
          }else{
            echo "<script> Swal.fire( 'Error!', 'Your message could not be sent!', 'error')
                </script>" ;
        }
        }}
          

          ?>
        </div>

      </div>
      <div class="map mt-5 pt-md-5">
        <h5>Map</h5>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387145.86654334463!2d-74.25818682528057!3d40.70531100753592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1493028309728"
          style="border:0" allowfullscreen=""></iframe>
      </div>
    </div>
</section>
<!-- /contact-form -->

  <!--/w3l-footer-29-main-->
 
      <?php
include('inc/footer.php');
?>
  
    
      <?php
include('inc/scripts.php');
?>
 
      
</body>

</html>