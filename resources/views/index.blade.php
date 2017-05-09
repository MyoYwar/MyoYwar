<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css">

    </head>
    <body>
        <br/> </br>
        <br/>
        <div id="app">
            <h1> Myo Ywar </h1>
            <form>
                <div class="field is-grouped">
                    <p class="control">
                    <span class="select">
                        <select v-model="selected" @change="getChild">
                            <option v-for="place in places" :value="place.id">
                            @{{ place.zg}}
                            </option>
                        </select>
                    </span>
                    </p>
                    <p class="control">
                    <span class="select">
                        <select>
                            <option v-for="township in townships" :value="township.id">
                            @{{ township.zg }} 
                            </option>
                        </select>
                    </span>

                    </p>
                </div>

            </form>
        </div>
    </body>
    <script src="https://unpkg.com/vue"> </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/lodash/4.17.4/lodash.min.js"></script>
    <script>
     var app = new Vue({
         el: "#app",
         data: {
             places: {},
             townships: {},
             selected: "",

             },
         methods: {
             getChild: function(){
                 places = this.places;
                 user = _.findKey(places, { 'id': this.selected });
                 this.townships = places[user].township.data;
                 }
             },
             mounted: function(){
                 data = "";
                 axios.get('api/states?include=township')

                     .then(function(response){
                         
                         this.app.$nextTick(function(){
                             this.places = response.data.data;
                         });
                     })
                 .catch();
             }
         })
    </script>
</html>
