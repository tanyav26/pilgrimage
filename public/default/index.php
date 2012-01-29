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
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang="en" xmlns="http://www.w3.org/1999/xhtml"> 
    <!--<![endif]-->
    <head>
        <title><?php echo $this->getPageTitle(); ?></title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="description" content="<?php echo $this->getPageDescription(); ?>" />
        <meta name="author" content="<?php echo $this->getPageAuthor(); ?>" />
        <meta name="keywords" content="<?php echo $this->getPageAuthor(); ?>" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        
        <link rel="stylesheet" href="/<?php echo $this->getTemplateName() ?>/css/default.css" type="text/css" media="screen" />
        
        <script src='/<?php echo $this->getTemplateName() ?>/js/libs/jquery-1.7.1.min.js' type="text/javascript"></script>
        <script src='/<?php echo $this->getTemplateName() ?>/js/libs/jquery-ui.min.js' type="text/javascript"></script>
        <script src="/<?php echo $this->getTemplateName() ?>/js/libs/modernizr-2.0.6.min.js" type="text/javascript"></script>
    </head>
    <body class="has-header has-footer has-sidebar">
        <div role="header" class="header">
            <div class="topbar fill">
                <div class="inner">
                    <div class="container">
                        <h3><a href="<?php echo $this->link('/'); ?>">Social networking</a></h3>
                        <form class="pull-left" action="">
                            <input type="text" placeholder="Search" />
                        </form>
                        <ul class="nav">
                            <li class="active"><a href="<?php echo $this->link('/'); ?>">Home</a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle">Dropdown</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Secondary link</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Another link</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="nav secondary-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle">Dropdown</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Secondary link</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Another link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div role="container" class="grid fillfix clearfix ">
            <div class="row clearfix fillfix">

                <div role="sidebar" class="sidebar fillfix">
                    <ul class="nav">
                        <li><a href="#">Dashboard</a>
                            <ul class="slidedown-menu">
                                <li class="current"><a href="#">Overview</a></li>
                                <li><a href="#">Accounts</a></li>
                                <li><a href="#">Settings</a></li>
                            </ul>
                        </li>
                    </ul>

                    <hr class="h-seperator" />
                    <ul class="nav">
                        <li><a href="#">Bookmarks</a>
                            <ul class="slidedown-menu">
                                <li><a href="#">Overview</a></li>
                                <li><a href="#">Bookmarks</a></li>
                                <li><a href="#">Accounts</a></li>
                                <li><a href="#">Settings</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Your Network</a>
                            <ul class="slidedown-menu">
                                <li><a href="#">Overview</a></li>
                                <li><a href="#">Connections</a></li>
                                <li><a href="#">Trending</a></li>
                                <li><a href="#">Reputation</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div role="content" class="content fillfix">

                    <div class="row fillfix scrollx clearfix">	

                        <div role="widget" class="widget col span-two-thirds fullheight scrolly">
                            <div class="title-bar">Widget title bar</div>
                            <div class="body"><?php $this->position("body") ?></div>

                        </div><div role="widget" class="col span-two-thirds fullheight scrolly">So saying we had at if we then add to make things even more interesting? </div><div role="widget" class="col span-two-thirds fullheight scrolly">1</div><div role="widget" class="col span-two-thirds fullheight scrolly last">1</div>		  			
                    </div>		  		
                </div>
            </div>
        </div>

        <div role="footer">Footer</div>

        <?php $this->position("do:debugger") ?>

        <!-- scripts concatenated and minified via ant build script-->
        <script src="/<?php echo $this->getTemplateName() ?>/js/plugins.js" type="text/javascript"></script>
        <!-- end scripts-->



        <!--[if lt IE 7 ]>
          <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
          <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
        <![endif]-->

    </body>
</html>
