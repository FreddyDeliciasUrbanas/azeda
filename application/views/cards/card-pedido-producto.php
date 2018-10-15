

<li class="btn-selector-producto" data-id-producto="<?php echo $posicion_producto; ?>">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-3 align-items-center">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/img/<?php echo $img_inicial_producto; ?>" alt="">
              
          </div>
          <div class="col-5 col-md-5">
              <?php echo $nombre_producto; ?>
          </div>
          
          <div class="col-1">
              <span class="badge badge-primary badge-contador-producto" id="contador_producto_<?php echo $posicion_producto; ?>">0</span>
          </div>
          <div class="col-2">
              <button class="btn btn-danger btn-eliminar-pedido" data-eliminar-id="<?php echo $posicion_producto; ?>">
                  <span class="fa fa-minus-circle"></span>
              </button>
          </div>
      </div>

      
  </div>
</li>