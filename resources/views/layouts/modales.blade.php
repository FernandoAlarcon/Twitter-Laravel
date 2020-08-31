<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Modifica tu Publicacion ...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <textarea name="name" class="form-control" v-model="TemporalDate" placeholder="Que Quieres Cambiar ?.." rows="8" cols="80"></textarea>
        <br>
        <button type="button" v-on:click.prevent="UploadData()" class="btn btn-primary" name="button">
          Terminado
        </button>
      </div>

    </div>
  </div>
</div>
