@extends('layouts.app')



@section('content')




<div id="info" class="container">
  <div class="row">
    <div class="col-md-6">

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
           <button   type="button" class="btn btn-success" name="button"  v-on:click.prevent="SubirTwit()" >
              Enviar
            </button>
        </div>
      </div>
      <br><br>
      <div class="contenedor-twits-2"  >
        <div class="panel-container">
          <div class="container " v-if="TwitsMine.length  != 0" v-for="Twit in TwitsMine" >
            <b>
               " @{{Twit.Data}} "
            </b>
              <br>
            <p>
              @{{Twit.Fecha}}
            </p>
            <button type="button" class="btn btn-danger" v-on:click.prevent="DeleteTwit(Twit)"  name="button">
              Eliminar
            </button>
            <button type="button" class="btn btn-primary" name="button" v-on:click.prevent="ChargueData(Twit)" data-toggle="modal" data-target="#exampleModal">
              <i class="glyphicon glyphicon-pencil" ></i> Editar
            </button>
              <hr>
          </div>
          <div class=""  v-if="TwitsMine.length  === 0"  >
            <h4>
              No has echo ninguna publicacion ! ...
            </h4>
          </div>
        </div>
      </div>
    </div>
    <div class="card col-md-6  " style="height:300%;" >
      <div class="card-body  " id="datamine" >
            <center>
              <h3>
                Mis Datos
              </h3>
            </center>
            <br><br>


            <b>
               @{{UserInfo.name}} <br>
               @{{UserInfo.email}}
            </b>
            <p>
              Se unio @{{UserInfo.created_at}}
            </p>
        </div>
    </div>
  </div>
</div>
@include('layouts.modales')

@endsection
