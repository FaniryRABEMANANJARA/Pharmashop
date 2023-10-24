<!DOCTYPE html>
<html lang="en">

<head>
    <title>PharmaShop</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url() ?>assets/connection/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url() ?>assets/connection/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/connection/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url() ?>assets/connection/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url() ?>assets/connection/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/connection/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/connection/css/main.css">
    <!--===============================================================================================-->
</head>

<body style="background-image: url('<?php echo base_url('assets/images/background/connect-bg.jpg') ?>');">

    <div class="limiter">

        <div class="container-login100">
            <div class="wrap-login100">
                <a href="<?php echo base_url() ?>">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="<?php echo base_url() ?>assets/connection/images/img-01.png" alt="IMG">
                    </div>
                </a>

                <?php
					if($type == "connect"){
				?>
                <form class="login100-form validate-form" action="connect" method="POST">
                    <span class="login100-form-title">
                        Connexion membre
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Email valide requis: ex@abc.xyz">
                        <input class="form-control input100" id="email" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Mot de passe requis">
                        <input class="form-control input100" id="password" type="password" name="password"
                            placeholder="Mot de passe">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Connexion
                        </button>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="<?php echo site_url('/welcome/signup')?>">
                            Créer un compte
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
                <?php
					}
					else{ ?>
                <form class="login100-form validate-form" action="join" method="POST">
                    <span class="login100-form-title">
                        Inscription
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Nom requis">
                        <input class="form-control input100" id="nom" type="text" name="nom" placeholder="Nom">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Prénom requis">
                        <input class="form-control input100" id="prenom" type="text" name="prenom" placeholder="Prenom">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Email valide requis: ex@abc.xyz">
                        <input class="form-control input100" id="email" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Mot de passe requis">
                        <input class="form-control input100" id="password" type="password" name="password"
                            placeholder="Mot de passe">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Inscrition
                        </button>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="<?php echo site_url('/welcome/connection')?>">
                            Se connecter
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
                <?php
					}
				?>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/connection/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/connection/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url() ?>assets/connection/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/connection/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/connection/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
    </script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/connection/js/main.js"></script>

</body>

</html>