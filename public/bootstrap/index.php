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

            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <a class="brand logo" href="<?php echo $this->link("/"); ?>">Pilgrimage</a>
                        <div class="nav-collapse">
                            <form class="navbar-search pull-left" action="<?php echo $this->link("/search"); ?>" method="get">
                                <input type="text" class="search-query span4" name="query" placeholder="Search" />
                            </form>
                            <ul class="nav pull-right">
                                <li><a href="<?php echo $this->link("/sign-in"); ?>">Featured</a></li>
                                <li><a href="<?php echo $this->link("/sign-in"); ?>">Explore</a></li>
                                <li><a href="<?php echo $this->link("/system/activity/stream"); ?>">Activity</a></li>
                                <li class="divider-vertical"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">@drstonyhills<b class="caret">&nbsp;</b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo $this->link("/dashboard"); ?>">Dashboard</a></li>
                                        <li><a href="<?php echo $this->link("/member/profile/view"); ?>">View your profile</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo $this->link("/member/account/settings"); ?>">Profile settings</a></li>
                                        <li><a href="#">Privacy</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo $this->link("/member/messages/inbox"); ?>">Direct messages</a></li>
                                        <li><a href="#">Relationships</a></li>
                                        <li><a href="#">Analytics</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo $this->link("/sign-in"); ?>">Sign out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <tpl:block data="page.block.alerts" />
            <div class="container">             
                <tpl:block data="page.block.banner">Banner</tpl:block>
                <section class="layout-block boxed has-bg">  
                    <div class="row-fluid">
                        <div class="span12">           
                            <div class="row-fluid">
                                <div class="span8"> 
                                    <tpl:block data="page.block.body">Content</tpl:block></div>
                                <div class="span4">
                                    <div class="left-pad">
                                        <div>
                                            <tpl:menu id="sitemenu" />
                                            <tpl:menu id="adminmenu" />
                                        </div>
                                        <tpl:block data="page.block.side">Sidebar</tpl:block>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <script src='/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/jquery-1.7.1.min.js' type="text/javascript"></script>
            <script src='/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/jquery-ui.min.js' type="text/javascript"></script>
            <script src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/modernizr-2.0.6.min.js" type="text/javascript"></script>

            <script src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/bootstrap.min.js" type="text/javascript"></script>

        </body>
    </html>
</tpl:layout>
