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
                                    Features
                                    <tpl:block data="page.block.body">Content</tpl:block></div>
                                <div class="span4">
                                    <div class="left-pad">  
                                        <div class="row-fluid">
                                            <form id="form" name="form" method="post" action="<?php echo $this->link('/member/account/update'); ?>">
                                                <fieldset class="no-margin">
                                                    <legend>Register a new account</legend><tpl:block data="page.block.alerts" />
                                                    <div class="control-group">
                                                        <label class="control-label" for="user_name"><?php echo _('Full Name'); ?><em class="mandatory">*</em></label>
                                                        <div class="controls row-fluid">
                                                            <input class="input-large focused span11" id="user_name" name="user_name" type="text" placeholder="John Doe" />
                                                        </div>
                                                    </div>

                                                    <div class="control-group">
                                                        <label class="control-label" for="user_name_id"><?php echo _('Unique Username'); ?><em class="mandatory">*</em></label>
                                                        <div class="controls row-fluid">
                                                            <input class="input-large focused span11" id="user_name_id" name="user_name_id" type="text" placeholder="JohnDoe1976" />
                                                        </div>
                                                    </div>

                                                    <div class="control-group">
                                                        <label class="control-label" for="user_email"><?php echo _('Email address'); ?><em class="mandatory">*</em></label>
                                                        <div class="controls row-fluid">
                                                            <input class="input-large focused span11" id="user_email" name="user_email" type="text" placeholder="<?php echo _('e.g john.doe@example.com'); ?>" />
                                                        </div>
                                                    </div>

                                                    <div class="control-group">
                                                        <label class="control-label" for="user_password"><?php echo _('Password'); ?><em class="mandatory">*</em></label>
                                                        <div class="controls row-fluid">
                                                            <input class="input-large focused span11" id="user_password" name="user_password" type="password" />
                                                        </div>
                                                    </div>

                                                    <div class="control-group">
                                                        <label class="control-label" for="user_password_2"><?php echo _('Verify Password'); ?><em class="mandatory">*</em></label>
                                                        <div class="controls row-fluid">
                                                            <input class="input-large focused span11" id="user_password_2" name="user_password_2" type="password" />
                                                        </div>
                                                    </div>

                                                </fieldset>
                                                <fieldset>

                                                    <div class="control-group">

                                                        <div class="controls">
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="user_accepted_terms" value="1" />
                                                                You agree to our&nbsp;<a href="#">terms and conditions</a>
                                                            </label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="user_accepted_terms_2" value="2" />
                                                                You agree to our&nbsp;<a href="#">privacy policy</a>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <div class="btn-toolbar">
                                                    <div class="btn-group">
                                                        <button type="submit" class="btn">Create an Account</button> 
                                                    </div>
                                                    <div class="btn-group">
                                                        <button type="reset" class="btn">Cancel</button> 
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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
                                <li><a href="<?php echo $this->link('/system/admin/index'); ?>">Administrator</a></li>
                                <li><a href="<?php echo $this->link('/about'); ?>">About</a></li>
                                <li><a href="<?php echo $this->link('/apps'); ?>">Apps</a></li>
                                <li><a href="http://blog.stonyhillshq.com">Blog</a></li>
                                <li><a href="http://developers.stonyhillshq.com">Developers</a></li>
                                <li><a href="<?php echo $this->link('/help'); ?>">Help</a></li>
                                <li><a href="<?php echo $this->link('/legal/privacy'); ?>">Privacy</a></li>
                                <li><a href="<?php echo $this->link('/legal/terms'); ?>">Terms</a></li>
                            </ul>
                        </div>
                        <div class="span4">
                            <ul class="nav nav-pills pull-right">
                                <li><a href="#">© Stonyhills HQ 2012.</a></li>
                            </ul>
                        </div>
                    </div>
                    <tpl:import layout="console" />
                    
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