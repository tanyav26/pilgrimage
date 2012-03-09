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
        <body class="login" style="padding-bottom: 100px">
            <section role="main" class="container" style="max-width: 325px">

                <article id="login-box">

                    <div class="layout-block boxed no-background">

                        <tpl:block data="page.block.alerts" />

                        <form id="form" name="form" method="post" action="<?php echo $this->link('/member/account/update'); ?>">
                            <fieldset>
                                <legend>Register a new account</legend><tpl:block data="page.block.alerts" />
                                <div class="control-group">
                                    <label class="control-label" for="user_name"><?php echo _('Full Name'); ?><em class="mandatory">*</em></label>
                                    <div class="controls">
                                        <input class="input-large focused" id="user_name" name="user_name" type="text" placeholder="John Doe" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="user_name_id"><?php echo _('Unique Username'); ?><em class="mandatory">*</em></label>
                                    <div class="controls">
                                        <input class="input-large focused" id="user_name_id" name="user_name_id" type="text" placeholder="JohnDoe1976" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="user_email"><?php echo _('Email address'); ?><em class="mandatory">*</em></label>
                                    <div class="controls">
                                        <input class="input-large focused" id="user_email" name="user_email" type="text" placeholder="<?php echo _('e.g john.doe@example.com'); ?>" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="user_password"><?php echo _('Password'); ?><em class="mandatory">*</em></label>
                                    <div class="controls">
                                        <input class="input-large focused" id="user_password" name="user_password" type="password" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="user_password_2"><?php echo _('Verify Password'); ?><em class="mandatory">*</em></label>
                                    <div class="controls">
                                        <input class="input-large focused" id="user_password_2" name="user_password_2" type="password" />
                                    </div>
                                </div>

                                <hr class="soften" />

                                <div class="control-group">
                                    <label class="control-label" for="user_terms">Legal Stuff</label>
                                    <div class="controls">
                                        <label class="checkbox">
                                            <input type="checkbox" name="user_accepted_terms" value="1" />
                                            You agree to our&nbsp;<a href="#">terms and conditions</a>
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="user_accepted_terms_2" value="2" />
                                            You agree to our&nbsp;<a href="#">privacy policy</a>
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Create</button>
                                <tpl:import layout="console" />
                            </div>
                            <ul>
                                <li><a href="<?php echo $this->link('/sign-in'); ?>"><?php echo _("Already have an account?"); ?></a></li>
                                <li><a href="<?php echo $this->link('/sign-up'); ?>"><?php echo _("Sign up with Facebook or Twitter"); ?></a></li>
                                <li><a href="<?php echo $this->link('/'); ?>"><?php echo _("Back to home-page"); ?></a></li>
                            </ul>
                        </form>

                    </div>

                </article>


            </section>

            <?php $this->position("do:debugger") ?>

            <!-- JS Libs at the end for faster loading -->
            <script src='/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/jquery-1.7.1.min.js' type="text/javascript"></script>
            <script src='/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/jquery-ui.min.js' type="text/javascript"></script>
            <script src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/modernizr-2.0.6.min.js" type="text/javascript"></script>

            <script src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/bootstrap.min.js" type="text/javascript"></script>


        </body>
    </html>

</tpl:layout>