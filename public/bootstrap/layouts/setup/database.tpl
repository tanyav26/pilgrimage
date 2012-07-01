<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <div class="page-header">
<!--        <h1><?php echo _('Database Connection') ; ?></h1><br />-->
        <small><?php echo _('Please enter your database connection details below.' ) ; ?></small>
    </div>

    <div class="control-group">
        <label class="control-label"><?php echo _('Database Name') ; ?></label>
        <div class="controls input">
            <input type="text" name="dbname" id="dbname" class="input-xxlarge" placeholder="" />
            <span class="help-block">The name of the existing database. We won't create the database for you</span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><?php echo _('Database Server Username') ; ?></label>
        <div class="controls input">
            <input type="text" name="dbusername" id="dbusername" class="input-xxlarge" placeholder="e.g root" />
            <span class="help-block">The Username used to access this database</span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><?php echo _('Database Server User Password') ; ?></label>
        <div class="controls input">
            <input type="text" name="dbpassword" id="dbpassword" class="input-xxlarge"  />
            <span class="help-block">The Password with which you use to access this database.</span>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label"><?php echo _('Database Host') ; ?></label>
        <div class="controls input">
            <input type="text" name="dbhost" id="dbhost" class="input-xxlarge" value="localhost" />
            <span class="help-block">The path to the server. It will most likely be localhost</span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><?php echo _('DB Table Prefix') ; ?></label>
        <div class="controls input">
            <input type="text" name="dbtableprefix" id="dbtableprefix" class="input-xxlarge" value="dd_" />
            <span class="help-block">This is a security feautre, and if one is not defined it will be automatically be generated</span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><?php echo _('Database RDBMS Driver') ; ?></label>
        <div class="controls input">
            <select id="dbdriver" name="dbdriver" style="width:30%">
                <option value="MySQLi" selected="selected"><?php echo _('MySQLi') ; ?></option>
                <option value="MySQL"><?php echo _('MySQL') ; ?></option>
                <option value="SQLite3" disabled="disabled"><?php echo _('SQLite3') ; ?></option>
                <option value="PostgreSQL" disabled="disabled"><?php echo _('PostgreSQL') ; ?></option>
            </select>
        </div>
    </div>
</tpl:layout>