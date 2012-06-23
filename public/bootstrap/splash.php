<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <html class="no-js" lang="en">
        <head>
            <title><tpl:element type="text" data="page.title">Splash Page</tpl:element></title>
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

            <link rel="stylesheet" href="<?php echo $this->getTemplatePath() ?>/css/bootstrap.css" type="text/css" media="screen" />


        </head>

        <?php //print_R($this); ?>
        <body>
            <form method="post" action="/" style="margin-top: 150px">
                <div role="container" class="container fillfix clearfix">
                    <div class="row clearfix fillfix">
                        <article class="span8">
                            <h1 class="text-embedded"><tpl:element type="text" data="page.title">400</tpl:element></h1>
                            <hr />
                            <div>
                                <tpl:block data="page.block.content" return="true">
                                    <tpl:block data="page.block.alerts" />    
                                    <p>Sorry, but the page you were trying to view does not exist. It looks like this was the result of either: a mistyped address, an out-of-date link, or our engineers have messed things up!</p>
                                </tpl:block>                    
                            </div>
                            <hr />
                            <div>
                                <tpl:block data="page.block.actions" return="true"><a  href="/">Home Page</a></tpl:block>
                                <tpl:import layout="console" />
                            </div>
                        </article>
                    </div>
                </div>
            </form>
            <!-- scripts concatenated and minified via ant build script-->
            <script src='<?php echo $this->getTemplatePath() ?>/js/libs/jquery-1.7.1.min.js' type="text/javascript"></script>
            <script src='<?php echo $this->getTemplatePath() ?>/js/libs/jquery-ui.min.js' type="text/javascript"></script>
            <script src="<?php echo $this->getTemplatePath() ?>/js/libs/modernizr-2.0.6.min.js" type="text/javascript"></script>
            <script src="<?php echo $this->getTemplatePath() ?>/js/bootstrap.min.js" type="text/javascript"></script>
            <!-- end scripts-->
        </body>

    </html>
</tpl:layout>