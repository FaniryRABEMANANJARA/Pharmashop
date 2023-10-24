<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <title>PharmaShop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="favicon.ico">

    <!--Google Fonts link-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">


    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/slick-theme.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fonticons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootsnav.css">


    <!--For Plugins external css-->
    <!--<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/plugins.css" />-->

    <!--Theme custom css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <!--<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/colors/maron.css">-->

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/responsive.css" />

    <?php
          if($page=='connection'){
        ?>
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/connection/images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url() ?>assets/connection/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url() ?>assets/connection/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/connection/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url() ?>assets/connection/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url() ?>assets/connection/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/connection/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/connection/css/main.css">
    <?php
          }
          if($page=='cart'){ ?>
    <link href="<?php echo base_url() ?>assets/cart/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/cart/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/cart/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/cart/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/cart/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/cart/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/cart/css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/cart/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="<?php echo base_url() ?>assets/cart/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="<?php echo base_url() ?>assets/cart/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="<?php echo base_url() ?>assets/cart/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed"
        href="<?php echo base_url() ?>assets/cart/images/ico/apple-touch-icon-57-precomposed.png">
    <?php
        }
        ?>

    <script src="<?php echo base_url() ?>assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body data-spy="scroll" data-target=".navbar-collapse">


    <!-- Preloader -->

    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object"></div>
                <div class="object"></div>
                <div class="object"></div>
                <div class="object"></div>
                <div class="object"></div>
                <div class="object"></div>
                <div class="object"></div>
                <div class="object"></div>
                <div class="object"></div>
                <div class="object"></div>
            </div>
        </div>
    </div>

    <!--End off Preloader -->


    <div class="culmn">
        <!--Home page style-->


        <nav class="navbar navbar-default navbar-fixed white no-background bootsnav text-uppercase">
            <!-- Start Top Search -->
            <div class="top-search">
                <div class="container">
                    <form action="<?php echo site_url('/medicamentcontroller/search')?>" method="GET">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control" name="query" placeholder="Rechercher">
                            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Top Search -->

            <div class="container">
                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <?php
                          $total = 0;
                          $list = $this->session->userdata('list');
                          $nb = $this->session->userdata('nb');
                        ?>
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="badge"><?php echo count($list);?></span>
                            </a>
                            <ul class="dropdown-menu cart-list">
                                <?php
                                    for($i = 0; $i < count($list) && $i < 3; $i++) {
                                      $total += $nb[$i] * $list[$i]['Prix'];
                                  ?>
                                <li>
                                    <a href="#" class="photo"><img
                                            src="<?php echo base_url() ?>assets/img/<?php echo $list[$i]['image']; ?>.jpg"
                                            class="cart-thumb" alt="" /></a>
                                    <h6><a href="#"><?php echo $list[$i]['Nom'];?></a></h6>
                                    <p class="m-top-10"><?php echo $nb[$i];?>x - <span
                                            class="price">$<?php echo $nb[$i] * $list[$i]['Prix'];?></span></p>
                                </li>
                                <?php
                                    }
                                    if($i < count($list)){ ?>
                                <a href="<?php echo site_url('/welcome/cart')?>" class="btn btn-link m-top-20"
                                    style="width: 100%;">Voir plus -></a>
                                <?php
                                      for($i; $i < count($list); $i++)
                                        $total += $nb[$i] * $list[$i]['Prix'];
                                    }
                                  ?>
                                <!---- More List ---->
                                <li class="total">
                                    <span class="pull-right"><strong>Total</strong>: $<?php echo $total;?></span>
                                    <a href="<?php echo site_url('/welcome/cart')?>" class="btn btn-cart">Panier</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.html">

                        <!-- <img src="<?php //echo base_url() ?>assets/images/logo.png" class="logo logo-display" alt="">
                            <img src="<?php //echo base_url() ?>assets/images/logo-black.png" class="logo logo-scrolled" alt=""> -->

                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                        <li><a href="<?php echo site_url()?>">home</a></li>
                        <li><a href="<?php echo site_url('/MedicamentController/index/1')?>">Medicaments</a></li>
                        <?php
                              $user = $this->session->userdata('user');
                              if($user == ''){
                            ?>
                        <li><a href="<?php echo site_url('/welcome/connection')?>">connexion</a></li>
                        <?php
                              }
                              else{
                            ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php
                                        echo $user['nom'];
                                      ?>
                            </a>
                            <ul class="dropdown-menu cart-list">
                                <li>
                                    <a href="<?php echo site_url('/welcome/logout')?>">Deconnexion</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                              }
                            ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>


        </nav>


        <!--Home Sections-->

        <section id="hello" class="home bg-mega">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="main_home text-center">
                        <div class="home_text">
                            <h4 class="text-white text-uppercase">a new drug shop</h4>
                            <h1 class="text-white text-uppercase">Welcome to PharmaShop</h1>

                            <div class="separator"></div>
                        </div>
                    </div>
                </div>
                <!--End off row-->
            </div>
            <!--End off container -->
        </section>
        <!--End off Home Sections-->

        <!--Company section-->
        <?php $this->load->view($page) ?>

        <section id="company" class="company bg-light">
            <div class="container">
                <div class="row">
                    <div class="main_company roomy-100 text-center">
                        <h3 class="text-uppercase">PharmaShop.</h3>
                        <p>Avenue 101 - Pharmacie Madagascar - Analakely - Antananarivo - Madagascar</p>
                        <p>(+261). 20. 00. 000. 000 - info@pharmaciemadagascar.lnk</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- scroll up-->
        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div><!-- End off scroll up -->


        <footer id="footer" class="footer bg-mega">
            <div class="container">
                <div class="row">
                    <div class="main_footer p-top-40 p-bottom-30">
                        <div class="col-md-6 text-left sm-text-center">
                            <p class="wow fadeInRight" data-wow-duration="1s">
                                Made with
                                <i class="fa fa-heart"></i>
                                by
                                <a target="_blank" href="http://bootstrapthemes.co">Bootstrap Themes</a>
                                <script>
                                document.write(new Date().getFullYear())
                                </script>
                                . All Rights Reserved
                            </p>
                        </div>
                        <div class="col-md-6 text-right sm-text-center sm-m-top-20">
                            <ul class="list-inline">
                                <li><a href="">Facebook</a></li>
                                <li><a href="">Twitter</a></li>
                                <li><a href="">Instagram</a></li>
                                <li><a href="">Pinterest</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>




    </div>

    <!-- JS includes -->

    <script src="<?php echo base_url() ?>assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/bootstrap.min.js"></script>

    <script src="<?php echo base_url() ?>assets/js/isotope.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.magnific-popup.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.easing.1.3.js"></script>
    <script src="<?php echo base_url() ?>assets/js/slick.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.collapse.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootsnav.js"></script>



    <script src="<?php echo base_url() ?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url() ?>assets/js/main.js"></script>

</body>

</html>