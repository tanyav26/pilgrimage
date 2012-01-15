<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * error.php
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
<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
    <head>
        <title>Page Not Found</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="<?php echo $this->getPageDescription(); ?>">
        <meta name="author" content="<?php echo $this->getPageAuthor(); ?>">
        <meta name="keywords" content="<?php echo $this->getPageAuthor(); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--[if IE]>
                <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <!--[if lte IE 7]>
                <script src="js/IE8.js" type="text/javascript"></script><![endif]-->
        <!--[if lt IE 7]>

        <link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/><![endif]-->
        
        <link rel="icon" href="/<?php echo $this->getTemplateName() ?>/favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="/<?php echo $this->getTemplateName() ?>/css/style.css">
        <link rel="stylesheet" href="/<?php echo $this->getTemplateName() ?>/css/forms.css">
        <link rel="stylesheet" href="/<?php echo $this->getTemplateName() ?>/css/reset.css">

        <script src="/<?php echo $this->getTemplateName() ?>/js/libs/modernizr-1.7.min.js" type="text/javaScript"></script>   
        <style>
           h1.code{ font:normal 110pt Arial;margin: -30px 10px;color:#FFFFFF;text-shadow: 0 1px 0 #ccc,0 2px 0 #c9c9c9,0 3px 0 #bbb,0 4px 0 #b9b9b9,0 5px 0 #aaa,0 6px 1px rgba(0,0,0,.1),0 0 5px rgba(0,0,0,.1),0 1px 3px rgba(0,0,0,.3),0 3px 5px rgba(0,0,0,.2),0 5px 10px rgba(0,0,0,.25),0 10px 10px rgba(0,0,0,.2),0 20px 20px rgba(0,0,0,.15); }
        </style>
    </head>
    <body id="index" class="home">
        <div style="text-align: left; margin: 100px auto; max-width: 80%" class="grid">
            <div class="row whole">
                <div class="col third" align="right" style="padding:20px"><h1 class="code">404</h1></div>
                <div class="col half" align="left">
                    <h1><?php echo _('Page not found') ;?></h1>
                    <div>
                        <p><?php echo _('Sorry, but the page you were trying to view does not exist. As far as we know, it looks like this was the result of either, a mistyped address, an out-of-date link or our engineers broke something'); ?></p>
                    </div>
                    <form action="<?php echo $this->link('/index.php'); ?>" method="POST">
                        <input type="hidden" name="bad-url" value="<?php echo Platform\Dispatcher::getReferingURL(); ?>" />
                        <button type="submit"><?php echo _('Notify Us') ?></button>
                    </form>
                </div>
            </div>
        </div>
        <script>window.jQuery || document.write("<script src='/<?php echo $this->getTemplateName() ?>/js/libs/jquery-1.5.1.min.js'>\x3C/script>")</script>

        <!-- scripts concatenated and minified via ant build script-->
        <script src="/<?php echo $this->getTemplateName() ?>/js/plugins.js" type="text/javaScript"></script>
        <script src="/<?php echo $this->getTemplateName() ?>/js/script.js" type="text/javaScript"></script>
        <!-- end scripts-->

        <!--[if lt IE 7 ]>
          <script src="js/libs/dd_belatedpng.js"></script>
          <script>DD_belatedPNG.fix("img, .png_bg");</script>
        <![endif]-->
        <?php $this->position("do:debugger") ?>
    </body>
</html>