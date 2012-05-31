<tpl:layout name="error" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <html class="no-js" lang="en">
        <head>
            <title><tpl:element type="text" data="page.title">Error Page</tpl:element></title>
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
                <div role="container" class="container fillfix clearfix" style="max-width: 400px">
                    <div class="row clearfix fillfix">
                        <article>
                            <h1 class="text-embedded">404</h1>
                            <hr />
                            <div>
                                <p>Sorry, but the page you were trying to view does not exist. It looks like this was the result of either: a mistyped address or an out-of-date link</p>
                              
                            </div>
                            <hr />
                            <div>
                                <a  href="/">Homepage</a>
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