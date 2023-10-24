
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->

    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->

        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->

            <div class="row">
                <!-- column -->
                <div class="col-sm-12">

                    <div class="card">

                        <div class="card-block">
                            <h4 class="card-title">Liste des clients</h4>
                            <div>
                               <a href="<?php echo site_url('/AdministrateurController/formulaireClient')?>" class="btn pull-right fa fa-plus-square btn btn-success"> Ajouter</a>

                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Email</th>
                                            <th>Argent</th>
                                            <th> </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($listeClient as $client) { ?>
                                        <tr>
                                            <td style="text-align:left"><?php echo $client['Nom'] ;?></td>
                                            <td style="text-align:left"><?php echo $client['Prenom'] ;?></td>
                                            <td style="text-align:left"><?php echo $client['Email'] ;?></td>
                                            <td style="text-align:right"><?php echo $client['Argent'] ;?>$</td>
                                            <td> <a href="<?php echo site_url('/AdministrateurController/formulaireClient/modification/'.$client['Id'])?>" class="btn btn-warning"><i class="fa fa-wrench"> Modifier</i></a> </td>
                                            <td> <a href="<?php echo site_url('/AdministrateurController/supprimerClient/'.$client['Id'].'/'.$nbrPage)?>" class="btn btn-danger"><i class="fa fa-times"> Supprimer</i></a> </td>
                                        </tr>
                                      <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                            <div style="clear: both;"></div>
                            <div width="100%" height="5%">
                            <?php if($nbrPage>1){ ?>
                                <a href="<?php echo site_url('/AdministrateurController/clients/'.($nbrPage-1))?>" class="btn btn-link m-top-20" style="margin-left:500px">Précédent</a>
                            <?php } ?>
                            <?php if($nbrPage<$pageMax){ ?>
                                <a href="<?php echo site_url('/AdministrateurController/clients/'.($nbrPage+1))?>" class="btn btn-link m-top-20" style="margin-left:500px">Suivant</a>
                            <?php } ?>
                        </div>
                        <div>

                        </div>


                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
