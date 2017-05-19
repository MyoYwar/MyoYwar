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

                                <p> To get all the places in the divison </p>
                                <pre> <br/> http://139.59.115.169/api/{division}?name=name-of-divison|id=id-of-division&include=division|get=division
                                </pre>
                                <br/> <br/>
                                <table class="table">
                                    <tbody>

                                     <tr> 
                                     <td> <small> division </small> </td> 
                                     <td> <small> string </small>  </td>
                                     <td> <small> division you want to get </small></td>
                                     <td> states </td>
                                     <td> <small> required</small></td>
                                     </tr>

                                     <tr> 
                                         <td> <small> name </small> </td> 
                                         <td> <small> string </small>  </td>
                                         <td> <small> name of the division you want to get </small></td>
                                         <td> Yangon </td>
                                         <td> <small> Optional |   </small></td>
                                     </tr>

                                     <tr> 
                                         <td> <small> id</small> </td> 
                                         <td> <small> string </small>  </td>
                                         <td> <small> id of the division you want to get </small></td>
                                         <td> MMR002 (state_id) </td>
                                         <td> <small> Optional </small></td>
                                     </tr>

                                     <tr> 
                                         <td> <small> include</small> </td> 
                                         <td> <small> string </small>  </td>
                                         <td> <small> nested the sub division within the parent division</small></td>
                                         <td> towns </td>
                                         <td> <small> Optional </small></td>
                                     </tr>

                                     <tr> 
                                         <td> <small> get </small> </td> 
                                         <td> <small> string </small>  </td>
                                         <td> <small> get Only the sub divisions </small></td>
                                         <td> towns </td>
                                         <td> <small> Optional </small></td>
                                     </tr>


                               </tbody>
                                 </table>

                               <h5> Example Call </h5>
                               <p> To include subdivsion </p>
                                <pre><br/>http://139.59.115.169/api/states<br/> http://139.59.115.169/api/states?id=MMR010?include=towns <br/>http://139.59.115.169/api/states?name=mandalay?get=towns
                                </pre>

                               <p> To include subdivsion </p>
                                <pre> <br/> http://139.59.115.169/api/{division}/{id}
                                </pre>
                                <br/> <br/>
                                <table class="table">
                                <tr> 
                                     <td> <small> division </small> </td> 
                                     <td> <small> string </small>  </td>
                                     <td> <small> division you want to get </small></td>
                                     <td> states</td>
                                     <td> <small> required</small></td>
                                     </tr>

                                     <tr> 
                                         <td> <small> id</small> </td> 
                                         <td> <small> string </small>  </td>
                                         <td> <small> id of the division you want to get </small></td>
                                         <td> MMR002 (state_id) </td>
                                         <td> <small>  required </small></td>
                                     </tr>

                                     <tr> 
                                       <td> <small> include</small> </td> 
                                       <td> <small> string </small>  </td>
                                       <td> <small> nested the sub division within the parent division (doesn't need to be hierarchical)</small></td>
                                       <td> towns </td>
                                       <td> <small> Optional </small></td>
                                   </tr>

                                   <tr> 
                                       <td> <small> get </small> </td> 
                                       <td> <small> string </small>  </td>
                                       <td> <small> get Only the sub divisions (doesn't need to be hierarchical) </small></td>
                                       <td> towns </td>
                                       <td> <small> Optional </small></td>
                                   </tr>


                               </table>

                               <h5> Example Call </h5>
                               <pre><br/>http://139.59.115.169/api/states/"MMR010?include=towns
                                </pre>
                                <br/><br/>

                               <p> To get certain place in the divison with all places in the sub division. Id is the only support<p>
                                <pre> <br/> http://139.59.115.169/api/{division}/{id}/{sub-division}
                                </pre>
                                </p>

                                <br/> <br/>
                                <table class="table">
                                <tr> 
                                     <td> <small> division </small> </td> 
                                     <td> <small> string </small>  </td>
                                     <td> <small> division you want to get </small></td>
                                     <td> <small> required</small></td>
                                     </tr>

                                     <tr> 
                                         <td> <small> id</small> </td> 
                                         <td> <small> string </small>  </td>
                                         <td> <small> id of the division you want to get </small></td>
                                         <td> <small> required </small></td>
                                     </tr>

                                     <tr> 
                                         <td> <small> sub division</small> </td> 
                                         <td> <small> string </small>  </td>
                                         <td> <small> the childs of the divsion (doesn't need to be hierarchical)</small></td>
                                         <td> <small> required </small></td>
                                     </tr>

                                 </table>

                               <h5> Example Call </h5>

                               <pre><br/>http://139.59.115.169/api/states/MMR010/towns
                                </pre>



                              </div>
                            </div>
                            </div>
                            <hr/>
                            <a href="https://github.com/leexikang/MyoYwar" style="color: #24292E">

                                <i class="fa fa-github fa-3x" aria-hidden="true"></i>
                            </a>
                     </div>
        </div>
                    <br/>
                    <br/>
                </body>
                <script src="https://unpkg.com/vue"> </script>
                <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
                <script src="https://cdn.jsdelivr.net/lodash/4.17.4/lodash.min.js"></script>
                <script src="https://use.fontawesome.com/63255c320c.js"></script>
                <script>
                   var app = new Vue({
                       el: "#app",
                       data: {
                           places: {},
                           towns: {},
                           selected: "",
                           selectedTwo: "",
                           townTwo: ""

                       },

                       methods: {
                           getChild: function(){
                               places = this.places;
                               user = _.findKey(places, { 'id': this.selected });
                               this.towns = places[user].town.data;
                           }, fetchChild: function(data){
                            axios.get('api/states/' + this.selectedTwo + '/towns')
                            .then(function(response){
                                this.app.$nextTick(function(){
                                    this.townTwo = response.data.data
                                })
                            })
                           }
                       },
                       mounted: function(){
                           data = "";
                           axios.get('api/states?include=towns')

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
