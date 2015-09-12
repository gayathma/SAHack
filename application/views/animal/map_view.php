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
            var icon = 'http://icons.iconarchive.com/icons/jeanette-foshee/simpsons-02/32/Townspeople-Lion-icon.png';

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