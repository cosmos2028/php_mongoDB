<!DOCTYPE html>
<html>
  <head>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 90%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 90%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }
    </style>
    <?php include 'view/base.php';?>
  </head>
  <body>
    <input id="pac-input" class="controls" type="text" placeholder="Type d'arbre...">
    <div id="map"></div>
    <script>
var currentPopup = null;
    function initMap() {
map = new google.maps.Map(document.getElementById("map"), {
  center: new google.maps.LatLng("48.8388772335", "2.26660822055"),
  zoom: 11,
  mapTypeId: google.maps.MapTypeId.ROADMAP,
  mapTypeControl: true,
  scrollwheel: false,
  mapTypeControlOptions: {
    style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
  },
  navigationControl: true,
  navigationControlOptions: {
    style: google.maps.NavigationControlStyle.ZOOM_PAN
  }
});
$.ajax({
  url : "get_marker.php",
  type : "POST",
}).done(function(json){
  result = JSON.parse(json);
    for(i=0; i < result.rows.length; i++){
        createMarker(result.rows[i].lat,result.rows[i].lng,result.rows[i].adresse,result.rows[i].libellefrancais);
    }
});
}
function createMarker(lat,lng,adresse,libellefrancais) {
console.log(lat);
var marker = new google.maps.Marker({
  position: {lat: parseFloat(lat), lng: parseFloat(lng)},
  title: adresse,
  map: map
});
var popup = new google.maps.InfoWindow({
  content: adresse + "  => TYPE : " +libellefrancais,
  maxWidth: 300,
  maxHeight:100
});
// Nous activons l'écouteur d'évènement "click" sur notre marqueur
google.maps.event.addListener(marker, "click", function() {
  // Si une bulle est déjà ouverte
  if (currentPopup != null) {
    // On la ferme
    currentPopup.close();
    // On vide la variable
    currentPopup = null;
  }
  // On ouvre la bulle correspondant à notre marqueur
  popup.open(map, marker);
  // On enregistre cette bulle dans la variable currentPopup
  currentPopup = popup;
});
// Nous activons l'écouteur d'évènement "closeclick" sur notre bulle
// pour surveiller le clic sur le bouton de fermeture
google.maps.event.addListener(popup, "closeclick", function() {
  // On vide la variable
  currentPopup = null;
});

}

// Create the search box and link it to the UI element.
       var input = document.getElementById('pac-input');
       var searchBox = new google.maps.places.SearchBox(input);
       map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqmAZdeNHYGp86bauXUfKpSLV8EnFPD6g&callback=initMap">
    </script>
  </body>
</html>
