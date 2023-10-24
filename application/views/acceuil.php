<!--About Sections-->
<section id="feature" class="feature p-top-100">
    <div class="container">
        <div class="row">
            <div class="main_feature">

                <div class="col-md-6 m-top-120">
                    <!-- Head Title -->
                    <div class="head_title">
                        <h2><?php echo $newMedic['Nom'] ?></h2>

                        <div class="separator_left"></div>
                    </div><!-- End off Head Title -->

                    <div class="feature_content wow fadeIn m-top-40">
                        <h4><?php echo $newMedic['Description'] ?></h4>

                        <div class="feature_btns m-top-30">
                            <a href="<?php echo site_url('/MedicamentController/getOneMedic/'.$newMedic['Id'])?>"
                                class="btn btn-default text-uppercase">more about this <i
                                    class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature_photo wow fadeIn sm-m-top-40">
                        <div class="photo_border"></div>
                        <div class="feature_img">
                            <img src="<?php echo base_url() ?>assets/img/<?php echo $newMedic['image'] ?>.jpg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End off row-->
    </div>
    <!--End off container -->
    <br />
    <br />
    <br />
    <br />
    <hr />
    <br />
    <br />
    <!--End off container -->

    <div class="container">
        <div class="row">


            <div class="service_content_area">
                <!-- Service LEFT SIDE -->
                <div class="col-md-4 service_left wow fadeInLeft">
                    <!-- Service -->

                    <div class="service_items">
                        <div class="row">

                            <!-- ICON -->
                            <div class="col-xs-3">
                                <div class="hexagon">
                                    <div class="about-content">
                                        <span class="fa fa-leaf"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-9">
                                <div class="text-left service_left_text">
                                    <h4 class="main-color">Nom du produit</h4>
                                    <p><?php echo $randomMedic['Nom'] ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end Single Service item -->

                    <!-- Service -->
                    <div class="service_items">
                        <div class="row">
                            <!-- ICON -->
                            <div class="col-xs-3">
                                <div class="hexagon">
                                    <div class="about-content">
                                        <span class="fa fa-diamond"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-9">
                                <div class="text-left service_left_text">
                                    <h4 class="main-color">Prix</h4>
                                    <p><?php echo $randomMedic['Prix']." $" ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end Single Service item -->

                    <!-- Service -->
                    <!-- end Single Service item -->


                </div>
                <!-- /END Service LEFT -->

                <!-- PHONE IMAGE -->
                <div class="col-md-4 sm-m-top-40 sm-text-center">
                    <div class="service-img wow bounceIn">
                        <img src="<?php echo base_url() ?>assets/img/<?php echo $randomMedic['image'] ?>.jpg"
                            alt="Architect Img">
                    </div>
                </div>

                <!-- Service RIGHT -->
                <div class="col-md-4 service_right wow fadeInRight sm-m-top-40">

                    <!-- Service -->
                    <div class="service_items">
                        <div class="row">

                            <div class="col-xs-9">
                                <div class="service_right_text p-l-15 text-right">
                                    <h4 class="main-color">Catégorie</h4>
                                    <p><?php echo $randomMedic['cat'] ?></p>
                                </div>
                            </div>

                            <!-- ICON -->
                            <div class="col-xs-3">
                                <div class="hexagon">
                                    <div class="about-content">
                                        <span class="fa fa-cut"></span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div> <!-- end Single Service item -->



                    <!-- Service -->
                    <div class="service_items">
                        <div class="row">

                            <div class="col-xs-9">
                                <div class="service_right_text p-l-15 text-right">
                                    <h4 class="main-color">Déscription</h4>
                                    <p><?php echo $randomMedic['Description'] ?></p>
                                </div>
                            </div>


                            <!-- ICON -->
                            <div class="col-xs-3">
                                <div class="hexagon">
                                    <div class="about-content">
                                        <span class="fa fa-bullhorn"></span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div><!-- end Single Service item -->

                    <!-- Service -->


                </div><!-- /END Service RIGHT -->
            </div>
        </div>
        <!--End off row -->
    </div>

</section>
<!--End off About section -->