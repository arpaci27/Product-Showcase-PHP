<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title><?php echo $page ?> | Easly Trade </title>
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
        <h1><a class="navbar-brand mr-lg-5" href="index.php">
          Easly Trade
          </a></h1>
        <!-- if logo is image enable this   
      <a class="navbar-brand" href="#index.html">
          <img src="../assets/images/easlytrade logo[1]-1.png" alt="Your logo" title="Your logo" style="height:35px;" />
      </a> -->
        <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
          data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
          <span class="navbar-toggler-icon fa icon-close fa-times"></span>
          </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item  <?php if($page=="Home  ") echo "active" ?>">
              <a class="nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if($page=="Contact") echo "active" ?>">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item <?php if($page=="About") echo "active" ?>">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
   
            <li class="nav-item <?php if($page=="Products") echo "active" ?>">
              <a class="nav-link" href="products.php">Categories

              </a>
            </li>
            <li class="nav-item <?php if($page=="Catalog") echo "active" ?>"> 
              <a class="nav-link" href="catalogs.php">Catalogs</a>
            
            
          </ul>
        </div>
        <div class="d-lg-block d-none">
          <a href="contact.php" class="btn btn-style btn-secondary">Get In Touch</a>
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