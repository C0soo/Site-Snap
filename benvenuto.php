<?php include 'update_user.php'; ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" /> 
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Benvenuto - Marvel Snap List</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
</head>
<body class="sub_page">
    <div class="hero_area">
        <div class="hero_bg_box">
            <div class="bg_img_box">
                <img src="images/hero-bg.png" alt="">
            </div>
        </div>

        <!-- header section starts -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.html">
                        <span>
                            <img src="images/logo.png" alt="Snap" width="130" height="60">
                        </span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="deck.html">Deck Builder</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cards.html">Card List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="shop.html">Variant Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="team.html">Team</a>
                            </li>
                            <li class="nav-item active">
                                <?php if (isset($_SESSION['nome'])): ?>
                                    <a class="nav-link" href="benvenuto.php"> <i class="fa fa-user" aria-hidden="true"></i> Benvenuto</a>
                                <?php else: ?>
                                    <a class="nav-link" href="login.html"> <i class="fa fa-user" aria-hidden="true"></i> Login</a>
                                <?php endif; ?>
                            </li>
                            <form class="form-inline">
                                <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->

        <!-- welcome and edit form section -->
        <section class="login_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="login_form_container">
                            <h2>Benvenuto, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</h2>
                            <?php if ($msg): ?>
                                <div class="alert alert-info"><?php echo $msg; ?></div>
                            <?php endif; ?>
                            <form action="benvenuto.php" method="POST">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" id="nome" name="nome" class="form-control" value="<?php echo htmlspecialchars($user['nome']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="cognome">Cognome:</label>
                                    <input type="text" id="cognome" name="cognome" class="form-control" value="<?php echo htmlspecialchars($user['cognome']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input type="text" id="username" name="username" class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" id="password" name="password" class="form-control" value="<?php echo htmlspecialchars($user['password']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Telefono:</label>
                                    <input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo htmlspecialchars($user['telefono']); ?>" required>
                                </div>
                                <button type="submit" name="update" class="btn btn-primary">Aggiorna</button>
                                <button type="submit" name="logout" class="btn btn-secondary">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end welcome and edit form section -->
    </div>

    <!-- info section -->

<section class="info_section layout_padding2">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-3 info_col">
        <div class="info_contact">
          <h4>
            Contatti
          </h4>
          <div class="contact_link_box">
            <a href="https://www.google.com/maps/place/Istituto+di+Istruzione+Superiore+Antonio+Badoni/@45.807296,9.2588074,12z/data=!4m10!1m2!2m1!1sbadoni!3m6!1s0x47841d2daf12d41d:0x3f8e750d3a5ae1c!8m2!3d45.8525762!4d9.4012985!15sCgZiYWRvbmmSAQtoaWdoX3NjaG9vbOABAA!16s%2Fg%2F1tjz6tq4?hl=it&entry=ttu">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                Location
              </span>
            </a>
            <a href="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call +39 3476993854
              </span>
            </a>
            <a href="">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                info@marvelsnaplist.com
              </span>
            </a>
          </div>
        </div>
        <div class="info_social">
          <a href="https://www.facebook.com/?locale=it_IT">
            <i class="fa fa-facebook" aria-hidden="true"></i>
          </a>
          <a href="https://twitter.com/?lang=it">
            <i class="fa fa-twitter" aria-hidden="true"></i>
          </a>
          <a href="https://it.linkedin.com/">
            <i class="fa fa-linkedin" aria-hidden="true"></i>
          </a>
          <a href="https://www.instagram.com/">
            <i class="fa fa-instagram" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 info_col">
        <div class="info_detail" style="text-align: justify;">
          <h4>
            Informazioni
          </h4>
          <p >
            Marvel Snap List è il tuo portale definitivo per esplorare, scoprire e dominare il gioco di carte collezionabili più dinamico e visivamente strabiliante del mondo Marvel
          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-2 mx-auto info_col">
        <div class="info_link_box">
          <h4>
            Links
          </h4>
          <div class="info_links">
            <a class="active" href="index.html">
              Home
            </a>
            <a class="" href="deck.html">
              Deck Builder
            </a>
            <a class="" href="cards.html">
              Card List
            </a>
            <a class="" href="shop.html">
              Variant Shop
            </a>
            <a class="" href="team.html">
              Team
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 info_col ">
        <h4>
          Iscriviti
        </h4>
        <form action="#">
          <input type="text" placeholder="Enter email" />
          <button type="submit">
            Subscribe
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- footer section -->
<section class="footer_section">
  <div class="container">
    <p>
      &copy; <span id="displayYear"></span> All Rights Reserved By Marvel Snap List </a>
    </p>
  </div>
</section>
<!-- footer section -->

<!-- jQery -->
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- popper js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<!-- bootstrap js -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- owl slider -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<!-- custom js -->
<script type="text/javascript" src="js/custom.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
</script>
<!-- End Google Map -->

</body>

</html>