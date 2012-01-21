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
<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
    <head>
        <title><?php echo $this->getPageTitle(); ?></title>

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

        <!-- Style Sheets -->
        <link rel="stylesheet" href="/<?php echo $this->getTemplateName() ?>/css/style.css" />
        <link rel="stylesheet" href="/<?php echo $this->getTemplateName() ?>/css/forms.css" />
        <link rel="stylesheet" href="/<?php echo $this->getTemplateName() ?>/css/reset.css" />

        <!-- Plugin Style Sheets -->
        <link rel="stylesheet" href="/<?php echo $this->getTemplateName() ?>/css/jquery.tipsy.css" />
        <link rel="stylesheet" href="/<?php echo $this->getTemplateName() ?>/css/jquery.datatables.css" />
        <link rel="stylesheet" href="/<?php echo $this->getTemplateName() ?>/css/jquery.facebox.css" />
        <link rel="stylesheet" href="/<?php echo $this->getTemplateName() ?>/css/jquery.datepicker.css" />
        <link rel="stylesheet" href="/<?php echo $this->getTemplateName() ?>/css/jquery.fileinput.css" />
        <link rel="stylesheet" href="/<?php echo $this->getTemplateName() ?>/css/jquery.fullcalendar.css" />
        <link rel="stylesheet" href="/<?php echo $this->getTemplateName() ?>/css/jquery.wysiwyg.css" />

        <!-- Scripts -->
        <script src='/<?php echo $this->getTemplateName() ?>/js/libs/jquery-1.7.1.min.js'></script>
        <script src='/<?php echo $this->getTemplateName() ?>/js/libs/jquery-ui.min.js'></script>
        <script src="/<?php echo $this->getTemplateName() ?>/js/libs/modernizr-1.7.min.js" type="text/javaScript"></script>
    </head>

    <body class="home">
        <!--        <header role="introduction" class="clearfix">
                    <div id="top-bar">
                        <div class="clearfix">
                            <div class="cell whole clearfix" style="padding: 0 10px">                       
                                Logo
                                <h1 class="site-logo" title="Welcome"><a href="<?php echo $this->link('/') ?>">tuiyosocial<em style="font-size:15px">&trade;</em></a></h1>                        
                                 The site navigation bar
                                                     
                            </div>
                        </div>
                    </div>
                </header>-->

        <section role="body" class="clearfix" id="<?php echo $this->get('pageid') ?>">
            <?php if ((boolean) $this->hasPosition("alerts")): ?>
                <section role="notifier">
                    <div class="clearfix">
                        <div class="clearfix">
                            <?php $this->position("alerts"); ?>
                            <!--/Notifications -->
                        </div>
                    </div>
                </section>            
            <?php endif; ?>
            <section id="welcome" class="page">
                <div class="grid">
                    <div class="row">
                        <div class="col sixth" style="max-width: 200px; min-width: 200px">
                            <h1 class="site-logo clearfix" style="border-bottom: 1px solid #eee"><a href="<?php echo $this->link('/index.php'); ?>">tuiyosocial</a></h1>
                            <?php if ($this->hasPosition('toolbar')): $this->position("toolbar");
                            endif ?>
                        </div>
                        <div class="wrap clearfix panel" id="main-panel">
                            <div id="main-panel-scroll" class="row whole clearfix scroll-x">
                                <div class="col half panel-box">
                                    <div class="panel-box-head"></div>
                                    <div class="panel-box-body"><?php $this->position("body") ?></div>
                                </div>
                                <div class="col half panel-box">
                                    <div class="panel-box-head"><a href="#">Close box   </a></div>
                                    <div class="panel-box-body">Another Panel</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </section>
        </section>




        <!-- scripts concatenated and minified via ant build script-->
        <script src="/<?php echo $this->getTemplateName() ?>/js/plugins.js" type="text/javaScript"></script>
        <script src="/<?php echo $this->getTemplateName() ?>/js/script.js" type="text/javaScript"></script>

        <script src="/<?php echo $this->getTemplateName() ?>/js/plugins/jquery.tipsy.js"></script>
        <script src="/<?php echo $this->getTemplateName() ?>/js/plugins/jquery.widgetize.js"></script>
        <script src="/<?php echo $this->getTemplateName() ?>/js/plugins/jquery.wysiwyg.js"></script>
        <script src="/<?php echo $this->getTemplateName() ?>/js/plugins/jquery.facebox.js"></script>
        <script src="/<?php echo $this->getTemplateName() ?>/js/plugins/jquery.datatables.js"></script>
        <script src="/<?php echo $this->getTemplateName() ?>/js/plugins/jquery.datepicker.js"></script>
        <script src="/<?php echo $this->getTemplateName() ?>/js/plugins/jquery.fileinput.js"></script>
        <script src="/<?php echo $this->getTemplateName() ?>/js/plugins/jquery.dref.js"></script>
        <script src="/<?php echo $this->getTemplateName() ?>/js/plugins/jquery.fullcalendar.min.js"></script>
        <script src="/<?php echo $this->getTemplateName() ?>/js/plugins/jquery.flot.js"></script>
        <script src="/<?php echo $this->getTemplateName() ?>/js/plugins/excanvas.js"></script>

        <!-- end scripts-->

        <!--[if lt IE 7 ]>
          <script src="js/libs/dd_belatedpng.js"></script>
          <script>DD_belatedPNG.fix("img, .png_bg");</script>
        <![endif]-->

<?php $this->position("do:debugger") ?>
        <script type="text/javascript" src="/<?php echo $this->getTemplateName() ?>/js/plugins/jquery.cookies.js"></script>
        <script type="text/javascript" >
            //@TODO Replace the jaaulde tools with the system js library tools
            //Plus using cookies to do this is probably overkill! @TODO Re-work menu states in menu sys
            //$('.colapsible-nav ul li div').hide();
            if(jaaulde.utils.cookies.get){
                $('nav ul li a[rel=colapsible]').each(function(i, anchor){
                    var menuid = $(anchor).attr("id") ;
                    $(this).next().css("display", jaaulde.utils.cookies.get( menuid ) );
                })
            } 
            $('nav ul li a[rel=colapsible]').click(function(e) {
                e.preventDefault();
                //$(this).parent().siblings().find('div').slideUp();
                if(jaaulde.utils.cookies.set){ 
                    var menuid = $(this).attr("id"),
                    menustate = ( $(this).next().is(":hidden") ) ? "block" : "none";                  
                    jaaulde.utils.cookies.set( menuid , menustate ); 
                }
                $(this).next().slideToggle();
                return false;
            });
        </script>



    </body>
</html>