<!DOCTYPE html>
<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">

    <html class="no-js" lang="en">
        <head>
            <title><tpl:element type="text" data="page.title">Default Title</tpl:element></title>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
            <meta name="description" content="<?php echo $this->getPageDescription(); ?>" />
            <meta name="author" content="<?php echo $this->getPageAuthor(); ?>" />
            <meta name="keywords" content="<?php echo $this->getPageAuthor(); ?>" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />

            <!-- Le fav and touch icons -->
            <link rel="shortcut icon" href="images/favicon.ico" />
            <link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
            <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png" />
            <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png" />

            <link rel="stylesheet" href="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/css/bootstrap.css" type="text/css" media="screen" />
        </head>
        <body class="explorer">

            <tpl:import layout="navbar" />
            <form>
                <div class="modal " style="position:relative; top: auto; bottom:auto; left:auto; right: auto; margin:100px auto;">

                    <div class="modal-header">
                        <a href="#" class="close" data-dismiss="modal">×</a>
                        <h3><tpl:element type="text" data="page.title">Explorer</tpl:element></h3>
                    </div>
                    <div class="modal-body">
                        <tpl:block data="page.block.alerts" />             
                        <tpl:block data="page.block.banner" />
                        <tpl:block data="page.block.body" />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn">Search</button>
                        <tpl:block data="page.block.footer" />
                        <tpl:import layout="console" />

                    </div>
                </div>
                <div class="container-fixed map-canvas">

                </div>
            </form>

            <script src='/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/jquery-1.7.1.min.js' type="text/javascript"></script>
            <script src='/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/jquery-ui.min.js' type="text/javascript"></script>
            <script src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/modernizr-2.0.6.min.js" type="text/javascript"></script>
            <script src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/bootstrap.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
            <script type="text/javascript" src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/plugins/jquery.ui.map.full.min.js"></script>
            <script type="text/javascript" src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/plugins/jquery.ui.map.extensions.js"></script>
            <script type="text/javaScript">
                $(function() {
                    // Also works with: var yourStartLatLng = '59.3426606750, 18.0736160278';
                    var yourStartLatLng = new google.maps.LatLng(51.5094, -0.127358);
                    $('.map-canvas').gmap({'streetViewControl': false, 'mapTypeControl':false, 'zoom':15, 'center': yourStartLatLng,'styles':[], 'maxZoom':16, 'callback': function() {
                            var self = this;
                            self.getCurrentPosition(function(position, status) {
                                if ( status === 'OK' ) {
                                    self.set('clientPosition', new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
                                    self.addMarker({'position': self.get('clientPosition'), 'bounds': true});
                                    self.addShape('Circle', { 'strokeWeight': 0, 'fillColor': "#008595", 'fillOpacity': 0.25, 'center': self.get('clientPosition'), 'radius': 15, clickable: false });
                                }
                            });   
                        }});
                });
            </script>
        </body>
    </html>
</tpl:layout>

<script>
    
    var STYLES = [
        [
            {
                stylers: [
                    { saturation: -73 },
                    { visibility: "simplified" }
                ]
            }
        ],
        [
            {
                featureType: "road",
                stylers: [
                    { hue: "#dd00ff" }
                ]
            },{
                featureType: "water",
                stylers: [
                    { hue: "#00f6ff" },
                    { lightness: -18 },
                    { saturation: 62 }
                ]
            },{
                featureType: "landscape",
                stylers: [
                    { hue: "#ffc300" },
                    { saturation: 63 },
                    { lightness: -16 }
                ]
            }
        ],
        [
            {
                elementType: "geometry",
                stylers: [
                    { gamma: 3.16 }
                ]
            },{
                featureType: "transit",
                stylers: [
                    { visibility: "on" },
                    { hue: "#ff0008" },
                    { saturation: 95 },
                    { lightness: -40 }
                ]
            },{
                featureType: "road",
                elementType: "labels",
                stylers: [
                    { visibility: "off" }
                ]
            },{
                featureType: "water",
                stylers: [
                    { saturation: 59 },
                    { lightness: -8 }
                ]
            }
        ],
        [
            {
                stylers: [
                    { invert_lightness: true }
                ]
            }
        ]];

    function initialize() {
        var locations = [
            // zurich:
            new google.maps.LatLng(47.37405437099026, 728.5609082641602),
            // sydney:
            new google.maps.LatLng( -33.8667, 151.1954)
        ];
        var myOptions = {
            zoom: 12,
            center: locations[parseInt(Math.random() * locations.length)],
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            streetViewControl: false,
            mapTypeControl: false
        };
        var maps = [];
        maps.push(new google.maps.Map(document.getElementById('map_canvas1'),
        myOptions));
        maps.push(new google.maps.Map(document.getElementById('map_canvas2'),
        myOptions));
        maps.push(new google.maps.Map(document.getElementById('map_canvas3'),
        myOptions));
        maps.push(new google.maps.Map(document.getElementById('map_canvas4'),
        myOptions));

        var model = new google.maps.Map(document.createElement('div'), myOptions);

        for (var i = 0, map; map = maps[i]; i++) {
            map.setOptions({
                styles: STYLES.splice(parseInt(Math.random() * STYLES.length), 1)[0]
            });
            map.bindTo('zoom', model);
            map.bindTo('center', model);
        }

        // shim layer with setTimeout fallback
        window.requestAnimFrame = (function(){
            return  window.requestAnimationFrame       ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame    ||
                window.oRequestAnimationFrame      ||
                window.msRequestAnimationFrame     ||
                function(/* function */ callback, /* DOMElement */ element){
                window.setTimeout(callback, 1000 / 60);
            };
        })();

        var theta = 0;
        var change = 0.01; // circle radius

        function randompanby() {
            return (Math.random() - .5) * 3;
        }

        function render() {
            var speed = .5;
            model.panBy(speed * Math.cos(theta), speed * Math.sin(theta));
            theta += speed * change;
            theta %= Math.PI * 2;
        }

        (function animloop(){
            requestAnimFrame(animloop, document.body);
            render();
        })();
    }

    google.maps.event.addDomListener(window, 'load', initialize);

</script>
