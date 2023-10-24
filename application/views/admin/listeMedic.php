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
                        <h4 class="card-title">Liste des produits</h4>
                        <div>
                            <a href="<?php echo site_url('CRUDController/pageAjout') ?>"
                                class="btn pull-right hidden-sm-down btn-success"><i class="fa fa-plus-square">
                                    Ajouter</i></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Categorie</th>
                                        <th>Prix</th>
                                        <th>Stock</th>
                                        <th>Pérmié</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($medics as $key) { ?>
                                    <tr>
                                        <td style="text-align:left"><?php echo $key['Nom'] ?></td>
                                        <td style="text-align:left"><?php echo $key['cat'] ?></td>
                                        <td style="text-align:right"><?php echo $key['Prix'] ?>Ar</td>
                                        <td style="text-align:right"><?php echo $key['Stock'] ?></td>
                                        <td style="text-align:left">
                                            <?php echo date('d-m-Y H:m', strtotime($key['Date']))?>
                                        </td>
                                        <td><a class="btn btn-warning"
                                                href="<?php echo site_url('/CRUDController/pageModif/' . $key['Id'])?>"><i
                                                    class="fa fa-wrench"> Modiffier</i></a>
                                        <td><a class="btn btn-danger"
                                                href="<?php echo site_url('/CRUDController/supprimer/' . $key['Id'])?>"><i
                                                    class="fa fa-times"> Supprimer</i></a>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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
    <footer class="footer text-center">
        © 2017 Monster Admin by wrappixel.com
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>