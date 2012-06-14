<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
<div class="page-header">
<!--    <h1><?php echo _('Additional Details') ; ?></h1><br />-->
    <small><?php echo _('Please provide details for the superadmin User account. ' ) ; ?></small>
</div>


<div class="control-group">
    <label class="control-label"  for="user_name_id">Username</label>
    <div class="controls input">
        <input class="input-xlarge" id="user_name_id" name="user_name_id" size="20" type="text" value="<?php echo $this->user->get('username') ; ?>" />
        <span class="help-block">Alpha-numeric only (aA-zZ,0-9)</span>
    </div>
</div><!-- /control-group -->
<div class="control-group">
    <label class="control-label"  for="user_name">Full Name</label>
    <div class="controls input">
        <input class="input-xxlarge" id="user_name" name="user_name" size="30" type="text" value="<?php echo $this->user->get('fullname'); ?>" />
        <span class="help-block">Common, or given names</span>
    </div>
</div><!-- /control-group -->
<div class="control-group">
    <label class="control-label"  for="user_email">Email address</label>
    <div class="controls input">
        <div class="input-prepend">
            <input class="input-xxlarge" id="user_email" name="user_email" size="100" type="text" value="<?php echo $this->user->get('email'); ?>" />
        </div>
        <span class="help-block">Its important that this be valid</span>
    </div>
</div><!-- /control-group -->



<div class="control-group">
    <label class="control-label"  for="user_password">New password</label>
    <div class="controls input">
        <input class="input-xlarge" id="user_password" name="user_password" size="30" type="password" />
    </div>
</div><!-- /control-group -->
<div class="control-group">
    <label class="control-label"  for="user_password_2">Verify new password</label>
    <div class="controls input">
        <input class="input-xlarge" id="user_password_2" name="user_password_2" size="30" type="password" />
    </div>
</div><!-- /control-group -->

</tpl:layout>
