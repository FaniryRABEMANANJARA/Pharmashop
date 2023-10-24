<div class="page-wrapper">
<div class="container-fluid" >
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
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
                    <form class="form-horizontal form-material" action="<?php
                    if($type=="modification")
                      echo site_url('AdministrateurController/modificationClient');
                      else
                      echo site_url('AdministrateurController/ajoutClient');

                    ?>" method="POST">
                        <div class="form-group">
                            <label class="col-md-12">Nom</label>
                            <div class="col-md-12">
                              <input type="hidden" name="id" value="<?php echo $id ;?>">
                                <input type="text" name="nom" value="<?php if($type=="modification"){echo $client['Nom'];} ?>" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Prénom</label>
                            <div class="col-md-12">

                                <input type="text" name="prenom" value="<?php if($type=="modification"){echo $client['Prenom'];} ?>" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">E-mail</label>
                            <div class="col-md-12">
                                <input type="email" name="email" value="<?php if($type=="modification"){echo $client['Email'];} ?>" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" = name="password" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Argent</label>
                            <div class="col-md-12">
                                <input type="number" min="0" value="<?php if($type=="modification"){echo $client['Argent'];} ?>" name="argent" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-success" value="<?php
                                if($type=="modification")
                                  echo "Modifier";
                                  else
                                  echo "Ajouter";

                               ;?>">
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
</div>
