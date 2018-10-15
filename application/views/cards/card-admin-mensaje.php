<div class="row">
  <div class="col">
    <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse<?php echo $id_mensaje; ?>" aria-expanded="true" aria-controls="collapse<?php echo $id_mensaje; ?>">
          <?php echo $nombre_mensaje; ?> / <?php echo $direccion_mensaje; ?>
        </button>
        <button data-toggle="tooltip" data-placement="left" data-id-eliminar-mensaje="<?php echo $id_mensaje; ?>" title="Eliminar Mensaje" class="btn float-right btn-danger btn-eliminar-mensaje" style="border-radius:20px;width:45px;height:45px"><span class="fa fa-minus-circle"></span></button>
      </h5>

    </div>

    <div id="collapse<?php echo $id_mensaje; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <div class="row">
          <div class="col-10">
            <?php
            setlocale(LC_ALL,"es_ES");
            $date = strtotime($fecha_mensaje);
            //echo date('l jS F Y' , $date);
            echo strftime("%A %d de %B del %Y", $date);

            ?>
            
          </div>
          <div class="col-2">
            <span class="float-right"><?php 

            $time = strtotime($hora_mensaje);
            echo date('G:ia', $time ); 
            ?></span>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            Telefono: <?php echo $telefono_mensaje; ?>
          </div>
          <div class="col-6">
            <span class="float-right">Email: <?php echo $email_mensaje; ?></span>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <?php echo $texto_mensaje; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  

</div>
  </div>
</div>
