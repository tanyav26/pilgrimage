<!DOCTYPE html>
<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <html class="no-js" lang="en">
        <head>
            <title><tpl:element type="text" data="page.title">Sign In</tpl:element></title>
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
                                            <form id="form" name="login_form" method="post" action="/member/session/start">                       
                                                <fieldset class="no-margin">
                                                    <legend>Sign in to your account</legend>
                                                    <div class="control-group">
                                                        <label class="control-label" for="user_name_id"><?php echo _('Registered Username or Email'); ?><em class="mandatory">*</em></label>
                                                        <div class="controls row-fluid">
                                                            <input class="input-large focused span11" id="user_name_id" name="user_name_id" type="text" placeholder="JohnDoe1976" />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="user_password"><?php echo _('Password or API Key'); ?><em class="mandatory">*</em></label>
                                                        <div class="controls row-fluid">
                                                            <input class="input-large focused span11" id="user_password" name="user_password" type="password" />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="user_session_save" value="1" />
                                                                Save my login details for 14 days
                                                            </label>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <input type="hidden" name="auth_handler" value="dbauth" />
                                                <input type="hidden" name="redirect" value="" />
                                                <ul>
                                                    <li><a href="/index.php"><?php echo _("Forgot your password?"); ?></a></li>
                                                    <li><a href="/member/account/create"><?php echo _("Don't have an account?"); ?></a></li>
                                                </ul>
                                                <div class="btn-toolbar">
                                                    <div class="btn-group">
                                                        <button type="submit" class="btn">Sign-in</button> 
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
                                <li><a href="/system/admin/index">Administrator</a></li>
                                <li><a href="/about">About</a></li>
                                <li><a href="/apps">Apps</a></li>
                                <li><a href="http://blog.stonyhillshq.com">Blog</a></li>
                                <li><a href="http://developers.stonyhillshq.com">Developers</a></li>
                                <li><a href="/help">Help</a></li>
                                <li><a href="/legal/privacy">Privacy</a></li>
                                <li><a href="/legal/terms">Terms</a></li>
 
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
            <script src='<?php echo $this->getTemplatePath() ?>/js/libs/jquery-1.7.1.min.js' type="text/javascript"></script>
            <script src='<?php echo $this->getTemplatePath() ?>/js/libs/jquery-ui.min.js' type="text/javascript"></script>
            <script src="<?php echo $this->getTemplatePath() ?>/js/libs/modernizr-2.0.6.min.js" type="text/javascript"></script>
            <script src="<?php echo $this->getTemplatePath() ?>/js/bootstrap.min.js" type="text/javascript"></script>
        </body>

    </html>
</tpl:layout>