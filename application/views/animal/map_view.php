<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<style type="text/css">
    #map {
      width: 800px;
      height: 600px;
    }
  </style>

  <div id="map"></div>

  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script src="<?php echo base_url(); ?>assets/js/gmaps.js"></script>
<script>


    var map;

    function loadResults (data) {
      var items, markers_data = [];
      if (data.venues.length > 0) {
        items = data.venues;

        for (var i = 0; i < items.length; i++) {
          var item = items[i];

          if (item.location.lat != undefined && item.location.lng != undefined) {
            var icon = 'https://foursquare.com/img/categories/food/default.png';

            markers_data.push({
              lat : item.location.lat,
              lng : item.location.lng,
              title : item.name,
              icon : {
                size : new google.maps.Size(32, 32),
                url : icon
              }
            });
          }
        }
      }

      map.addMarkers(markers_data);
    }

    function printResults(data) {
      $('#foursquare-results').text(JSON.stringify(data));
     
    }

    $(document).on('click', '.pan-to-marker', function(e) {
      e.preventDefault();

      var position, lat, lng, $index;

      $index = $(this).data('marker-index');

      position = map.markers[$index].getPosition();

      lat = position.lat();
      lng = position.lng();

      map.setCenter(lat, lng);
    });

    $(document).ready(function(){
      
      map = new GMaps({
        div: '#map',
        lat: -12.043333,
        lng: -77.028333
      });

      map.on('marker_added', function (marker) {
        var index = map.markers.indexOf(marker);
        $('#results').append('<li><a href="#" class="pan-to-marker" data-marker-index="' + index + '">' + marker.title + '</a></li>');

        if (index == map.markers.length - 1) {
          map.fitZoom();
        }
      });

      

      var d={  
   "venues":[  
      {  
         "id":"52b331da498e25c00246191c",
         "name":"Cevichería Super Ceviche",
         "contact":{  

         },
         "location":{  
            "lat":-12.058553451600776,
            "lng":-77.0330945435819,
            "cc":"PE",
            "country":"Perú",
            "formattedAddress":[  
               "Perú"
            ]
         },
         "categories":[  
            {  
               "id":"4eb1bfa43b7b52c0e1adc2e8",
               "name":"Peruvian Restaurant",
               "pluralName":"Peruvian Restaurants",
               "shortName":"Peruvian",
               "icon":{  
                  "prefix":"http://icons.iconarchive.com/icons/jeanette-foshee/simpsons-02/32/Townspeople-Lion-icon",
                  "suffix":".png"
               },
               "primary":true
            }
         ],
         "verified":false,
         "stats":{  
            "checkinsCount":7,
            "usersCount":1,
            "tipCount":0
         },
         "allowMenuUrlEdit":true,
         "specials":{  
            "count":0,
            "items":[  

            ]
         },
         "hereNow":{  
            "count":0,
            "summary":"Nobody here",
            "groups":[  

            ]
         },
         "referralId":"v-1442050217"
      },
      {  
         "id":"53ea6a1b498eb1c0147ecc83",
         "name":"ceviche de carretilla @ngel",
         "contact":{  

         },
         "location":{  
            "lat":-12.033483505249023,
            "lng":-77.03278350830078,
            "cc":"PE",
            "country":"Perú",
            "formattedAddress":[  
               "Perú"
            ]
         },
         "categories":[  
            {  
               "id":"52e81612bcbc57f1066b7a00",
               "name":"Comfort Food Restaurant",
               "pluralName":"Comfort Food Restaurants",
               "shortName":"Comfort Food",
               "icon":{  
                  "prefix":"http://icons.iconarchive.com/icons/jeanette-foshee/simpsons-02/32/Townspeople-Lion-icon",
                  "suffix":".png"
               },
               "primary":true
            }
         ],
         "verified":false,
         "stats":{  
            "checkinsCount":2,
            "usersCount":2,
            "tipCount":1
         },
         "allowMenuUrlEdit":true,
         "specials":{  
            "count":0,
            "items":[  

            ]
         },
         "hereNow":{  
            "count":0,
            "summary":"Nobody here",
            "groups":[  

            ]
         },
         "referralId":"v-1442050217"
      },
      {  
         "id":"51001923e4b0176c76613862",
         "name":"Ceviche de pota - Wilson",
         "contact":{  

         },
         "location":{  
            "lat":-12.055221,
            "lng":-77.037577,
            "cc":"PE",
            "country":"Perú",
            "formattedAddress":[  
               "Perú"
            ]
         },
         "categories":[  
            {  
               "id":"4bf58dd8d48988d1cb941735",
               "name":"Food Truck",
               "pluralName":"Food Trucks",
               "shortName":"Food Truck",
               "icon":{  
                  "prefix":"http://icons.iconarchive.com/icons/jeanette-foshee/simpsons-02/32/Townspeople-Lion-icon",
                  "suffix":".png"
               },
               "primary":true
            }
         ],
         "verified":false,
         "stats":{  
            "checkinsCount":1,
            "usersCount":1,
            "tipCount":0
         },
         "allowMenuUrlEdit":true,
         "specials":{  
            "count":0,
            "items":[  

            ]
         },
         "hereNow":{  
            "count":0,
            "summary":"Nobody here",
            "groups":[  

            ]
         },
         "referralId":"v-1442050217"
      },
      {  
         "id":"53de8662498ec77445dc4794",
         "name":"Ceviche de pota",
         "contact":{  

         },
         "location":{  
            "address":"Emilio Grec (ex Avenida 2)",
            "lat":-12.024888,
            "lng":-77.034267,
            "cc":"PE",
            "country":"Perú",
            "formattedAddress":[  
               "Emilio Grec (ex Avenida 2)",
               "Perú"
            ]
         },
         "categories":[  
            {  
               "id":"4bf58dd8d48988d1cb941735",
               "name":"Food Truck",
               "pluralName":"Food Trucks",
               "shortName":"Food Truck",
               "icon":{  
                  "prefix":"http://icons.iconarchive.com/icons/jeanette-foshee/simpsons-02/32/Townspeople-Lion-icon",
                  "suffix":".png"
               },
               "primary":true
            }
         ],
         "verified":false,
         "stats":{  
            "checkinsCount":1,
            "usersCount":1,
            "tipCount":0
         },
         "allowMenuUrlEdit":true,
         "specials":{  
            "count":0,
            "items":[  

            ]
         },
         "hereNow":{  
            "count":0,
            "summary":"Nobody here",
            "groups":[  

            ]
         },
         "referralId":"v-1442050217"
      },
      {  
         "id":"4e330a6f7d8b6946c1ea1133",
         "name":"Cevichería La Bahía",
         "contact":{  

         },
         "location":{  
            "address":"Jr. Camana 318",
            "lat":-12.046172302466823,
            "lng":-77.03271567821503,
            "postalCode":"1",
            "cc":"PE",
            "city":"Cercado de Lima",
            "state":"Lima",
            "country":"Perú",
            "formattedAddress":[  
               "Jr. Camana 318",
               "Cercado de Lima",
               "1",
               "Perú"
            ]
         },
         "categories":[  
            {  
               "id":"4bf58dd8d48988d1ce941735",
               "name":"Seafood Restaurant",
               "pluralName":"Seafood Restaurants",
               "shortName":"Seafood",
               "icon":{  
                  "prefix":"http://icons.iconarchive.com/icons/jeanette-foshee/simpsons-02/32/Townspeople-Lion-icon",
                  "suffix":".png"
               },
               "primary":true
            }
         ],
         "verified":false,
         "stats":{  
            "checkinsCount":23,
            "usersCount":13,
            "tipCount":1
         },
         "allowMenuUrlEdit":true,
         "specials":{  
            "count":0,
            "items":[  

            ]
         },
         "hereNow":{  
            "count":0,
            "summary":"Nobody here",
            "groups":[  

            ]
         },
         "referralId":"v-1442050217"
      },
      {  
         "id":"52b0b2e6498e004fb6cf0539",
         "name":"Cevicheria Puerto 260",
         "contact":{  
            "phone":"+5117195698",
            "formattedPhone":"+51 1 7195698"
         },
         "location":{  
            "address":"Avenida Abancay 260",
            "lat":-12.0479875134063,
            "lng":-77.02695965766907,
            "cc":"PE",
            "city":"Lima",
            "state":"Lima",
            "country":"Perú",
            "formattedAddress":[  
               "Avenida Abancay 260",
               "Lima",
               "Perú"
            ]
         },
         "categories":[  
            {  
               "id":"4eb1bfa43b7b52c0e1adc2e8",
               "name":"Peruvian Restaurant",
               "pluralName":"Peruvian Restaurants",
               "shortName":"Peruvian",
               "icon":{  
                  "prefix":"http://icons.iconarchive.com/icons/jeanette-foshee/simpsons-02/32/Townspeople-Lion-icon",
                  "suffix":".png"
               },
               "primary":true
            }
         ],
         "verified":false,
         "stats":{  
            "checkinsCount":10,
            "usersCount":10,
            "tipCount":1
         },
         "allowMenuUrlEdit":true,
         "specials":{  
            "count":0,
            "items":[  

            ]
         },
         "hereNow":{  
            "count":0,
            "summary":"Nobody here",
            "groups":[  

            ]
         },
         "referralId":"v-1442050217"
      },
      {  
         "id":"5197ea9e498e45955a0e8303",
         "name":"Cevichería El Firme",
         "contact":{  

         },
         "location":{  
            "address":"Jirón Ica 273",
            "crossStreet":"Cayoma",
            "lat":-12.045734494996319,
            "lng":-77.0328358969584,
            "cc":"PE",
            "state":"Lima",
            "country":"Perú",
            "formattedAddress":[  
               "Jirón Ica 273 (Cayoma)",
               "Perú"
            ]
         },
         "categories":[  
            {  
               "id":"4bf58dd8d48988d1ce941735",
               "name":"Seafood Restaurant",
               "pluralName":"Seafood Restaurants",
               "shortName":"Seafood",
               "icon":{  
                  "prefix":"http://icons.iconarchive.com/icons/jeanette-foshee/simpsons-02/32/Townspeople-Lion-icon",
                  "suffix":".png"
               },
               "primary":true
            }
         ],
         "verified":false,
         "stats":{  
            "checkinsCount":21,
            "usersCount":10,
            "tipCount":3
         },
         "allowMenuUrlEdit":true,
         "specials":{  
            "count":0,
            "items":[  

            ]
         },
         "hereNow":{  
            "count":0,
            "summary":"Nobody here",
            "groups":[  

            ]
         },
         "referralId":"v-1442050217"
      }
   
   ],
   "geocode":{  
      "what":"",
      "where":"lima pe",
      "feature":{  
         "cc":"PE",
         "name":"Lima",
         "displayName":"Lima, Peru",
         "matchedName":"Lima, PE",
         "highlightedName":"<b>Lima</b>, <b>PE</b>",
         "woeType":7,
         "slug":"lima",
         "id":"geonameid:3936456",
         "longId":"72057594041864392",
         "geometry":{  
            "center":{  
               "lat":-12.04318,
               "lng":-77.02824
            },
            "bounds":{  
               "ne":{  
                  "lat":-11.656775003499892,
                  "lng":-76.62062601154459
               },
               "sw":{  
                  "lat":-12.512180998561522,
                  "lng":-77.20014996416089
               }
            }
         }
      },
      "parents":[  

      ]
   }
}
      loadResults(d);
    });

  

</script>