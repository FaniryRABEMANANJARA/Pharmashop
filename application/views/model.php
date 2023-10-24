<script>
  var listeComposants = [];



  function add(){
    var comp = document.getElementById("comp");
    var compId = comp.options[comp.selectedIndex].value;
    if(compId == '')
      return null;
    for(var i = 0; i < listeComposants.length; i++){
      if(listeComposants[i] == compId)
        return null;
    }
    listeComposants[i] = compId;
    var input = document.createElement("input");
    input.type = "hidden";
    input.id = "i_"+compId;
    input.name = "c"+i;
    input.value = compId;
    document.getElementById("liste_composants").appendChild(input);

    var button = document.createElement("button");
    button.id = "b_"+compId;
    button.className = "btn";
    button.style.marginTop = "1%";
    button.type = "button";
    button.innerHTML = '<i class="fa fa-close"></i> '+comp.options[comp.selectedIndex].text;
    button.onclick = function (){
      for(var i = 0; i < listeComposants.length; i++){
        if(listeComposants[i] == compId)
          listeComposants.splice(i, 1);
      }
      var elementInput = document.getElementById(input.id);
      var elementButton = document.getElementById(button.id);
      elementInput.parentNode.removeChild(elementInput);
      elementButton.parentNode.removeChild(elementButton);
    }
    document.getElementById("liste_composants").appendChild(button);
  }
</script>

<section id="gallery" class="gallery margin-top-120 bg-white">
    <!-- Portfolio container-->
    <div class="container">
        <div class="row">
            <div class="main-gallery main-model roomy-80">
                <div class="col-md-12 m-bottom-60">
                    <div class="filters-button-group sm-text-center">
                        <?php
                          foreach ($listeCat as $cat) { ?>
                            <a href="<?php echo site_url('/MedicamentController/categorie/'.$cat['Id'])?>" class="btn btn-default text-uppercase" style="float: right; margin-right: 1%;"><?php echo $cat['Nom'] ?><a/>
                        <?php
                          }
                        ?>
                            <a href="<?php echo site_url('/MedicamentController')?>" class="btn btn-default text-uppercase" style="float: right; margin-right: 1%;">Tous</a>
                    </div>
                </div>

                <div style="clear: both;"></div>

                <div class="grid models text-center" style="width: 22.5%; float: left;">
                  <h3>Recherche avancée</h3>
                      <form class="" action="<?php echo site_url('/medicamentcontroller/adv_search')?>" method="GET">
                          <div class="row">
                              <div class="form-group">
                                  <input name="query" id="query" type="text" placeholder="Recherche" class="form-control" style="width: 85%; margin: 0 auto;">
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>Prix min.</label>
                                      <input type="number" name="min" id="min" step="0.01" placeholder="0.00">
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>Prix max.</label>
                                      <input type="number" name="max" id="max" step="0.01" placeholder="0.00">
                                  </div>
                              </div>
                              <div class="col-sm-12">
                                  <div class="form-group">
                                    <select id="comp" name="composant" style="width: 50%;">
                                      <option value="">Composant</option>
                                      <?php
                                        foreach ($composants as $composant) { ?>
                                          <option value="<?php echo $composant['Id'];?>"><?php echo $composant['Nom'];?></option>
                                      <?php
                                        }
                                      ?>
                                    </select>
                                    <button type="button" style="width: 25%;" onclick="add()">Ajouter</button>
                                  </div>
                              </div>
                              <div class="col-sm-12">
                                  <div class="form-group" id="liste_composants">
                                  </div>
                              </div>
                              <div class="col-sm-12">
                                  <div class="form-group">
                                      <input type="submit" class="btn btn-default" value="Rechercher">
                                  </div>
                              </div>
                          </div>
                      </form>
                </div>

                <div class="grid models text-center" style="width: 75%; float: right;">
                <?php
                  foreach ($listeAllMedic as $medic) { ?>
                    <div class="grid-item model-item transition metal ium">
                        <img alt="" src="<?php echo base_url() ?>assets/img/<?php echo $medic['image'] ?>.jpg">
                        <a href="<?php echo site_url('/MedicamentController/getOneMedic/'.$medic['Id'])?>" class="btn btn-primary m-top-20">View Details</a>
                    </div><!-- End off grid item -->
                <?php
                  }
                ?>
                </div>

                <div style="clear: both;"></div>
                <div width="100%" height="5%">
                <?php
                    if(!isset($query)) $query='';
                    else $query = '?query='.$query;
                      if($nbrPage>1){ ?>
                    <a href="<?php echo site_url('/MedicamentController/'.$url.'/'.($nbrPage-1).$query)?>" class="btn btn-link m-top-20" style="margin-left:500px">Précédent</a>
                <?php } ?>
                <?php if($nbrPage<$pageMax){ ?>
                    <a href="<?php echo site_url('/MedicamentController/'.$url.'/'.($nbrPage+1).$query)?>" class="btn btn-link m-top-20" style="margin-left:500px">Suivant</a>
                <?php } ?>
                </div>
            </div>
        </div>
    </div><!-- Portfolio container end -->
</section><!-- End off portfolio section -->
