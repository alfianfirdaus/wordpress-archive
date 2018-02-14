<div id="store" class="container">
  <div class="row">
      <div class="col-xs-12 col-sm-12 gmap">
        <div class="map">
           <div id="map" style="height: 600px;"></div>
           <div style="position: absolute; background: #000; width: 100%; height: 100%; top: 0; left: 0; display: none; opacity: 0.8" class="mapLoadingOverlay">
               <p style="width: 100%; padding-top: 50px; font-size: 18px; color: #b9b9b9;" class="text-center"> Loading... </p>
           </div>
        </div>
      </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?libraries=geometry&key=AIzaSyAVCm5lyK_cSxByjkYqqsdJrUfmtCB7Elk"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/infobubble.js"></script>

<?php

// Functions.php
// CPT Store
add_action( 'init', 'store' );
flush_rewrite_rules();
function store() {
  register_post_type( 'store',
    array(
      'labels' => array(
        'name' => __( 'Store' ),
        'singular_name' => __( 'Stores' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'menu_icon' => 'dashicons-store',
      'supports' => array( 'title', 'editor', 'thumbnail' )
    )
  );
}


// Get the data
$args = array( 'post_type' => 'store', 'posts_per_page' => -1);
$loop = new WP_Query( $args );

while ( $loop->have_posts() ) : $loop->the_post();

  $maps_data[get_the_ID()] = array();
  $maps_data[get_the_ID()]['post'] = get_post();

endwhile;

foreach($maps_data as $k=>$v)
{
  $maps_data[$k]['data']['title'] = $maps_data[$k]['post']->post_title;
  $maps_data[$k]['data']['thumb'] = get_the_post_thumbnail_url($k, 'medium_large');
  $maps_data[$k]['data']['phone'] = preg_replace("/[^0-9+]/", "", get_post_meta($k, 'phone', true ));
  $maps_data[$k]['data']['address'] = ucwords( strtolower(get_post_meta($k, 'store_addr', true)) );
  $maps_data[$k]['data']['gmap'] = get_post_meta($k, 'gmap', true);
}

?>

<?php include( get_template_directory() . '/map.php'); ?>

<script type="text/javascript">

    var locations = ["Your Location", -8.691002,115.1664143, 1];

    var myLocationIcon = '<?php echo get_template_directory_uri(); ?>/assets/images/location-pointer.png';

    var myLocation = new google.maps.LatLng(locations[1],locations[2]);

    var markers = [];
    var marker;

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: myLocation,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: [
                {elementType: 'geometry', stylers: [{color: '#414042'}]},
                {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
                {elementType: 'labels.text.fill', stylers: [{color: '#ffffff'}]},
                {
                  featureType: 'administrative.locality',
                  elementType: 'labels.text.fill',
                  stylers: [{color: '#ffffff'}]
                },
                {
                  featureType: 'poi',
                  elementType: 'labels.text.fill',
                  stylers: [{color: '#d59563'}]
                },
                {
                  featureType: 'poi.park',
                  elementType: 'geometry',
                  stylers: [{color: '#555555'}]
                  //Taman Nasional Alas Purwo
                },
                {
                  featureType: 'poi.park',
                  elementType: 'labels.text.fill',
                  stylers: [{color: '#ffffff'}]
                  //Taman Nasional Alas Purwo Text
                },
                {
                  featureType: 'road',
                  elementType: 'geometry',
                  stylers: [{color: '#38414e'}]
                },
                {
                  featureType: 'road',
                  elementType: 'geometry.stroke',
                  stylers: [{color: '#212a37'}]
                },
                {
                  featureType: 'road',
                  elementType: 'labels.text.fill',
                  stylers: [{color: '#9ca5b3'}]
                },
                {
                  featureType: 'road.highway',
                  elementType: 'geometry',
                  stylers: [{color: '#746855'}]
                },
                {
                  featureType: 'road.highway',
                  elementType: 'geometry.stroke',
                  stylers: [{color: '#1f2835'}]
                },
                {
                  featureType: 'road.highway',
                  elementType: 'labels.text.fill',
                  stylers: [{color: '#f3d19c'}]
                },
                {
                  featureType: 'transit',
                  elementType: 'geometry',
                  stylers: [{color: '#2f3948'}]
                },
                {
                  featureType: 'transit.station',
                  elementType: 'labels.text.fill',
                  stylers: [{color: '#d59563'}]
                },
                {
                  featureType: 'water',
                  elementType: 'geometry',
                  stylers: [{color: '#787878'}]
                },
                {
                  featureType: 'water',
                  elementType: 'labels.text.fill',
                  stylers: [{color: '#515c6d'}]
                },
                {
                  featureType: 'water',
                  elementType: 'labels.text.stroke',
                  stylers: [{color: '#17263c'}]
                }
            ]
    });

    var infoBubble = new InfoBubble({
      content: '<div style="font-size: 14px;"><i class="fa fa-user margin-r-5"></i> Your Location</div>',
      backgroundClassName: 'bubbleMap transparent',
      backgroundColor: 'rgba(255,255,255, 8)',
      borderColor: 'rgb(153, 153, 153)',
      hideCloseButton: false,
      disableAutoPan: true,
      arrowPosition: 50,
      borderRadius: 0,
      shadowStyle: 0,
      borderWidth: 1,
      maxHeight: 350,
      minHeight: 350,
      maxWidth: 500,
      minWidth: 500,
      arrowStyle: 0,
      arrowSize: 10,
      padding: 20,
      map: map,
    });

    loadNearby();

    function loadNearby() {
        <?php
            $map_loc = 'var data = {"results" : [';
            foreach($maps_data as $md){
              $map_loc .= '{
                            "latitude":"'.$md['data']['gmap']['lat'].'",
                            "longitude":"'.$md['data']['gmap']['long'].'",
                            "title":"'.$md['data']['title'].'",
                            "thumb":"'.$md['data']['thumb'].'",
                            "phone":"'.$md['data']['phone'].'",
                            "address":"'.$md['data']['address'].'",
                            "maps":"'.$md['data']['gmap']['text'].'",
                          },';
            }
            $map_loc .= "]}\n";
            echo $map_loc;
        ?>
        jQuery.each(data.results, function(key, result) {

              marker = new google.maps.Marker({
              position: new google.maps.LatLng(data.results[key].latitude, data.results[key].longitude),
              map: map,
              icon: new google.maps.MarkerImage( myLocationIcon , undefined, undefined, undefined, new google.maps.Size(30, 30)),
              });

              var satu = parseFloat(data.results[key].latitude) + 0.2;
              var curCenter = new google.maps.LatLng(satu, data.results[key].longitude);

              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                  return function() {
                     map.setCenter(curCenter);
                     console.log(data.results[key].maps);
                      infoBubble.setContent( '<img src="'+ data.results[key].thumb +'">' +
                        '<div class="text">' +
                          '<h3>'+ data.results[key].title +'</h3>' +
                          '<a href="tel:'+ data.results[key].phone +'">' + data.results[key].phone + '</a><div class="addr">' +
                          data.results[key].address +
                        '</div><a href="https://google.com/maps/dir/Current+Location/'+ data.results[key].maps +'" target="_blank" class="btn btn-outline btn-gold">Get Direction</a></div>' );
                      infoBubble.setMinHeight(180);
                      infoBubble.open(map, marker);
                  }
              })(marker));

              markers.push(marker);
        });
  }
</script>