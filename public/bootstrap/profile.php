<!DOCTYPE html>
<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <html lang="en">
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

            <script src='/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/jquery-1.7.1.min.js' type="text/javascript"></script>
            <script src='/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/jquery-ui.min.js' type="text/javascript"></script>
            <script src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/modernizr-2.0.6.min.js" type="text/javascript"></script>
        </head>

        <body>
            <tpl:import layout="navbar" />
            <tpl:block data="page.block.alerts" />
            <div class="container">   
                <tpl:block data="page.block.banner">Banner</tpl:block>
                <section class="layout-block boxed has-bg">
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="profile-header">
                                <h1>Livingstone K. F. Fultang <small>&nbsp;(@drstonyhills)</small></h1>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="left-pad"> 
                                <div class="btn-toolbar no-top-margin">
                                    <div class="btn-group">
                                        <button class="btn">View As...</button>
                                        <button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn">Edit Info</button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn">
                                            <i class="icon icon-lock"></i> Privacy
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-cover">
                        <a href="#" class="clearfix cover"><img  src="http://placehold.it/940x300" width="940" height="300" /></a>
                        <div class="profile-avatar">
                            <a href="#" class="clearfix">
                                <img  src="http://placehold.it/260x250" width="260" height="250" />
                            </a>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12"> 
                            <div class="row-fluid">
                                <div class="span8">&nbsp;</div>
                                <div class="span4">
                                    <div class="left-pad top-pad">
                                        <ul class="page-info">
                                            <li class="signup-date">Member since 10 months ago</li>
                                            <li class="signin-date">Last logged in about 6 days ago</li>
                                            <!-- Date of Birth -->
                                            <li class="company-element">Born on the&nbsp;<a href="#">14th of March</a></li>
                                            <!-- Contact Information -->
                                            <li class="company-element">Works at&nbsp;<a href="#">Stonyhills LLC</a></li>
                                            <li class="email-element"><a href="mailto:livingstonefultang@gmail.com">livingstonefultang@gmail.com</a></li>
                                            <!--CUSTOM SOCIAL INFORMATION-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr class="hr-ccc" />

                            <div class="row">
                                <div class="col span4"><h2>Followers&nbsp;<small><a href="#">View all</a></small></h2></div>
                                <div class="col span12">
                                    <div class="padding-left-25 wrap">
                                        <ul class="media-grid">
                                            <?php for ($i = 0; $i < 14; $i++): ?>
                                                <li>
                                                    <a href="#">
                                                        <img class="thumbnail" src="http://placehold.it/80x80" alt="" width="80" height="80" />
                                                    </a>
                                                </li>
                                            <?php endfor; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr class="hr-ccc" />
                            <div class="row">
                                <div class="col span4"><h2>Following&nbsp;<small><a href="#">View all</a></small></h2></div>
                                <div class="col span12">
                                    <div class="padding-left-25 wrap">
                                        <ul class="media-grid">
                                            <?php for ($i = 0; $i < 14; $i++): ?>
                                                <li>
                                                    <a href="#">
                                                        <img class="thumbnail" src="http://placehold.it/80x80" alt="" width="80" height="80" />
                                                    </a>
                                                </li>
                                            <?php endfor; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr class="hr-ccc" />
                            <div class="row">
                                <div class="col span4"><h2>About Me</h2></div>
                                <div class="col span12">
                                    <div class="padding-left-25 wrap">


                                        <div class="entry">
                                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, <a href="#">links look like this</a>. tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, <strong>bolded word</strong> <a href="#">tempor sit amet</a>, ante. Donec eu <em>this area in italics</em> libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                            <p><span id="more-5"></span></p>
                                            <h2>This is an h2 subtitle</h2>
                                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, <strong>bolded word</strong> <a href="#">tempor sit amet</a>, ante. Donec eu <em>this area in italics</em> libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                            <h3>This is an h3 subtitle</h3>
                                            <ul>
                                                <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                                                <li>Aliquam tincidunt mauris eu risus.</li>
                                                <li>Vestibulum auctor dapibus neque.
                                                    <ul>
                                                        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                                                        <li>Aliquam tincidunt mauris eu risus.</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <h4>This is an h4 subtitle</h4>
                                            <ol>
                                                <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                                                <li>Aliquam tincidunt mauris eu risus.</li>
                                                <li>Vestibulum auctor dapibus neque.
                                                    <ol>
                                                        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                                                        <li>Aliquam tincidunt mauris eu risus.</li>
                                                    </ol>
                                                </li>
                                            </ol>
                                            <blockquote><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. <a href="#">Donec eu</a> libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                            </blockquote>
                                            <h5>This is an h5 subtitle</h5>
                                            <p>Here is some preformatted text:</p>
                                            <pre><code>#header h1 a {
	display: block;
	width: 300px;
	height: 80px;
}</code></pre>
                                            <p>..and some longer code examples:</p>
                                            <pre><code>(http://angry-birds.net/maps/chapter-4/theme-9/level-9-8/).css(
http://angry-birds.net/maps/chapter-4/theme-9/level-9-8/);f=e.css(
http://angry-birds.net/maps/chapter-4/theme-9/level-9-8/,c.css(this[a],
http://angry-birds.net/maps/chapter-4/theme-9/level-9-8/;if(c.css(this[a],
http://angry-birds.net/maps/chapter-4/theme-9/level-9-8/)&amp;&amp;this.style){j.display=c.css(this,
http://angry-birds.net/maps/chapter-4/theme-9/level-9-8/);this.elem.style.display=a?a:this.options.display;if(c.css(this.elem,
http://angry-birds.net/maps/chapter-4/theme-9/level-9-8/],rb=s.defaultView&amp;&amp;s.defaultView.getComputedStyle,Pa=c.support.cssFloat?
http://angry-birds.net/maps/chapter-4/theme-9/level-9-8/},cur:function(a){if(this.elem[this.prop]!=null&amp;&amp;(!this.elem.style||this.elem.style[this.prop]==null))return%20this.elem[this.prop];return(a=parseFloat(c.css(this.elem,this.prop,a)))&amp;&amp;a&gt;-10000?a:parseFloat(c.curCSS(this.elem,this.prop))||0},custom:function(a,b,d){function%20f(j){return%20e.step(j)}this.startTime=J();this.start=a;this.end=b;this.unit=d||this.unit||</code></pre>
                                        </div> 
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
                                <li><a href="<?php echo $this->link('/about'); ?>">About</a></li>
                                <li><a href="<?php echo $this->link('/apps'); ?>">Apps</a></li>
                                <li><a href="http://blog.stonyhillshq.com">Blog</a></li>
                                <li><a href="http://developers.stonyhillshq.com">Developers</a></li>
                                <li><a href="<?php echo $this->link('/help'); ?>">Help</a></li>
                                <li><a href="<?php echo $this->link('/legal/privacy'); ?>">Privacy</a></li>
                                <li><a href="<?php echo $this->link('/legal/terms'); ?>">Terms</a></li>
                                <li><a href="http://store.stonyhillshq.com">Store</a></li>
                            </ul>
                        </div>
                        <div class="span4">
                            <ul class="nav nav-pills pull-right">
                                <li><a href="#">© Stonyhills 2012</a></li>
                            </ul>
                        </div>
                    </div>   
                    <tpl:block data="page.block.footer">Footer</tpl:block>
                    <tpl:import layout="console" />
                    <a href="<?php echo $this->link('/'); ?>" class="btn btn-primary pull-right">Front-Page</a>
                </section>
            </div>
            <script src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/bootstrap.min.js" type="text/javascript"></script>
        </body>
    </html>
</tpl:layout>