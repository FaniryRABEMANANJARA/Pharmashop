<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Ajout de médicament</h3>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-block">
                        <form class="form-horizontal form-material"
                            action="<?php echo site_url('CRUDController/ajouter') ?>" method="POST">
                            <div class="form-group">
                                <label class="col-md-12">Nom</label>
                                <div class="col-md-12">
                                    <input name="nom" type="text" placeholder="" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Prix</label>
                                <div class="col-md-12">
                                    <input type="number" name="prix" placeholder=""
                                        class="form-control form-control-line" name="example-email" id="example-email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Stock</label>
                                <div class="col-md-12">
                                    <input type="number" name="stock" placeholder=""
                                        class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Description</label>
                                <div class="col-md-12">
                                    <input type="text" name="description" placeholder=""
                                        class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Composant</label>
                                <div class="col-sm-12">

                                    <select name="composant" class="form-control form-control-line">
                                        <?php foreach ($listeComposant as $key) { ?>
                                        <option><?php echo $key['Nom'] ?></option>
                                        <?php
                                        }
                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Catégorie</label>
                                <div class="col-sm-12">

                                    <select name="categorie" class="form-control form-control-line">
                                        <?php foreach ($listeCat as $key) { ?>
                                        <option><?php echo $key['Nom'] ?></option>
                                        <?php
                                        }
                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Périmé le</label>
                                <div class="col-md-12">
                                    <input name="date" type="datetime-local" placeholder=""
                                        class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Ajouter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
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