<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
<style>.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}
.float:hover{
  background-color:#128C7E;
  color:#FFF;
  scale: 1.1;
}
.my-float{
	margin-top:16px;
}</style>
<footer>
    <!-- footer -->
    <section class="w3l-footer">
      <div class="w3l-footer-16-main py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 column">
              <div class="row">
                <div class="col-md-4 column">
                  <h3>Arpaci.net</h3>
                  <ul class="footer-gd-16">
                    <li><a href="index.php"><?php echo $language['Home'] ?></a></li>
                    <li><a href="about.php"><?php echo $language['About'] ?></a></li>
                    <li><a href="products.php"><?php echo $language['Categories'] ?></a></li>
                    <li><a href="catalogs.php"><?php echo $language['Catalog'] ?></a></li>
                    <li><a href="contact.php"><?php echo $language['Contact'] ?></a></li>
                  </ul>
                </div>
                <div class="col-md-4 column mt-md-0 mt-4">
                  <h3><?php echo $language['UsefulLinks'] ?></h3>
                  <ul class="footer-gd-16">
                    <li><a href="products.php"><?php echo $language['PopularProducts'] ?></a></li>
                    <li><a href="about.php"><?php echo $language['About'] ?></a></li>
                    <li><a href="pricing.php"><?php echo $language['Catalog'] ?></a></li>
                  </ul>
                </div>
               
              </div>
            </div>
            
          </div>
          <div class="d-flex below-section justify-content-between align-items-center pt-4 mt-5">
            <div class="columns text-lg-left text-center">
              <p>&copy; <?php echo $language['CopyRight'] ?> </p>
              </p>
            </div>
            <div class="columns-2 mt-lg-0 mt-3">
              <ul class="social">
                <li><a href="https://www.facebook.com/profile.php?id=100085916282761"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                </li>
                <li><a href="https://www.linkedin.com/in/easly-trade-a33234250/"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
                </li>
                <li><a href="https://twitter.com/easlytrade"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                </li>
                <li><a href="https://tr.pinterest.com/easlytrade/?invite_code=8b9df82e3a4f4809ad6b56e4656c26a6&sender=969118550973331489"><span class="fa fa-brands fa-pinterest-p" aria-hidden="true"></span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  
      <!-- move top -->
     
      <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
        };
  
        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          } else {
          }
        }
  
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }
      </script>
      <!-- //move top -->
      <script>
        $(function () {
          $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
          })
        });
      </script>
    </section>
    <!-- //footer -->
  </footer>