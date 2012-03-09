<tpl:layout name="error" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <html class="no-js" lang="en">
        <head>
            <title><tpl:element type="text" data="page.title">Page not found</tpl:element></title>
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
        
        <?php //print_R($this); ?>
        <body>
            <div role="container" class="grid fillfix clearfix ">
                <div class="row clearfix fillfix">
                    <article style="text-align: left; margin: 100px auto; max-width: 80%">
                        <h1>Not found <span>:(</span></h1>
                        <div>
                            <p>Sorry, but the page you were trying to view does not exist.</p>
                            <p>It looks like this was the result of either:</p>
                            <ul>
                                <li>a mistyped address</li>
                                <li>an out-of-date link</li>
                            </ul>
                        </div>
                        <p><a href="/~livingstonefultang/" class="btn secondary">Return home</a></p>
                        <div style="width: 109px">
                            <tpl:import path="layouts/console.tpl" />
                        </div>
                    </article>
                </div>
            </div>
            <!-- scripts concatenated and minified via ant build script-->
            <script src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/plugins.js" type="text/javascript"></script>
            <!-- end scripts-->
        </body>

    </html>
</tpl:layout>