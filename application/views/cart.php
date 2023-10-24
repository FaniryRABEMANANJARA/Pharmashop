<section id="cart_items">
  <div class="container">
    <br>
    <h3>Panier</h3>
    <div class="table-responsive cart_info">
      <table class="table table-condensed">
        <thead>
          <tr class="cart_menu">
            <td class="image" style="width: 25%;">Produit</td>
            <td class="description" style="width: 25%;"></td>
            <td class="price" style="width: 15%;">Prix</td>
            <td class="quantity" style="width: 15%;">Quantité</td>
            <td class="total" style="width: 15%;">Total</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
        <?php
          $total = 0;
          $list = $this->session->userdata('list');
          $nb = $this->session->userdata('nb');
          for($i = 0; $i < count($list); $i++) {
            $total += $nb[$i] * $list[$i]['Prix'];
        ?>
          <tr>
            <td class="cart_product">
              <a href=""><img src="<?php echo base_url() ?>assets/img/<?php echo $list[$i]['image']; ?>.jpg" alt="" style="width: 50%; height: 50%;"></a>
            </td>
            <td class="cart_description">
              <h4><a href="<?php echo site_url('/MedicamentController/getOneMedic/'.$list[$i]['Id'])?>"><?php echo $list[$i]['Nom'];?></a></h4>
            </td>
            <td class="cart_price">
              <p>$<?php echo $list[$i]['Prix'];?></p>
            </td>
            <td class="cart_quantity">
              <div class="cart_quantity_button">
                <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $nb[$i];?>" autocomplete="off" size="2">
              </div>
            </td>
            <td class="cart_total">
              <p class="cart_total_price">$<?php echo $nb[$i] * $list[$i]['Prix'];?></p>
            </td>
            <td class="cart_delete">
              <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
            </td>
          </tr>
          <?php
            }
          ?>

          <tr>
            <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-content">
                <ul class="list-inline item-details">
                  <li><a href="http://themifycloud.com">Ecommerce templates</a></li>
                  <li><a href="http://themescloud.org">Ecommerce themes</a></li>
                </ul>
              </div>
            </div>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section> <!--/#cart_items-->

<section id="do_action">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
      </div>
      <div class="col-sm-6">
        <div class="total_area">
          <ul>
            <li>Prix Total <span>$<?php echo $total;?></span></li>
            <li>Frais de Transport <span>Gratuit</span></li>
            <li>Total <span>$<?php echo $total;?></span></li>
          </ul>
            <a class="btn btn-default check_out" href="<?php echo site_url('/MedicamentController/checkout')?>">Valider</a>
        </div>
      </div>
    </div>
  </div>
</section>
