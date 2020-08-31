<div  id="survivor" class=" container  " >
  <div class="row justify-content-center" style="position: relative;" >
    <div class="col-md-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center"  > Mi muro
          <button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#tuit" name="button">
            <h6>
              <b>
                +
              </b>
            </h6>
          </button>
        </div>
        <div class="card-body collapse  justify-content-between  " id="tuit">
           <textarea
                        name="data_twiit"
                        v-model="DataTwit"
                        class="form-control"
                        rows="4"
                        placeholder="{{ Auth::user()->name }} Publica Algo"
                        cols="40"></textarea>
            <input   type="hidden" name="" value="{{ Auth::user()->name }}">
           <br>
           <button   type="button" class="btn btn-danger" name="button"  v-on:click.prevent="SubirTwit()" >
              Enviar
           </button>
           
        </div>
      </div>
    </div>
  </div>
  <div class="row  justify-content-center">
    <div class="card-head col-7">
      <center>
        <h5 style="text-align:center;" ><br>
          Ultimas Publicaciones
        </h5><br>
      </center>
    </div>
    <div class="col-7 d-flex justify-content-between " >

      <div id="publicaciones" class="card-body contenedor-twits"  >
        <div class="contenedo-twit" v-for="Twit in ListTwits" >
             <p>
               " @{{Twit.Data}} "
             </p>
             <p class="data-unique" >
               <font face="arial" >
                 <b>@{{Twit.Username}}</b> - @{{Twit.Fecha}}
               </font>
             </p>
             <hr>
        </div>
      </div>
    </div>
  </div>
</div>
