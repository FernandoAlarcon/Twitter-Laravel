//const axios = require('axios');

 const app = new Vue({
     el: '#survivor',
     created: function () {
       this.getTwits();
     },
     data:{
       DataTwit: '',
       errors: '',
       InfoTwit: [],
       ListTwits: []
     },
     methods: {
       SubirTwit: function () {
         var url = '/TwittsNew';
         //alert(this.DataTwit);

         axios.get(url, {params:
          {  Data: this.DataTwit }
         }).then(response => {
                this.getTwits();
                //this.DataTwit   = '';
                this.errors     = [];

                this.InfoTwit = response.data; //.Informacion.data; new Date()
                console.log(this.InfoTwit);

                if (this.InfoTwit.Informacion.Event == 'successfull') {
                  alert('successful');
                }

          }).catch(error => {
                //this.errors = error.response.data
          });
       },
       getTwits: function () {

         var url = '/twitts';
         axios.get(url).then(response => {
                
                this.errors     = [];
                this.ListTwits = response.data.List; //.Informacion.data; new Date()
                console.log(this.ListTwits);


          })

       }
     }
 });
