//const axios = require('axios');

 const app = new Vue({
     el: '#app',
     created: function () {
       this.getTwits();
       this.getTag();
       this.getMyTwits();
     },
     data:{
       DataTwit: '',
       errors: '',
       Event:'',
       InfoTwit: [],
       ListTwits: [],
       UserInfo: [],
       TwitsMine: [],
       TemporalDate: '',
       IdTemporal: ''
     },
     methods: {
       SubirTwit: function () {
         var url = '/TwittsNew';
         //alert(this.DataTwit);

         axios.get(url, {params:
          {  Data: this.DataTwit }
         }).then(response => {

                this.getTwits();
                this.errors     = [];

                this.InfoTwit = response.data; //.Informacion.data; new Date()


                if (this.InfoTwit.Informacion.Event == 'successfull') {
                  alert('successful');
                  this.DataTwit = '';
                  this.getMyTwits();
                }

          }).catch(error => {
                //this.errors = error.response.data
          });
       },
       getTwits: function () {

         var url = '/twitts';
         axios.get(url).then(response => {

                this.ListTwits = response.data.List; //.Informacion.data; new Date()

          })

       },
       getTag: function () {
           var url = '/DataType'
           axios.get(url).then(response => {

                  this.UserInfo = response.data.Data[0]; //.Informacion.data; new Date()


            }).catch(error => {
                  //this.errors = error.response.data
            });
         },
        getMyTwits: function () {
          var url = '/TwitsType';

          axios.get(url).then( response => {
            this.TwitsMine = response.data.List;

          })
        },
        DeleteTwit: function (info) {
          var url = '/DeleteTw';

          if (confirm('Seguro que deseas eliminar ?')) {
            axios.get(url, {params:{
                Id_twit : info.id_twitt
            }}).then(response =>{
              this.Event = response.data.Event;

              if ( this.Event === 'successfull' ) {
                 alert('Twit Eliminado');
                 this.getMyTwits();
                 this.Event = '';
              }else{
                alert('Sucedio algun error ');
                this.Event = '';
              }
            })
          }
        },
        ChargueData: function (info) {
          this.TemporalDate = '';
          this.IdTemporal   = '';

          this.TemporalDate = info.Data;
          this.IdTemporal   = info.id_twitt;
        },
        UploadData: function () {
          var url = '/UploadData';
          axios.get(url, {params:{
              Id_twit : this.IdTemporal,
              Informacion: this.TemporalDate
          }}).then(response =>{

            this.Event = response.data.Event;

            if ( this.Event === 'successfull' ) {
               alert('Twit Actualizado');
               this.getMyTwits();
               this.Event        = '';
            }else{
              alert('Sucedio algun error ');
              this.Event        = '';
            }
          })
        }


     }
 });
