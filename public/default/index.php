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
            <meta name="viewport" content="width=device-width,initial-scale=1" />

            <link rel="stylesheet" href="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/css/default.css" type="text/css" media="screen" />

            <script src='/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/jquery-1.7.1.min.js' type="text/javascript"></script>
            <script src='/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/jquery-ui.min.js' type="text/javascript"></script>
            <script src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/libs/modernizr-2.0.6.min.js" type="text/javascript"></script>

        </head>
        <body class="has-header has-footer has-sidebar">
            <div role="header" class="header">
                <div class="topbar fill">
                    <div class="inner">
                        <div class="container">
                            <h3><a href="<?php echo $this->link('/'); ?>">Social networking</a></h3>

                            <form class="pull-left" action="">
                                <input type="text" placeholder="Search" />
                            </form>
                            <ul class="nav">

                                <li class="active"><a href="#" >Featured</a></li>
                                <li><a href="#">Explore</a></li>
                                <li><a href="#">Interact</a></li>
                            </ul>

                            <tpl:menu id="mainmenu" />

                            <ul class="nav secondary-nav">
                                <li class="dropdown" data-dropdown="dropdown">
                                    <a href="#" class="dropdown-toggle">Livingstone Fultang</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Secondary link</a></li>
                                        <li><a href="#">Something else here ë</a></li>
                                        <li><a href="#">Another link</a></li>
                                    </ul>
                                </li>
                            </ul>



                        </div>
                    </div>
                </div>
            </div>

            <div role="container" class="grid fillfix clearfix ">
                <div class="row clearfix fillfix">

                    <div role="sidebar" class="sidebar fillfix">

                        <tpl:menu id="dashboardmenu" />

                        <hr class="h-seperator" />

                        <tpl:menu id="adminmenu" />

                    </div>

                    <div role="content" class="content fillfix">

                        <div class="row fillfix scrollx clearfix">

                            <div role="widget" class="widget col size-940 fullheight scrolly">
                                <div class="widget-header">
                                    <a href="#" class="close">×</a>
                                    <!-- Breadcrumbs -->
                                    <ul class="breadcrumb">
                                        <li><a href="#">Home</a> <span class="divider">/</span></li>
                                        <li><a href="#">Middle page</a> <span class="divider">/</span></li>
                                        <li><a href="#">Another one</a> <span class="divider">/</span></li>
                                        <li class="active">You are here</li>
                                    </ul>
                                </div>
                                <div class="widget-body"><?php $this->position("body") ?></div>
                            </div>
                            <div role="widget" class="widget col size-640 fullheight scrolly">
                                <div class="widget-header"><a href="#" class="close">×</a>Latest</div>
                                <div class="widget-body">




                                    <!-- Alerts -->
                                    <div class="alert-message warning">
                                        <a class="close" href="#">×</a>
                                        <p><strong>Holy guacamole!</strong> Best check yo self, you are not <a href="#">looking too good</a>.</p>
                                    </div>

                                    <div class="alert-message error">
                                        <a class="close" href="#">×</a>
                                        <p><strong>Oh snap!</strong> Change this and that and <a href="#">try again</a>.</p>
                                    </div>

                                    <div class="alert-message success">
                                        <a class="close" href="#">×</a>
                                        <p><strong>Well done!</strong> You successfully <a href="#">read this</a> alert message.</p>
                                    </div>

                                    <div class="alert-message info">
                                        <a class="close" href="#">×</a>
                                        <p><strong>Heads up!</strong> This is an alert that needs your attention, but it’s not <a href="#">a huge priority</a> just yet.</p>
                                    </div>

                                    <div class="alert-message block-message warning">
                                        <a class="close" href="#">×</a>
                                        <p><strong>Holy guacamole! This is a warning!</strong> Best check yo self, you’re not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
                                        <div class="alert-actions">
                                            <a class="btn small" href="#">Take this action</a>&nbsp;<a class="btn small" href="#">Or do this</a>
                                        </div>
                                    </div>
                                    <div class="alert-message block-message error">
                                        <a class="close" href="#">×</a>
                                        <p><strong>Oh snap! You got an error!</strong> Change this and that and <a href="#">try again</a>.</p>
                                        <ul>
                                            <li>Duis mollis est non commodo luctus</li>
                                            <li>Nisi erat porttitor ligula</li>
                                            <li>Eget lacinia odio sem nec elit</li>
                                        </ul>
                                        <div class="alert-actions">
                                            <a class="btn small" href="#">Take this action</a>&nbsp;<a class="btn small" href="#">Or do this</a>
                                        </div>
                                    </div>

                                    <div class="alert-message block-message success">
                                        <a class="close" href="#">×</a>
                                        <p><strong>Well done!</strong> You successfully read this alert message. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas faucibus mollis interdum.</p>
                                        <div class="alert-actions">
                                            <a class="btn small" href="#">Take this action</a>&nbsp;<a class="btn small" href="#">Or do this</a>
                                        </div>
                                    </div>

                                    <div class="alert-message block-message info">
                                        <a class="close" href="#">×</a>
                                        <p><strong>Heads up!</strong> This is an alert that needs your attention, but it’s not a huge priority just yet.</p>
                                        <div class="alert-actions">
                                            <a class="btn small" href="#">Take this action</a>&nbsp;
                                            <a class="btn small" href="#">Or do this</a>
                                        </div>
                                    </div>

                                    <!-- Tabs -->
                                    <ul class="tabs">
                                        <li class="active" data-toggle="tab"><a href="#hometab" data-toggle="tab">Home</a></li>
                                        <li><a href="#profile" data-toggle="tab">Profile</a></li>
                                        <li><a href="#messages" data-toggle="tab">Messages</a></li>
                                        <li><a href="#settings" data-toggle="tab">Settings</a></li>
                                        <li><a href="#contact" data-toggle="tab">Contact</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="hometab">Homepage</div>
                                        <div class="tab-pane" id="profile">Profile</div>
                                        <div class="tab-pane" id="messages">Messages</div>
                                        <div class="tab-pane" id="settings">Settings</div>
                                        <div class="tab-pane" id="contact">Contact</div>
                                    </div>

                                 

                                    <!-- Pop-overs -->
                                    <div class="well" style="background-color: #888; border: none; padding: 40px;">
                                        <!-- Modal -->
                                        <div class="modal" style="position: relative; top: auto; left: auto; margin: 0 auto; z-index: 1">
                                            <div class="modal-header">
                                                <a href="#" class="close">×</a>
                                                <h3>Modal Heading</h3>
                                            </div>
                                            <div class="modal-body">
                                                <p>One fine body…</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" class="btn primary">Primary</a>
                                                <a href="#" class="btn secondary">Secondary</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagination -->
                                    <div class="pagination">
                                        <ul>
                                            <li class="prev disabled"><a href="#">← Previous</a></li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li class="next"><a href="#">Next →</a></li>
                                        </ul>
                                    </div>
                                </div>


                            </div>
                            <div role="widget" class="widget col size-640 fullheight scrolly">
                                <div class="widget-header"><a href="#" class="close">×</a>Widget title bar</div>
                                <div class="widget-body">
                                    <ul class="media-grid">
                                        <li>
                                            <a href="#">
                                                <img class="thumbnail" src="http://placehold.it/90x90" alt="" width="90" height="90" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img class="thumbnail" src="http://placehold.it/90x90" alt="" width="90" height="90" />
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div role="widget" class="widget col size-640 fullheight scrolly">
                                <div class="widget-header">Widget title bar<a href="#" class="close">×</a></div>
                                <div class="widget-body">
                                    <form>
                                        <fieldset>
                                            <legend>Example form legend</legend>
                                            <div class="clearfix">
                                                <label for="xlInput">X-Large input</label>
                                                <div class="input">
                                                    <input class="xlarge" id="xlInput" name="xlInput" size="30" type="text" />
                                                </div>
                                            </div><!-- /clearfix -->
                                            <div class="clearfix">
                                                <label for="normalSelect">Select</label>
                                                <div class="input">
                                                    <select name="normalSelect" id="normalSelect">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div><!-- /clearfix -->
                                            <div class="clearfix">
                                                <label for="mediumSelect">Select</label>
                                                <div class="input">
                                                    <select class="medium" name="mediumSelect" id="mediumSelect">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div><!-- /clearfix -->
                                            <div class="clearfix">
                                                <label for="multiSelect">Multiple select</label>
                                                <div class="input">
                                                    <select class="medium" size="5" multiple="multiple" name="multiSelect" id="multiSelect">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div><!-- /clearfix -->
                                            <div class="clearfix">
                                                <label>Uneditable input</label>
                                                <div class="input">
                                                    <span class="uneditable-input">Some value here</span>
                                                </div>
                                            </div><!-- /clearfix -->
                                            <div class="clearfix">
                                                <label for="disabledInput">Disabled input</label>
                                                <div class="input">
                                                    <input class="xlarge disabled" id="disabledInput" name="disabledInput" size="30" type="text" placeholder="Disabled input here… carry on." disabled="" />
                                                </div>
                                            </div><!-- /clearfix -->
                                            <div class="clearfix">
                                                <label for="disabledInput">Disabled textarea</label>
                                                <div class="input">
                                                    <textarea class="xlarge" name="textarea" id="textarea" rows="3" disabled=""></textarea>
                                                </div>
                                            </div><!-- /clearfix -->
                                            <div class="clearfix error">
                                                <label for="errorInput">Input with error</label>
                                                <div class="input">
                                                    <input class="xlarge error" id="errorInput" name="errorInput" size="30" type="text" />
                                                    <span class="help-inline">Small snippet of help text</span>
                                                </div>
                                            </div><!-- /clearfix -->
                                            <div class="clearfix success">
                                                <label for="successInput">Input with success</label>
                                                <div class="input">
                                                    <input class="xlarge error" id="successInput" name="successInput" size="30" type="text" />
                                                    <span class="help-inline">Success!</span>
                                                </div>
                                            </div><!-- /clearfix -->
                                            <div class="clearfix warning">
                                                <label for="warningInput">Input with warning</label>
                                                <div class="input">
                                                    <input class="xlarge error" id="warningInput" name="warningInput" size="30" type="text" />
                                                    <span class="help-inline">Ruh roh!</span>
                                                </div>
                                            </div><!-- /clearfix -->
                                        </fieldset>
                                        <fieldset>
                                            <legend>Example form legend</legend>
                                            <div class="clearfix">
                                                <label for="prependedInput">Prepended text</label>
                                                <div class="input">
                                                    <div class="input-prepend">
                                                        <span class="add-on">@</span>
                                                        <input class="medium" id="prependedInput" name="prependedInput" size="16" type="text" />
                                                    </div>
                                                    <span class="help-block">Here's some help text</span>
                                                </div>
                                            </div><!-- /clearfix -->
                                            <div class="clearfix">
                                                <label for="prependedInput2">Prepended checkbox</label>
                                                <div class="input">
                                                    <div class="input-prepend">
                                                        <label class="add-on"><input type="checkbox" name="" id="" value="" /></label>
                                                        <input class="mini" id="prependedInput2" name="prependedInput2" size="16" type="text" />
                                                    </div>
                                                </div>
                                            </div><!-- /clearfix -->
                                            <div class="clearfix">
                                                <label for="appendedInput">Appended checkbox</label>
                                                <div class="input">
                                                    <div class="input-append">
                                                        <input class="mini" id="appendedInput" name="appendedInput" size="16" type="text" />
                                                        <label class="add-on active"><input type="checkbox" name="" id="" value="" checked="checked" /></label>
                                                    </div>
                                                </div>
                                            </div><!-- /clearfix -->
                                            <div class="clearfix">
                                                <label for="fileInput">File input</label>
                                                <div class="input">
                                                    <input class="input-file" id="fileInput" name="fileInput" type="file" />
                                                </div>
                                            </div><!-- /clearfix -->
                                        </fieldset>
                                        <fieldset>
                                            <legend>Example form legend</legend>
                                            <div class="clearfix">
                                                <label id="optionsCheckboxes">List of options</label>
                                                <div class="input">
                                                    <ul class="inputs-list">
                                                        <li>
                                                            <label>
                                                                <input type="checkbox" name="optionsCheckboxes" value="option1" />
                                                                <span>Option one is this and that—be sure to include why it’s great</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="checkbox" name="optionsCheckboxes" value="option2" />
                                                                <span>Option two can also be checked and included in form results</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="checkbox" name="optionsCheckboxes" value="option2" />
                                                                <span>Option three can—yes, you guessed it—also be checked and included in form results. Let's make it super long so that everyone can see how it wraps, too.</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="disabled">
                                                                <input type="checkbox" name="optionsCheckboxes" value="option2" disabled="" />
                                                                <span>Option four cannot be checked as it is disabled.</span>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                    <span class="help-block">
                                                        <strong>Note:</strong> Labels surround all the options for much larger click areas and a more usable form.
                                                    </span>
                                                </div>
                                            </div><!-- /clearfix -->
                                            <div class="clearfix">
                                                <label>Date range</label>
                                                <div class="input">
                                                    <div class="inline-inputs">
                                                        <input class="small" type="text" value="May 1, 2011" />
                                                        <input class="mini" type="text" value="12:00am" />
                                                        to
                                                        <input class="small" type="text" value="May 8, 2011" />
                                                        <input class="mini" type="text" value="11:59pm" />
                                                        <span class="help-block">All times are shown as Pacific Standard Time (GMT -08:00).</span>
                                                    </div>
                                                </div>
                                            </div><!-- /clearfix -->
                                            <div class="clearfix">
                                                <label for="textarea">Textarea</label>
                                                <div class="input">
                                                    <textarea class="xlarge" id="textarea2" name="textarea2" rows="3"></textarea>
                                                    <span class="help-block">
                                                        Block of help text to describe the field above if need be.
                                                    </span>
                                                </div>
                                            </div><!-- /clearfix -->
                                            <div class="clearfix">
                                                <label id="optionsRadio">List of options</label>
                                                <div class="input">
                                                    <ul class="inputs-list">
                                                        <li>
                                                            <label>
                                                                <input type="radio" checked="" name="optionsRadios" value="option1" />
                                                                <span>Option one is this and that—be sure to include why it’s great</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" name="optionsRadios" value="option2" />
                                                                <span>Option two can is something else and selecting it will deselect options 1</span>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- /clearfix -->
                                            <div class="actions">
                                                <input type="submit" class="btn primary" value="Save changes" />&#160;<button type="reset" class="btn">Cancel</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            <div role="widget" class="widget col size-640 fullheight scrolly">
                                <div class="widget-header">Widget title bar<a href="#" class="close">×</a></div>
                                <div class="widget-body">
                                    <blockquote>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
                                        <small>Dr. Julius Hibbert</small>
                                    </blockquote>
                                </div>
                            </div>
                            <div role="widget" class="widget col size-640 fullheight scrolly last">
                                <div class="widget-header">Widget title bar<a href="#" class="close">×</a></div>
                                <div class="widget-body">
                                    <table class="bordered-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Language</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Some</td>
                                                <td>One</td>
                                                <td>English</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Joe</td>
                                                <td>Sixpack</td>
                                                <td>English</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Stu</td>
                                                <td>Dent</td>
                                                <td>Code</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div role="footer">

                <div class="grid">
                    <div class="row">
                        <div class="col span3">
                            <div style="padding: 1px;" class="clearfix">
                                <label class="fluid no-padding">
                                    <input type="checkbox" class="checkbox-toggler" name="togglesidebar" data-content-on="Hide the sidebar" data-content-off="Show the sidebar" value="false" />
                                    <span class="checkbox checked">                                   
                                        <span class="checkbox-off">Hide</span>
                                        <span class="checkbox-on">Show</span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col span13">
                            <tpl:import path="layouts/console.tpl" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- scripts concatenated and minified via ant build script-->
            <script src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/plugins.js" type="text/javascript"></script>
            <!-- end scripts-->



            <!--[if lt IE 7 ]>
              <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
              <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
            <![endif]-->

        </body>
    </html>
</tpl:layout>
