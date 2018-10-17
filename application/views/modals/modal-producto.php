<style>
    .borde-img-modal{
      border-radius:20px;
    }
</style>

<div class="modal fade" tabindex="-1" role="dialog" id="productoModal<?php echo $id_producto; ?>">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <div class="row">
            <div class="col-12">
                <div id="carouselProductoModal<?php echo $id_producto ?>" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <?php $counter = 0; ?>
                    <?php foreach($img_array as $img):?>
                    <div class="carousel-item <?php if($counter == 0){ echo 'active'; }?>">
                      <img class="d-block w-100 borde-img-modal" src="<?php echo base_url(); ?>assets/img/<?php echo $img['url_img_producto']; ?>" alt="First slide">
                    </div>
                    <?php $counter++; ?>
                  <?php endforeach; ?>
                  </div>
                  
                </div>
            </div>
            <div class="col-12">
                <div class="container text-center"><?php echo $nombre_producto; ?></div>
                <hr/>
                <div class="container text-center">
                  <?php echo $descripcion_producto; ?>
                </div>
                <hr/>
                
            </div>
            <div class="col-12">
                <div class="text-center" style="font-size:2em"><?php
                 setlocale(LC_MONETARY, 'es_CL');
            echo utf8_encode(money_format('%.0n', $precio_producto)); ?></div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <style>
          .btn-modal{
            padding:8px;
          }
        </style>
        <button type="button" class="btn btn-modal btn-secondary" data-dismiss="modal">Cerrar</button>
        <a href="#contact" class="js-scroll-trigger"><button type="button" class="btn btn-modal btn-primary btn-cerrar-modal">Pidelo ahora</button></a>
      </div>
    </div>
  </div>
</div>