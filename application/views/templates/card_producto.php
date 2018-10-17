 <div class="col">
    <div class="card" style="width: 18rem; margin-bottom:20px;">
    	<a href="#productoModal<?php echo $id_producto?>" data-toggle="modal">
        	<img class="card-img-top" src="<?php echo base_url() ?>assets/img/<?php echo $img_inicial_producto; ?>" alt="Imagen del producto">
        </a>
        <div class="card-body">
            <h5 class="card-title"><?php echo $nombre_producto; ?></h5>
            <p class="card-text">$<?php 
            setlocale(LC_MONETARY, 'es_CL');
            echo money_format('%i', $precio_producto);


              ?></p>
            <a href="#signup" class="btn btn-primary js-scroll-trigger">Pidelo ahora!</a>
        </div>
    </div>
</div>