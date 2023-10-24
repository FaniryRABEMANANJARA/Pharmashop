<section id="m_details" class="m_details roomy-100 fix">
    <div class="container">
        <div class="row">
            <div class="main_details">
                <div class="col-md-6">
                    <div class="m_details_img">
                        <img src="<?php echo base_url() ?>assets/img/<?php echo $medic['image'] ?>.jpg" alt="" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="m_details_content m-bottom-40">
                        <h2><?php echo $medic['Nom'] ?></h2>
                        <p>Prix: <?php echo $medic['Prix']." $" ?></p>
                        <p>Quantité: <?php echo $medic['Stock'] ?></p>
                    </div>
                    <hr />
                    <div class="person_details m-top-40">
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <h4>Description</h4>
                                <p><?php echo $medic['Description'] ?></p>
                                <br/>
                                <a href="<?php echo site_url('/MedicamentController/addToCart/'.$medic['Id'])?>" class="btn btn-default text-uppercase">Ajouter au panier</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End off row -->
    </div> <!-- End off container -->
</section> <!-- End off Model Details Section -->
