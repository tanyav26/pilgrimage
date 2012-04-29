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
        <body>
            <tpl:import layout="navbar" />
            
            <div class="container">
                <tpl:block data="page.block.alerts" />             
                <tpl:block data="page.block.banner">Banner</tpl:block>
                <section class="layout-block boxed has-bg">  
                    <div class="row-fluid">
                        <div class="span12">           
                            <div class="row-fluid">
                                <div class="span8"> 
                                    <tpl:block data="page.block.body">Content</tpl:block></div>
                                <div class="span4">
                                    <div class="left-pad">                                 
                                        <tpl:block data="page.block.side">Sidebar</tpl:block>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section role="footer">
                    <div class="row-fluid">
                        <div class="span8">
                            <ul class="nav nav-pills">
                                <li><a href="<?php echo $this->link('/about'); ?>">About</a></li>
                                <li><a href="<?php echo $this->link('/apps'); ?>">Apps</a></li>
                                <li><a href="http://blog.stonyhillshq.com">Blog</a></li>
                                <li><a href="http://developers.stonyhillshq.com">Developers</a></li>
                                <li><a href="<?php echo $this->link('/help'); ?>">Help</a></li>
                                <li><a href="<?php echo $this->link('/legal/privacy'); ?>">Privacy</a></li>
                                <li><a href="<?php echo $this->link('/legal/terms'); ?>">Terms</a></li>
                                <li><a href="http://store.stonyhillshq.com">Store</a></li>
                            </ul>
                        </div>
                        <div class="span4">
                            <ul class="nav nav-pills pull-right">
                                <li><a href="#"><i class="icon-heart"></i>Stonyhills HQ 2012.</a></li>
                            </ul>
                        </div>
                    </div>
                    <tpl:import layout="console" />
                    <a href="<?php echo $this->link('/system/admin/index'); ?>" class="btn pull-right">Administrator Panel</a>
                    <tpl:block data="page.block.footer">Footer</tpl:block>
                </section>
            </div>

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
                    $('.map-canvas').gmap({'streetViewControl': false, 'mapTypeControl':false, 'zoom':15, 'center': yourStartLatLng,'styles':[
                            {
                                featureType: "all",
                                stylers: [
                                    { saturation: -50 },
                                    { lightness: 3}
                                ]
                            },{
                                featureType: "road.arterial",
                                elementType: "geometry"
                            },{
                                featureType: "poi.business",
                                elementType: "labels",
                                stylers: [
                                    { visibility: "off" }
                                ]
                            }
                        ], 'maxZoom':16, 'callback': function() {
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
