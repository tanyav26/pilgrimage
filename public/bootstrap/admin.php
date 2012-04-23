<!DOCTYPE html>
<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <html lang="en">
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

            <script src='/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/jquery-1.7.1.min.js' type="text/javascript"></script>
            <script src='/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/jquery-ui.min.js' type="text/javascript"></script>
            <script src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/modernizr-2.0.6.min.js" type="text/javascript"></script>
        </head>

        <body>
            <tpl:import layout="navbar" />
            <tpl:block data="page.block.alerts" />
            <div class="container">   
                <header class="subhead" id="overview">
                    <div class="subnav">
                        <tpl:menu id="sitemenu" />
                        <tpl:menu id="adminmenu" />
                    </div>
                </header>
                <tpl:block data="page.block.banner">Banner</tpl:block>
                <section class="layout-block boxed">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="lead-unit">
                                <h1><tpl:element type="text" data="page.title">Administrator</tpl:element></h1>
        <!--                        <p class="lead">Changes you make here will affect the global system performance</p>-->
                                <hr />
                            </div>
                            <div class="row-fluid">
                                <div class="span12">           
                                    <tpl:block data="page.block.body" />
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
                                <li><a href="#">© Stonyhills 2012</a></li>
                            </ul>
                        </div>
                    </div>   
                    <tpl:block data="page.block.footer">Footer</tpl:block>
                    <tpl:import layout="console" />
                    <a href="<?php echo $this->link('/'); ?>" class="btn btn-primary pull-right">Front-Page</a>
                </section>
            </div>
            <script src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/bootstrap.min.js" type="text/javascript"></script>
        </body>
    </html>
</tpl:layout>