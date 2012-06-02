<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
<div class="page-header">
    <h1>Account Information</h1>
</div>
<form class="form-vertical" action="/" method="POST">
    <fieldset>
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
                <input class="input-xxxlarge" id="first-name" name="first-name" size="30" type="text" value="<?php echo $this->user->get('fullname'); ?>" />
                <span class="help-block">Common, or given names</span>
            </div>
        </div><!-- /control-group -->
        <div class="control-group">
            <label class="control-label"  for="last-name">Last Name</label>
            <div class="controls input">
                <input class="input-xxxlarge" id="first-name" name="last-name" size="30" type="text" />
                <span class="help-block">Surname, or Family name</span>
            </div>
        </div><!-- /control-group -->
        <div class="control-group">
            <label class="control-label"  for="email">Email address</label>
            <div class="controls input">
                <div class="input-prepend">
                    <input class="input-xxxlarge" id="email" name="email" size="100" type="text" value="<?php echo $this->user->get('email'); ?>" />
                </div>
                <span class="help-block">Its important that this be valid</span>
            </div>
        </div><!-- /control-group -->
        <div class="control-group">
            <label class="control-label" >Date of Birth</label>
            <div class="controls input inline-inputs">
                <select name="dob[day]" id="dob-day" style="width: 90px" class="drop">
                    <option>Day</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
                <select name="dob[month]" id="dob-month" style="width: 120px" class="inline drop">
                    <option>- Month -</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select name="dob[year]" id="dob-year" style="width: 90px" class="inline drop">
                    <option>- Year -</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                    <option value="2004">2004</option>
                    <option value="2003">2003</option>
                    <option value="2002">2002</option>
                    <option value="2001">2001</option>
                    <option value="2000">2000</option>
                    <option value="1999">1999</option>
                    <option value="1998">1998</option>
                    <option value="1997">1997</option>
                    <option value="1996">1996</option>
                    <option value="1995">1995</option>
                    <option value="1994">1994</option>
                    <option value="1993">1993</option>
                    <option value="1992">1992</option>
                    <option value="1991">1991</option>
                    <option value="1990">1990</option>
                    <option value="1989">1989</option>
                    <option value="1988">1988</option>
                    <option value="1987">1987</option>
                    <option value="1986">1986</option>
                    <option value="1985">1985</option>
                    <option value="1984">1984</option>
                    <option value="1983">1983</option>
                    <option value="1982">1982</option>
                    <option value="1981">1981</option>
                    <option value="1980">1980</option>
                    <option value="1979">1979</option>
                    <option value="1978">1978</option>
                    <option value="1977">1977</option>
                    <option value="1976">1976</option>
                    <option value="1975">1975</option>
                    <option value="1974">1974</option>
                    <option value="1973">1973</option>
                    <option value="1972">1972</option>
                    <option value="1971">1971</option>
                    <option value="1970">1970</option>
                    <option value="1969">1969</option>
                    <option value="1968">1968</option>
                    <option value="1967">1967</option>
                    <option value="1966">1966</option>
                    <option value="1965">1965</option>
                    <option value="1964">1964</option>
                    <option value="1963">1963</option>
                    <option value="1962">1962</option>
                    <option value="1961">1961</option>
                    <option value="1960">1960</option>
                    <option value="1959">1959</option>
                    <option value="1958">1958</option>
                    <option value="1957">1957</option>
                    <option value="1956">1956</option>
                    <option value="1955">1955</option>
                    <option value="1954">1954</option>
                    <option value="1953">1953</option>
                    <option value="1952">1952</option>
                    <option value="1951">1951</option>
                    <option value="1950">1950</option>
                    <option value="1949">1949</option>
                    <option value="1948">1948</option>
                    <option value="1947">1947</option>
                    <option value="1946">1946</option>
                    <option value="1945">1945</option>
                    <option value="1944">1944</option>
                    <option value="1943">1943</option>
                    <option value="1942">1942</option>
                    <option value="1941">1941</option>
                    <option value="1940">1940</option>
                    <option value="1939">1939</option>
                    <option value="1938">1938</option>
                    <option value="1937">1937</option>
                    <option value="1936">1936</option>
                    <option value="1935">1935</option>
                    <option value="1934">1934</option>
                    <option value="1933">1933</option>
                    <option value="1932">1932</option>
                    <option value="1931">1931</option>
                    <option value="1930">1930</option>
                    <option value="1929">1929</option>
                    <option value="1928">1928</option>
                    <option value="1927">1927</option>
                    <option value="1926">1926</option>
                    <option value="1925">1925</option>
                    <option value="1924">1924</option>
                    <option value="1923">1923</option>
                    <option value="1922">1922</option>
                    <option value="1921">1921</option>
                    <option value="1920">1920</option>
                    <option value="1919">1919</option>
                    <option value="1918">1918</option>
                    <option value="1917">1917</option>
                    <option value="1916">1916</option>
                    <option value="1915">1915</option>
                    <option value="1914">1914</option>
                    <option value="1913">1913</option>
                    <option value="1912">1912</option>
                    <option value="1911">1911</option>
                    <option value="1910">1910</option>
                    <option value="1909">1909</option>
                    <option value="1908">1908</option>
                    <option value="1907">1907</option>
                    <option value="1906">1906</option>
                    <option value="1905">1905</option>
                    <option value="1904">1904</option>
                    <option value="1903">1903</option>
                    <option value="1902">1902</option>
                    <option value="1901">1901</option>
                    <option value="1900">1900</option>
                </select>
                <span class="help-block">We will not show your date of birth on your profile, unless you&nbsp;<a href="#">tell us to</a></span>
            </div>
        </div><!-- /control-group -->

    </fieldset>
    <fieldset>
        <legend>Change Password</legend>
        <div class="control-group">
            <label class="control-label"  for="old-password">Old password</label>
            <div class="controls input">
                <input class="input-xlarge" id="old-password" name="old-password" size="30" type="password" />
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
    </fieldset>
    <fieldset>
        <legend>Location settings</legend>
        <div class="control-group">
            <label class="control-label"  for="timezone">Time Zone</label>
            <div class="controls input">
                <select name="timezone" id="timezone" class="input-xxxlarge span5 drop">
                    <option value="-12.0">(GMT -12:00) Eniwetok, Kwajalein</option><option value="-11.0">(GMT -11:00) Midway Island, Samoa</option><option value="-10.0">(GMT -10:00) Hawaii</option><option value="-9.0">(GMT -9:00) Alaska</option><option value="-8.0">(GMT -8:00) Pacific Time (US&amp;Canada)</option><option value="-7.0">(GMT -7:00) Mountain Time (US&amp;Canada)</option><option value="-6.0">(GMT -6:00) Central Time (US&amp;Canada), Mexico City</option><option value="-5.0">(GMT -5:00) Eastern Time (US&amp;Canada), Bogota, Lima</option><option value="-4.0">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option><option value="-3.5">(GMT -3:30) Newfoundland</option><option value="-3.0">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option><option value="-2.0">(GMT -2:00) Mid-Atlantic</option><option value="-1.0">(GMT -1:00 hour) Azores, Cape Verde Islands</option><option value="0.0" selected="selected">(GMT) Western Europe Time, London, Lisbon, Casablanca</option><option value="1.0">(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</option><option value="2.0">(GMT +2:00) Kaliningrad, South Africa</option><option value="3.0">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option><option value="3.5">(GMT +3:30) Tehran</option><option value="4.0">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option><option value="4.5">(GMT +4:30) Kabul</option><option value="5.0">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option><option value="5.5">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option><option value="5.75">(GMT +5:45) Kathmandu</option><option value="6.0">(GMT +6:00) Almaty, Dhaka, Colombo</option><option value="7.0">(GMT +7:00) Bangkok, Hanoi, Jakarta</option><option value="8.0">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option><option value="9.0">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option><option value="9.5">(GMT +9:30) Adelaide, Darwin</option><option value="10.0">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option><option value="11.0">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option><option value="12.0">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                </select>
            </div>
        </div><!-- /control-group -->
        <div class="control-group">
            <label class="control-label"  for="location">Location</label>
            <div class="controls input">
                <div class="input-prepend">
                    <input class="input-xlarge" id="location" name="location" size="100" type="text" />
                </div>
                <span class="help-block">The place where you spend most of your time</span>
            </div>
        </div><!-- /control-group -->
    </fieldset>
    <fieldset>
        <legend>API Settings</legend>
        <div class="control-group">
            <label class="control-label" >Current Session Id</label>
            <div class="controls input">
                <span class="uneditable-input input-xlarge">8ec8b1b1b87a8404ea1b75f5eaf4b077</span>
                <span class="help-block">This session will expire in 5 minutes if no activity is detected</span>
            </div>
        </div><!-- /control-group -->
        <div class="control-group">
            <label class="control-label" >API Secret Key</label>
            <div class="controls input">
                <div class="input-append">
                    <span class="uneditable-input input-xlarge">97j2j2g435jp5j1gj42983gg2GJ24j</span>
                    <a href="http://reset-api-key" class="add-on" title="Reset API Key"><i class="icon-refresh"></i>&nbsp;</a>
                </div>
                <span class="help-block">A valuable possession. Keep it safe. Click the refresh button to regenerate if ever you feel unsafe</span>
            </div>
        </div><!-- /control-group -->
        <div class="control-group">
            <label class="control-label">User ID</label>
            <div class="controls input">
                <input class="input-xlarge disabled" name="user_id" size="30" type="text" disabled="" value="3897887" />
            </div>
        </div><!-- /control-group -->
        <div class="form-actions">
            <input type="submit" class="btn primary" value="Save changes" />&#160;<button type="reset" class="btn">Cancel</button>
        </div>
    </fieldset>



</form>
</tpl:layout>