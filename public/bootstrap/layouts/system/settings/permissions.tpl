<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <?php $authorities = $this->get("authorities"); ?>
    <ul id="tab" class="nav nav-tabs">
        <li class="active"><a href="#permissions" data-toggle="tab">Permissions</a></li>
        <li><a href="#authorities" data-toggle="tab">Authorities</a></li>
        <li><a href="#roles" data-toggle="tab">Roles</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Special Members<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#dropdown1" data-toggle="tab">@fat</a></li>
                <li><a href="#dropdown2" data-toggle="tab">@mdo</a></li>
            </ul>
        </li>
        <li style="float:right"><a data-toggle="modal" href="#add-authority-role">Add Permission</a></li>
        <li style="float:right"><a data-toggle="modal" href="#add-authority">Add Authority</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="permissions">
            <form class="form-horizontal"> 
                <div class="row-fluid">
                    <div class="span6">
                        <div id="example_length" class="dataTables_length">
                            <label><select name="example_length" class="input-small inline-input"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>&nbsp;Records per page</label>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="dataTables_filter pull-right" id="example_filter">
                            <label>Search: <input type="text" aria-controls="example" /></label>
                        </div>
                    </div>
                </div>
                <fieldset>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="span4">Authority</th>
                                <th class="span5">Area of Responsibility</th>
                                <th class="span1">&nbsp;</th>
                                <th class="span1">&nbsp;</th>
                                <th class="span1">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($this->get("authorities") as $e):
                            if (is_array($e['authority']['permissions'])) :
                            ?>
                            <?php foreach ($e['authority']['permissions'] as $permission): ?>
                            <tr>
                                <td><?php echo str_repeat(' - ', (int) $e['authority']['indent']) . sprintf(_("%s"), $e['authority']['authority_title']); ?></td>
                                <td><a href="/system/admin/settings/privacy.json" rel="modal" title="<?php echo _("Areas affected by this permission") ?>"><span title="<?php echo $permission['permission_area_uri'] ?>" rel="tooltip"><?php echo $permission['permission_title'] ?></span></a></td>
                                <td style="background-color: red; color: #fff"><div class="<?php echo $permission['permission'] ?>"><?php echo _(ucfirst($permission['permission'])) ?></div></td>
                                <td><?php echo _(ucfirst($permission['permission_type'])) ?></td>
                                <td><a href="#" class="btn"><?php echo _('Revoke'); ?></a></td>
                            </tr>
                            <?php endforeach; ?>

                            <?php
                            endif;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                    <div class="pagination">
                        <ul>
                            <li class="disabled"><a href="#">«</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="tab-pane" id="authorities">...</div>
        <div class="tab-pane" id="roles">...</div>
        <div class="tab-pane" id="settings">...</div>
    </div>
    <div id="add-authority-role" class="modal hide fade">
        <form method="POST" action="/system/admin/settings/privacy/permissions/add">
            <div class="modal-header">
                <a href="#" class="close" data-dismiss="modal">×</a>
                <h3>Add authority permission</h3>
            </div>
            <div class="modal-body">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="area-authority"> <?php echo _('Authority (Group)'); ?></label>
                        <div class="controls">
                            <select name="area-authority"  class="input-xxlarge">
                                <?php foreach ($this->get("authorities") as $e): ?>
                                <option value="<?php echo $e['authority']['authority_id'] ?>"><?php echo str_repeat(' - ', (int) $e['authority']['indent']) . ' ' . $e['authority']['authority_title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="area-title"> <?php echo _('Area of Responsibility (AoR)'); ?></label>
                        <div class="controls">
                            <input type="text" name="area-title" class="input-xlarge" placeholder="e.g Marketplace" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="area-uri"> <?php echo _('Area URI'); ?></label>
                        <div class="controls">
                            <input type="text" name="area-uri" class="input-xlarge" placeholder="e.g /marketplace/*" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"><?php echo _('Role Permission'); ?></label>
                        <div class="controls">
                            <div class="row-fluid">
                                <select name="area-action" class="span5">
                                    <option value="view"><?php echo _('View'); ?></option>
                                    <option value="execute"><?php echo _('Execute'); ?></option>
                                    <option value="modify"><?php echo _('Modify'); ?></option>
                                    <option value="special"><?php echo _('Special'); ?></option>
                                </select>
                                <select name="area-permission" class="span5">
                                    <option value="inherit"><?php echo _('Inherited'); ?></option>
                                    <option value="allow"><?php echo _('Allowed'); ?></option>
                                    <option value="deny" selected="selected"><?php echo _('Denied'); ?></option>
                                </select>
                            </div> 
                            <hr />
                            <div class="alert alert-block alert-info">
                                <p><?php echo _('Note that by default, all un-defined permissions are denied. Where thesame permission is defined to the parent, it will be inherited. Also permission heiracchy is Special > Modify > Execute > View, implying an authority with Special permissions can View, Execute and Modify objects in an AoR. An authority with permission to Modify can, automatically View the Objects in this area, etc'); ?></p>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <input type="hidden" name="authority-id"  value="" />
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button class="btn">Cancel</button>
                </div>
            </div>
        </form>
    </div>
    <div id="add-authority" class="modal hide fade">
        <form method="POST" action="/system/admin/settings/privacy/edit">
            <div class="modal-header">
                <a href="#" class="close" data-dismiss="modal">×</a>
                <h3>Add Authority (Permission Group)</h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-block alert-info">
                    <p><?php echo _("An authority is a role in an area of responsibility (AoR). A curator is the head of an authority, who can create and grant permissions to users in that authority, or sub authority. A permission is an authorization to, access, modify or execute an object or operation, granted to an authority or user by a curator. Some authorities are automatically generated. For instance geographical and age authorities, can be used to limit permission by location, and age respectively. A unified command/control plan (UCP), is a predifined map of authority to permission to operation in an Area of Responsibility. For instance, The Authority 'Moderators' granted the permission to 'modifiy' all objects in the 'Post submission' Area of responsibility. The UCP is defined by the Master Administrator, who is the curator or curators") ?></p>
                </div>
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="authority-title"> <?php echo _('Authority Name'); ?></label>
                        <div class="controls">
                            <input type="text" name="authority-title" class="input-xlarge" placeholder="<?php echo _('e.g Global Investors'); ?>" />
                            <span class="help-block"><?php echo _('A name to identify this group of members'); ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="authority-description"> <?php echo _('Authority Description'); ?></label>
                        <div class="controls">
                            <textarea name="authority-description" class="input-xlarge span6" placeholder="<?php echo _('e.g All the users who invested in our groups'); ?>"></textarea>
                            <span class="help-block"><?php echo _('Optional description'); ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="authority-parent"> <?php echo _('Authority Parent'); ?></label>
                        <div class="controls">
                            <select name="authority-parent" id="authority-parent" class="input-xxlarge">
                                <?php foreach ($authorities as $e): ?>
                                <option value="<?php echo $e['authority']['authority_id'] ?>">
                                    <?php echo str_repeat(' - ', (int) $e['authority']['indent']) . ' ' . $e['authority']['authority_title'] ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <span class="help-block"><?php echo _('Make this a sub-authority child of another to inherit parent permissions?'); ?></span>
                        </div>
                    </div>
                    <input type="hidden" name="authority-id"  value="" />
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button class="btn">Cancel</button>
                    </div>
                </fieldset>
            </div>
        </form>
    </div>
</tpl:layout>