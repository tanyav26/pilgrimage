<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">

    <ul class="nav nav-tabs admin-main-tabs" id="systemPreferences">
        <li class="active"><a data-target="#addnew" data-toggle="tab">Upload Package</a></li>
        <li><a data-target="#featured" data-toggle="tab">Featured</a></li>
        <li><a data-target="#recommendations" data-toggle="tab">Recommendations</a></li>
        <li><a data-target="#newest" data-toggle="tab">Newest</a></li>
        <li><a data-target="#popular" data-toggle="tab">Popular</a></li>
        <li><a data-target="#updates" data-toggle="tab">Updates</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="addnew" > 
            <form>
                <fieldset>
                    <h3><?php echo _('Add New Extension or Theme'); ?></h3>
                    <p><?php echo _('Upload a valid extension package (theme, plugin, library etc) to install on your platform.'); ?></p>

                    <hr class="hr-ccc" />

                    <label> <?php echo _('Upload extension archive'); ?>
                        <span class="small"> &HorizontalLine; <a href="#"><?php echo _('Upload from URL instead?'); ?></a></span>
                    </label>
                    <input type="file" name="extension-archive" value="" id="Select a file to upload from your computer" style="width: 100%" />

                    <label style="margin: 15px 0 10px">
                        <input type="checkbox" name="allow-registraion" checked="checked" value="1" />
                        <?php echo _('Verify packages before install?'); ?>
                        <span class="small"></span>
                    </label>

                    <label style="margin: 15px 0 10px">
                        <input type="checkbox" name="allow-registraion" checked="checked" value="1" />
                        <?php echo _('Match to repository before intall, to get automatic updates'); ?>
                        <span class="small"></span>
                    </label>

                    <label style="margin: 15px 0 10px">
                        <input type="checkbox" name="allow-registraion" checked="checked" value="1" />
                        <?php echo _('You accept the terms and conditions for use of this extension'); ?>
                        <span class="small"></span>
                    </label>

                    <hr class="hr-ccc" style="margin-top: 20px"/>

                    <button type="submit" style="margin-top: 10px; margin-left: 0px"><?php echo _('Upload Extension'); ?></button>

                </fieldset>
            </form>
        </div>
        <div  class="tab-pane" id="featured">
            <form class="wrap">
                <fieldset >
                    <h3><?php echo _('Featured Extensions'); ?></h3>

                    <p><?php echo _('Specially useful and promoted extensions you might find helpful for your site') ?></p>

                    <hr class="hr-ccc" />

                    <div class="grid">
                        <div class="row wrap">
                            <div class="col third" align="left">
                                <a class="button" rel="modal" title="Add new themes" href="#addTheme" style="width:101px"><?php echo _('Visit Repository') ?></a>
                            </div>
                            <div class="col third" align="center">&nbsp;</div>
                            <div class="col third" align="right">
                                <button style="margin-right:-3px">List</button>
                                <button style="margin-left:-3px" class="active">Grid</button>
                            </div>

                        </div>
                        <div class="row wrap"></div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div  class="tab-pane" id="popular">
            <form class="wrap">
                <fieldset >
                    <h3><?php echo _('Popular Extensions'); ?></h3>

                    <p><?php echo _('Based on downloads by other Tuiyo Platform users'); ?></p>

                    <hr class="hr-ccc" />

                    <div class="grid">
                        <div class="row wrap">
                            <div class="col third" align="left">
                                <a class="button" rel="modal" title="Add new themes" href="#addTheme" style="width:101px"><?php echo _('Visit Repository') ?></a>
                            </div>
                            <div class="col third" align="center">&nbsp;</div>
                            <div class="col third" align="right">
                                <button style="margin-right:-3px">List</button>
                                <button style="margin-left:-3px" class="active">Grid</button>
                            </div>

                        </div>
                        <div class="row wrap"></div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div  class="tab-pane" id="recommendations">
            <form class="wrap">
                <fieldset >
                    <h3><?php echo _('Recommended Extensions'); ?></h3>

                    <p><?php echo _('Staff recommendations'); ?></p>

                    <hr class="hr-ccc" />

                    <div class="grid">
                        <div class="row wrap">
                            <div class="col third" align="left">
                                <a class="button" rel="modal" title="Add new themes" href="#addTheme" style="width:101px"><?php echo _('Visit Repository') ?></a>
                            </div>
                            <div class="col third" align="center">&nbsp;</div>
                            <div class="col third" align="right">
                                <button style="margin-right:-3px">List</button>
                                <button style="margin-left:-3px" class="active">Grid</button>
                            </div>

                        </div>
                        <div class="row wrap"></div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div  class="tab-pane" id="newest">
            <form class="wrap">
                <fieldset >
                    <h3><?php echo _('Newest Extensions'); ?></h3>

                    <p><?php echo _('New and upcomming Extensions or Theme') ?></p>

                    <hr class="hr-ccc" />

                    <div class="grid">
                        <div class="row wrap">
                            <div class="col third" align="left">
                                <a class="button" rel="modal" title="Add new themes" href="#addTheme" style="width:101px"><?php echo _('Visit Repository') ?></a>
                            </div>
                            <div class="col third" align="center">&nbsp;</div>
                            <div class="col third" align="right">
                                <button style="margin-right:-3px">List</button>
                                <button style="margin-left:-3px" class="active">Grid</button>
                            </div>

                        </div>
                        <div class="row wrap"></div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</tpl:layout>

