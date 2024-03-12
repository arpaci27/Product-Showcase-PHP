<?php 
session_start();
if(!isset($_SESSION['language'])){
  require('language/en.php');
}else{
  require('language/'.$_SESSION['language'].'.php');
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title><?php echo $page ?> | Easly Trade </title>
  <link rel="icon" type="image/x-icon" href="assets/images/easlytrade logo[1]-1.png ">
  <meta name="description" content="Easly Trade is a leading textile manufacturer in Istanbul, Turkey, specializing in sustainable and ethical production of knitwear, hoodies, t-shirts, and more for global brands.">
    <meta name="keywords" content="Easly Trade, textile production, sustainable fashion, ethical manufacturing, Istanbul, Turkey, knitwear, hoodies, t-shirts, jeans, dresses, shirts, tracksuits, scarves, beanies">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://www.easlytrade.com">
    <!-- Social Media Meta Tags -->
    <meta property="og:title" content="Easly Trade - Sustainable Textile Production in Istanbul, Turkey">
    <meta property="og:description" content="Easly Trade is a leading textile manufacturer in Istanbul, Turkey, specializing in sustainable and ethical production of knitwear, hoodies, t-shirts, and more for global brands.">
    <meta property="og:image" content="https://www.easlytrade.com/products.php">
    <meta property="og:url" content="https://www.easlytrade.com">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Easly Trade - Sustainable Textile Production in Istanbul, Turkey">
    <meta name="twitter:description" content="Easly Trade is a leading textile manufacturer in Istanbul, Turkey, specializing in sustainable and ethical production of knitwear, hoodies, t-shirts, and more for global brands.">
    <meta name="twitter:image" content="https://www.easlytrade.com/products.php">
  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&display=swap"
    rel="stylesheet">
  <!-- google fonts -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-liberty.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script><script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- Template CSS -->
</head>

<body>

  <!--header-->
  <header id="site-header" class="fixed-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg stroke">
         <h1><a class="navbar-brand mr-lg-5" href="index.php"style="text-transform: lowercase;">
         arpaci.net
          </a></h1>
        <!-- if logo is image enable this   -->
     
        <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
          data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
          <span class="navbar-toggler-icon fa icon-close fa-times"></span>
          </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item  <?php if($page=="Home") echo "active" ?>">
              <a class="nav-link " href="index.php"><?php echo $language['Home']?> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if($page=="Contact") echo "active" ?>">
              <a class="nav-link" href="contact.php"><?php echo $language['Contact']?></a>
            </li>
            <li class="nav-item <?php if($page=="About") echo "active" ?>">
              <a class="nav-link" href="about.php"><?php echo $language['About']?></a>
            </li>
   
            <li class="nav-item <?php if($page=="Products") echo "active" ?>">
              <a class="nav-link" href="products.php"><?php echo $language['Categories']?>

              </a>
            </li>
            
            <li class="nav-item <?php if($language=="tr") echo "active" ?>"> 
              <a class="nav-link" href="language.php?language=tr">TR</a>
            </li>
            <li class="nav-item <?php if($language=="en") echo "active" ?>"> 
              <a class="nav-link" href="language.php?language=en">EN</a>
            </li>
            <li class="nav-item <?php if($language=="de") echo "active" ?>"> 
              <a class="nav-link" href="language.php?language=de">DE</a>
            </li>
          </ul>
        </div>
        <div class="d-lg-block d-none">
          <a href="contact.php" class="btn btn-style btn-secondary"><?php echo $language['GetInTouch'] ?></a>
        </div>
        <!-- toggle switch for light and dark theme -->
        <div class="mobile-position">
          <nav class="navigation">
            <div class="theme-switch-wrapper">
              <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox">
                <div class="mode-container">
                  <i class="gg-sun"></i>
                  <i class="gg-moon"></i>
                </div>
              </label>
            </div>
          </nav>
        </div>
        <!-- //toggle switch for light and dark theme -->
      </nav>
    </div>
  </header>