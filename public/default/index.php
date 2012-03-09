<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * index.php
 *
 * Requires PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 *
 */
?>
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
            <meta name="viewport" content="width=device-width,initial-scale=1" />

            <link rel="stylesheet" href="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/css/default.css" type="text/css" media="screen" />

            <script src='/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/jquery-1.7.1.min.js' type="text/javascript"></script>
            <script src='/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/jquery-ui.min.js' type="text/javascript"></script>
            <script src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/modernizr-2.0.6.min.js" type="text/javascript"></script>

        </head>
        <body class="has-header has-footer has-sidebar"> <!--has-subnav-->
            <div role="header" class="header">
                <div class="topbar fill">
                    <div class="inner">
                        <div class="container">
                            <h3><a href="<?php echo $this->link('/'); ?>">Social networking</a></h3>

 
                            <ul class="nav">
                                <li><a href="#">Featured</a></li>
                                <li><a href="#">Explore</a></li>
                                <li><a href="#">Interact</a></li>
                            </ul>

                            <tpl:menu id="mainmenu" />
                            <tpl:menu id="usermenu" />

                            <ul class="nav secondary-nav">
                                <li class="dropdown" data-dropdown="dropdown">
                                    <a href="#" class="dropdown-toggle">Livingstone Fultang</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Secondary link</a></li>
                                        <li><a href="#">Something else here ë</a></li>
                                        <li><a href="#">Another link</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div role="container" class="grid fillfix clearfix ">
                <div role="hscroll" class="row clearfix fillfix">

                    <div role="sidebar" class="sidebar fillfix">
                        <form action="" style="padding:10px; margin:0px">
                            
                            <input type="text" placeholder="Search" />
                        </form>
                        <hr class="h-seperator" />
                        <tpl:menu id="dashboardmenu" />
                        <hr class="h-seperator" />
                        <tpl:menu id="adminmenu" />
                    </div>
                    <div role="content" class="content fillfix">
                        <div  class="row fillfix scrollx clearfix">
                            <!-- Main-body -->
<!--                            <tpl:condition data="page.block.body" method="count" value=">1"> -->
                                <div role="widget" class="widget col size-940 fullheight scrolly">
                                    <div class="widget-header">
                                        <!-- Breadcrumbs -->
                                        <ul class="breadcrumb">
                                            <li><a href="#">Home</a> <span class="divider">/</span></li>
                                            <li><a href="#">Middle page</a> <span class="divider">/</span></li>
                                            <li><a href="#">Another one</a> <span class="divider">/</span></li>
                                            <li class="active">You are here</li>
                                        </ul>
                                    </div>
                                    <div class="widget-body"><tpl:block data="page.block.body">Block</tpl:block></div>
                                </div>
<!--                            </tpl:condition>-->
                            <!-- Panels -->
                            <tpl:loop data="page.block.panel">
                                <div role="widget" class="widget col size-640 fullheight scrolly">
                                    <div class="widget-header">
                                        <a href="#" class="close">×</a>
                                        <tpl:element type="text" data="title" />
                                    </div>
                                    <div class="widget-body">
                                        <tpl:element type="html" data="content" />
                                    </div>
                                </div>
                            </tpl:loop> 

                        </div>
                    </div>
                </div>
            </div>
            <div role="footer">
                <div class="grid">
                    <div class="row">
                        <div class="col span3">
                            <tpl:import layout="console" />
                            <div style="padding: 1px;" class="clearfix">
                                <label class="fluid no-padding">
                                    <input type="checkbox" class="checkbox-toggler" name="togglesidebar" data-content-on="Hide the sidebar" data-content-off="Show the sidebar" value="false" />
                                    <span class="checkbox checked">                                   
                                        <span class="checkbox-off">Hide</span>
                                        <span class="checkbox-on">Show</span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col span13">
                            <div class="pagination no-padding no-margin no-border"><ul><li class="prev disabled"><a href="#">← Previous</a></li><li><a href="#">...</a></li><li><a href="#">Profile page</a></li><li class="active"><a href="#">Learn more</a></li><li><a href="#">Latest activity</a></li><li><a href="#">Photos and Videos</a></li><li><a href="#">Interact with @drstonyhills</a></li><li><a href="#">...</a></li><li class="next"><a href="#">Next→</a></li></ul></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- scripts concatenated and minified via ant build script-->
            <script src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/plugins.js" type="text/javascript"></script>
            <!-- end scripts-->



            <!--[if lt IE 7 ]>
              <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
              <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
            <![endif]-->

        </body>
    </html>
</tpl:layout>
