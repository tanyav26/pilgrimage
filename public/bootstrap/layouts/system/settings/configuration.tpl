<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <form method="POST" action="/" class="form-vertical">
        <fieldset>
            <div class="control-group">
                <label class="control-label" for="site-name"> <?php echo _('Community Name'); ?></label>
                <div class="controls">
                    <input type="text" name="site-name"  class="input-xxxlarge" placeholder="e.g MySocialNetwork" />
                    <span class="help-block">A unique catchy name to identify your community. This will show as the default page titles</span>
                </div>
            </div>                   
            <div class="control-group">
                <label class="control-label" for="site-offline-message"> <?php echo _('Offline message'); ?></label>
                <div class="controls">
                    <textarea name="site-offline-message" class="wysiwyg input-xxxlarge" rows="6" placeholder="<?php echo _('This message will be displayed when the site is offline'); ?>" ></textarea>
                    <span class="help-block"><?php echo _('Brief maintenance message to be displayed to all other users'); ?></span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Maintenance mode</label>
                <div class="controls">
                    <label class="radio">
                        <input type="radio" name="site-offline" id="site-offline1" value="1" />
                        Put site offline for maintenance
                    </label>
                    <label class="radio">
                        <input type="radio" name="site-offline" id="site-offline2" value="0" checked="" />
                        Make site accessible to all
                    </label>
                    <span class="help-block">NOTE: An offline site is not accessible by anyone except special users.</span>
                </div>
            </div>        
            <div class="control-group">
                <label class="control-label" for="site-page-title"> <?php echo _('Website page titles'); ?></label>
                <div class="controls">
                    <select name="site-page-title" class="input-xlarge">
                        <option value="0"><?php echo _('Leave as is'); ?></option>
                        <option value="1"><?php echo _('Prepend community name'); ?></option>
                        <option value="2"><?php echo _('Append community name'); ?></option>
                    </select>
                    <span class="help-block">By default the page title is the community name.</span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="site-address"> <?php echo _('Website URL'); ?></label>
                <div class="controls">
                    <input type="text" name="site-address" class="input-xxxlarge" placeholder="http://www.mydomain.com/" />
                    <span class="help-block">Unless you are using a subdirectory you really don't need to change this.</span>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="site-meta-description"> <?php echo _('Website description'); ?></label>
                <div class="controls">
                    <textarea name="site-meta-description" class="wysiwyg input-xxxlarge" rows="8" ></textarea>
                    <span class="help-block">Describe your community, its interest and purpose. </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="site-meta-keywords"> <?php echo _('Website Keywords'); ?></label>
                <div class="controls">
                    <textarea name="site-meta-keywords" class="wysiwyg input-xxxlarge" ></textarea>
                    <span class="help-block">Lists as many keywords that may promote your listing in some search engines</span>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="site-address"> <?php echo _('Website URL'); ?></label>
                <div class="controls">
                    <input type="text" name="site-address" class="input-xxxlarge" placeholder="http://www.mydomain.com/" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="registration">Registration</label>
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" name="site-allow-registration" value="1" />
                        Allow new user registration?
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="site-inviteonly" value="1" />
                        New user registration by invite only.
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="site-verify-email" value="1" />
                        Verify newly registered user by email
                    </label>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Mail server settings</legend>
            <div class="control-group">
                <label class="control-label" for="mail-address"> <?php echo _('System E-Mail'); ?></label>
                <div class="controls">
                    <input type="text" name="mail-address" class="input-xlarge" placeholder="e.g info@mydomain.com" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="mail-server"> <?php echo _('System Mail Server'); ?></label>
                <div class="controls">
                    <input type="text" name="mail-server" class="input-xlarge" placeholder="e.g http://webmail.mydomain.com" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="mail-server-username"> <?php echo _('Mail Server Username'); ?></label>
                <div class="controls">
                    <input type="text" name="mail-server-username" class="input-xlarge" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="mail-server-password"> <?php echo _('Mail Server Password'); ?></label>
                <div class="controls">
                    <input type="text" name="mail-server-password" class="input-xlarge" />
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Locale settings</legend>
            <div class="control-group">
                <label class="control-label" for="locale-timezone"> <?php echo _('Locale timezone'); ?></label>
                <div class="controls">
                    <select name="locale-timezone" class="input-xxxlarge">
                        <option value="-12.0">(GMT -12:00) Eniwetok, Kwajalein</option>
                        <option value="-11.0">(GMT -11:00) Midway Island, Samoa</option>
                        <option value="-10.0">(GMT -10:00) Hawaii</option>
                        <option value="-9.0">(GMT -9:00) Alaska</option>
                        <option value="-8.0">(GMT -8:00) Pacific Time (US &amp; Canada)</option>
                        <option value="-7.0">(GMT -7:00) Mountain Time (US &amp; Canada)</option>
                        <option value="-6.0">(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
                        <option value="-5.0">(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
                        <option value="-4.0">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
                        <option value="-3.5">(GMT -3:30) Newfoundland</option>
                        <option value="-3.0">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                        <option value="-2.0">(GMT -2:00) Mid-Atlantic</option>
                        <option value="-1.0">(GMT -1:00 hour) Azores, Cape Verde Islands</option>
                        <option value="0.0" selected="selected">(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
                        <option value="1.0">(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</option>
                        <option value="2.0">(GMT +2:00) Kaliningrad, South Africa</option>
                        <option value="3.0">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
                        <option value="3.5">(GMT +3:30) Tehran</option>
                        <option value="4.0">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
                        <option value="4.5">(GMT +4:30) Kabul</option>
                        <option value="5.0">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                        <option value="5.5">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
                        <option value="5.75">(GMT +5:45) Kathmandu</option>
                        <option value="6.0">(GMT +6:00) Almaty, Dhaka, Colombo</option>
                        <option value="7.0">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                        <option value="8.0">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                        <option value="9.0">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                        <option value="9.5">(GMT +9:30) Adelaide, Darwin</option>
                        <option value="10.0">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                        <option value="11.0">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
                        <option value="12.0">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="locale-language"> <?php echo _('Locale language'); ?></label>
                <div class="controls">
                    <select name="locale-language" class="input-xlarge">
                        <option value="en_GB"><?php echo _('English - United Kingdom (en_GB)'); ?></option>
                        <option value="fr_FR"><?php echo _('French - France (fr_FR)'); ?></option>
                        <option value="de_DE"><?php echo _('German - Germany (de_DE)'); ?></option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="locale-dateformat"> <?php echo _('Date format'); ?></label>
                <div class="controls">
                    <select name="locale-dateformat" class="input-xlarge">
                        <option value="default"><?php echo _('Time difference'); ?></option>
                        <option value="locale"><?php echo _('Locale time format'); ?></option>
                    </select>
                </div>
            </div>
        </fieldset>
        <div class="form-actions">
            <button type="submit" class="btn">Save changes</button>
            <button class="btn">Cancel</button>
        </div>
    </form>
</tpl:layout>


