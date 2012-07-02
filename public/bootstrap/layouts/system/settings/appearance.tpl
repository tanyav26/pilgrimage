<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <ul class="nav nav-tabs admin-main-tabs" id="apperancePreferences">
        <li class="active"><a data-target="#themes" data-toggle="tab">Themes</a></li>
        <li><a data-target="#navigation" data-toggle="tab">Navigations</a></li>
        <li><a data-target="#widgets" data-toggle="tab">Widgets</a></li>
        <li><a data-target="#layouts" data-toggle="tab">Layouts</a></li>
        <li><a data-target="#optimization" data-toggle="tab">Optimization</a></li>
        <li><a data-target="#scripts" data-toggle="tab">Scripts</a></li>
        <li><a data-target="#banners" data-toggle="tab">Banners</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" id="navigation">
            <form>
                <fieldset>
                    <table class="table table-striped">
                        <thead>
                            <th class="span1"><input type="checkbox" /></th>
                            <th class="span4"><strong>Title</strong></th>
                            <th class="span2"><strong>Unique ID</strong></th>
                            <th class="span4">Position</th>
                            <th class="span1">&nbsp;</th>
                        </thead>
                        <tbody>

                            <?php $menus = $this->get('menus'); foreach($menus as $group ) : ?>
                            <tr>

                                <td class="span1"><input type="checkbox" /></td>
                                <td class="span4"><span><?php echo htmlentities($group['menu_group_title']); ?></span></td>
                                <td class="span2"><?php echo htmlentities($group['menu_group_uid']); ?></td>
                                <td class="span4">
                                    <select>
                                        <option>Menu Position 1</option>
                                        <option>Menu Position 2</option>
                                    </select>
                                </td>
                                <td class="span1"><a href="/system/admin/settings/navigation#<?php echo $group['menu_group_uid']; ?>">Edit</a></td>

                            </tr>
                            <?php endforeach; ?> 
                        </tbody>
                    </table>
                    <hr />
                    <div class="control-group">
                        <label class="control-label" for="appearance[navigation-name]"> <?php echo _('Add Navigation Group Name'); ?></label>
                        <div class="controls">
                            <input type="text" name="appearance[navigation-name]"  class="input-xxxlarge" />
                            <span class="help-block">To create a new navigation group, enter its name/title here. To add multiple navigations use comma seperators, e.g Menu1 Title, Menu2 Title, etc</span>
                        </div>
                    </div>   


                    <hr />
                    <div class="control-group">
                        <label class="control-label">Maintenance mode</label>
                        <div class="controls">
                            <label class="radio">
                                <input type="radio" name="options[site-offline]" id="site-offline1" value="1" />
                                Put site offline for maintenance
                            </label>
                            <label class="radio">
                                <input type="radio" name="options[site-offline]" id="site-offline2" value="0" checked="" />
                                Make site accessible to all
                            </label>
                            <span class="help-block">NOTE: An offline site is not accessible by anyone except special users.</span>
                        </div>
                    </div>  
                </fieldset>
                <div class="btn-toolbar">
                    <button class="btn pull-left btn-danger" type="reset">Reset Form</button>
                    <button type="submit" class="btn btn-success pull-right">Save Theme Navigation settings</button>
                </div>
            </form> 
        </div>
    </div>
</tpl:layout>