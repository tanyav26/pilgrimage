<div class="page-header">
    <h1><?php echo _('Database Connection') ; ?></h1><br />
    <small><?php echo _('Please enter your database connection details below.' ) ; ?></small>
</div>

<div class="control-group">
    <label class="control-label"><?php echo _('Database Name') ; ?></label>
    <div class="controls input">
        <input type="text" name="name" id="name" class="input-xxlarge" placeholder="e.g localhost" />
        <span class="help-block">The name of the database you want to run Pilgrimage from</span>
    </div>
</div>

<div class="control-group">
    <label class="control-label"><?php echo _('Database Server Username') ; ?></label>
    <div class="controls input">
        <input type="text" name="name" id="name" class="input-xxlarge" placeholder="e.g localhost" />
        <span class="help-block">The Username used to access this database</span>
    </div>
</div>

<div class="control-group">
    <label class="control-label"><?php echo _('Database Server User Password') ; ?></label>
    <div class="controls input">
        <input type="text" name="name" id="name" class="input-xxlarge" placeholder="e.g localhost" />
        <span class="help-block">The Password with which you use to access this database.</span>
    </div>
</div>


<div class="control-group">
    <label class="control-label"><?php echo _('Database Host') ; ?></label>
    <div class="controls input">
        <input type="text" name="name" id="name" class="input-xxlarge" value="localhost" />
        <span class="help-block">The path to the server. It will most likely be localhost</span>
    </div>
</div>

<div class="control-group">
    <label class="control-label"><?php echo _('Database RDBMS Driver') ; ?></label>
    <div class="controls input">
        <select name="language" id="password" style="width:30%">
            <option value="MySQLi"><?php echo _('MySQLi') ; ?></option>
            <option value="MySQL"><?php echo _('MySQL') ; ?></option>
            <option value="SQLite3"><?php echo _('SQLite3') ; ?></option>
        </select>
    </div>
</div>