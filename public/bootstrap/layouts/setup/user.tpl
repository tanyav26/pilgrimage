<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
<div class="page-header">
<!--    <h1><?php echo _('Additional Details') ; ?></h1><br />-->
    <small><?php echo _('Please provide details for the superadmin User account. ' ) ; ?></small>
</div>


<div class="control-group">
    <label class="control-label"  for="username">Username</label>
    <div class="controls input">
        <input class="input-xlarge" id="username" name="username" size="20" type="text" value="<?php echo $this->user->get('username') ; ?>" />
        <span class="help-block">Alpha-numeric only (aA-zZ,0-9)</span>
    </div>
</div><!-- /control-group -->
<div class="control-group">
    <label class="control-label"  for="first-name">First Name</label>
    <div class="controls input">
        <input class="input-xxlarge" id="first-name" name="first-name" size="30" type="text" value="<?php echo $this->user->get('fullname'); ?>" />
        <span class="help-block">Common, or given names</span>
    </div>
</div><!-- /control-group -->
<div class="control-group">
    <label class="control-label"  for="last-name">Last Name</label>
    <div class="controls input">
        <input class="input-xxlarge" id="first-name" name="last-name" size="30" type="text" />
        <span class="help-block">Surname, or Family name</span>
    </div>
</div><!-- /control-group -->
<div class="control-group">
    <label class="control-label"  for="email">Email address</label>
    <div class="controls input">
        <div class="input-prepend">
            <input class="input-xxlarge" id="email" name="email" size="100" type="text" value="<?php echo $this->user->get('email'); ?>" />
        </div>
        <span class="help-block">Its important that this be valid</span>
    </div>
</div><!-- /control-group -->



<div class="control-group">
    <label class="control-label"  for="new-password">New password</label>
    <div class="controls input">
        <input class="input-xlarge" id="new-password" name="new-password" size="30" type="password" />
    </div>
</div><!-- /control-group -->
<div class="control-group">
    <label class="control-label"  for="new-password-repeat">Verify new password</label>
    <div class="controls input">
        <input class="input-xlarge" id="new-password-repeat" name="new-password-repeat" size="30" type="password" />
    </div>
</div><!-- /control-group -->

<div class="control-group">
    <label class="control-label"  for="timezone">Time Zone</label>
    <div class="controls input">
        <select name="timezone" id="timezone" class="input-xxlarge span5 drop">
            <option value="-12.0">(GMT -12:00) Eniwetok, Kwajalein</option>
            <option value="-11.0">(GMT -11:00) Midway Island, Samoa</option>
            <option value="-10.0">(GMT -10:00) Hawaii</option>
            <option value="-9.0">(GMT -9:00) Alaska</option>
            <option value="-8.0">(GMT -8:00) Pacific Time (US and Canada)</option>
            <option value="-7.0">(GMT -7:00) Mountain Time (US and Canada)</option>
            <option value="-6.0">(GMT -6:00) Central Time (US and Canada), Mexico City</option>
            <option value="-5.0">(GMT -5:00) Eastern Time (US and Canada), Bogota, Lima</option><option value="-4.0">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option><option value="-3.5">(GMT -3:30) Newfoundland</option><option value="-3.0">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option><option value="-2.0">(GMT -2:00) Mid-Atlantic</option><option value="-1.0">(GMT -1:00 hour) Azores, Cape Verde Islands</option><option value="0.0" selected="selected">(GMT) Western Europe Time, London, Lisbon, Casablanca</option><option value="1.0">(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</option><option value="2.0">(GMT +2:00) Kaliningrad, South Africa</option><option value="3.0">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option><option value="3.5">(GMT +3:30) Tehran</option><option value="4.0">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option><option value="4.5">(GMT +4:30) Kabul</option><option value="5.0">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option><option value="5.5">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option><option value="5.75">(GMT +5:45) Kathmandu</option><option value="6.0">(GMT +6:00) Almaty, Dhaka, Colombo</option><option value="7.0">(GMT +7:00) Bangkok, Hanoi, Jakarta</option><option value="8.0">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option><option value="9.0">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option><option value="9.5">(GMT +9:30) Adelaide, Darwin</option><option value="10.0">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option><option value="11.0">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option><option value="12.0">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
        </select>
    </div>
</div><!-- /control-group -->

</tpl:layout>
