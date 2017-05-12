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

        <div id="app">
        <br/>
                     {{-- @include("layouts.nav") --}}
                     <div class="container">
                        <div class="columns">
                            <div class="column">
                            <div class="content">
                                <h2> What is Myo Ywar ?</h2>
                                <p> Myo Ywar is an API service providing Myanmar place codes. The api covers states, districts,
                                 townships, towns, wards, village tract (still developing) and villages ( still developing). All the
                                 data used are from <a href="http://www.themimu.info"> Myanmar Information Management Unit</a>.
                                </p>

                                @include("demo")
                                <h2> The Purpose ? </h2>
                                <p> The original purpose of this project is simply to provide api for the dropdown list. </p>

                                <h2> How to use it ? </h2>
                                <p> Supported divisions are states, districts,
                                 townships, towns and wards ( listed hierarchically).

                                <p> To get all the places in the divison <p>
                                <pre> <br/> http://139.59.115.169/api/states
                                </pre>

                                <p> To get all places in the divison with all places in the child division <p>
                                <pre> <br/> http://139.59.115.169/api/states?include=town
                                </pre>

                                <p> To get certain place in the divison with all places in the child division (hierarchically) <p>
                                <pre> <br/> http://139.59.115.169/api/states/Yangon/districts
                                </pre>
                                </p>

                                <p> To get certain place in the divison with all places in the sub child division (doesn't have to be hierachical) <p>
                                <pre> <br/> http://139.59.115.169/api/states/Yangon?include=town
                                </pre>
                                </p>
                                </div>
                            </div>
                            </div>
                            <a class="github-button" href="https://github.com/leexikang/MyoYwar/subscription" data-icon="octicon-eye" data-size="large" aria-label="Watch leexikang/MyoYwar on GitHub">Watch</a>
                            <a class="github-button" href="https://github.com/leexikang/MyoYwar/fork" data-icon="octicon-repo-forked" data-size="large" aria-label="Fork leexikang/MyoYwar on GitHub">Fork</a>
                                                    </div>
                    </div>
                    <br/>
                    <br/>
                </body>
                <script async defer src="https://buttons.github.io/buttons.js"></script>
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
