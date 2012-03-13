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
        <body class="login">
            <tpl:import layout="navbar" />
            <section role="main" class="container" style="max-width: 325px">
                <article id="login-box">
                    <div class="layout-block boxed no-background">
                        <tpl:block data="page.block.alerts" />
                        <div class="row-fluid">
                            <form id="form" name="login_form" method="post" action="<?php echo $this->link('/member/session/start'); ?>">                       
                                <fieldset>
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
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Sign-in</button>
                                    <tpl:import layout="console" />                                  
                                </div>
                                <ul>
                                    <li><a href="<?php echo $this->link('/index.php'); ?>"><?php echo _("Forgot your password?"); ?></a></li>
                                    <li><a href="<?php echo $this->link('/member/account/create'); ?>"><?php echo _("Register a new account"); ?></a></li>
                                    <li><a href="<?php echo $this->link('/'); ?>"><?php echo _("Back to home-page"); ?></a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </article>
            </section>
            <script src='/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/jquery-1.7.1.min.js' type="text/javascript"></script>
            <script src='/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/jquery-ui.min.js' type="text/javascript"></script>
            <script src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/modernizr-2.0.6.min.js" type="text/javascript"></script>
            <script src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/bootstrap.min.js" type="text/javascript"></script>
            <!--[if lt IE 7 ]>
              <script src="js/libs/dd_belatedpng.js"></script>
              <script>DD_belatedPNG.fix("img, .png_bg");</script>
            <![endif]-->
        </body>
    </html>
</tpl:layout>