<?php $step = (int) $this->get("step"); ?>

<div class="wizard">
    <div class="points row-fluid">
        <div class="span3 <?php echo ($step > 0) ? 'active' : ''; ?>"> <a href="<?php echo $this->link('/setup/install/step1') ?>">License Agreement</a><span class="marker">&nbsp;</span></div>
        <div class="span3 <?php echo ($step > 1) ? 'active' : ''; ?>"><a href="<?php echo $this->link('/setup/install/step2') ?>">Requirements</a><span class="marker"></span></div>
        <div class="span3 <?php echo ($step > 2) ? 'active' : ''; ?>"><a href="<?php echo $this->link('/setup/install/step3') ?>">Configuration</a><span class="marker"></span></div>
        <div class="span3 <?php echo ($step > 3) ? 'active' : ''; ?>"><a href="<?php echo $this->link('/setup/install/step4') ?>">Finish</a><span class="marker"></span></div>
    </div>
    <div class="progress mini-bar">
        <div class="bar" style="width: <?php echo intval(12.5*((2*$step)-1)).'%' ?>"></div>
    </div>
</div>

<form id="form" name="form" method="post" action="<?php echo $this->link('/setup/install/step'.((int) $this->get('step') + 1) ) ?>">
    <fieldset class="no-margin">

        <?php switch ($step): case 2 : ?>

        <?php echo $this->layout("requirements"); ?>

        <?php break;
        case 3: ?>

        <p><strong><?php echo _('It is important that you check all meet the bare minimum, required by the platform before proceeding.</strong> You will also, need to have the following information at hand to successfully install this platform. This information, most likely was supplied to you by your web host. If you still can\'t track them down, please contact them for help before proceeding.' ) ; ?></p>
        <label<?php echo _('>Database Host') ; ?>
            <span class="small"><?php echo _('Your DB server') ; ?></span>
        </label>
        <input type="text" name="name" id="name" style="width:50%" placeholder="e.g localhost" />

        <label><?php echo _('Database UserName') ; ?>
            <span class="small"><?php echo _('Your DB server username') ; ?></span>
        </label>
        <input type="text" name="email" id="email" style="width:50%" />

        <label><?php echo _('Database Password') ; ?>
            <span class="small"><?php echo _('Your DB server password') ; ?></span>
        </label>
        <input type="text" name="password" id="password" style="width:50%" />

        <label><?php echo _('Database Name') ; ?>
            <span class="small"><?php echo _('The name of your database') ; ?></span>
        </label>
        <input type="text" name="email" id="email" style="width:50%" />

        <label><?php echo _('Database Driver') ; ?>
            <span class="small"><?php echo _('default is MySQLi') ; ?></span>
        </label>
        <select name="language" id="password" style="width:30%">
            <option value="MySQLi"><?php echo _('MySQLi') ; ?></option>
            <option value="MySQL"><?php echo _('MySQL') ; ?></option>
            <option value="SQLite3"><?php echo _('SQLite3') ; ?></option>
        </select>

        <div class="clear"></div>        


        <div class="legend" style="margin-top: 30px"><?php echo _('Additional Information') ; ?> 
            <p><?php echo _('The details requested here are important in governing how the platform works. Read through and complete each accordingly') ; ?></p>
        </div>

        <label><?php echo _('Website Name') ; ?>
            <span class="small"><?php echo _('A compelling name for your website') ; ?></span>
        </label>
        <input type="text" name="name" id="name" style="width:50%" placeholder="<?php echo _('e.g Social Words') ; ?>" />

        <label><?php echo _('Platform Manager\'s Name') ; ?>
            <span class="small"><?php echo _('That\'s your name') ; ?></span>
        </label>
        <input type="text" name="email" id="email" style="width:50%" />

        <label><?php echo _('Platform Manager\'s User Name id') ; ?>
            <span class="small"><?php echo _('One word, Alpha numeric, no spaces allowed') ; ?></span>
        </label>
        <input type="text" name="email" id="email" style="width:30%" placeholder="e.g JohnDoe" />
        <label><?php echo _('Platform Manager\'s Password') ; ?>
            <span class="small"><?php echo _('We will create a default user account for you') ; ?></span>
        </label>
        <input type="password" name="password" id="password" style="width:50%" />
        <label><?php echo _('Confirm Password') ; ?>
            <span class="small"><?php echo _('We will create a default user account for you') ; ?></span>
        </label>
        <input type="password" name="password2" id="password2" style="width:50%" />

        <label><?php echo _('Platform Manager\'s Email') ; ?>
            <span class="small"><?php echo _('Important details are sent to this address') ; ?></span>
        </label>
        <input type="text" name="email" id="email" style="width:50%" />

        <label><?php echo _('Default Language') ; ?>
            <span class="small"><?php echo _('default is English - United Kingdom') ; ?></span>
        </label>
        <select name="language" id="language" style="width:30%">
            <option value="en_GB"><?php echo _('English - United Kingdom') ; ?></option>
            <option value="fr_FR"><?php echo _('French - France') ; ?></option>
            <option value="es_ES"><?php echo _('Spanish - Spain') ; ?></option>
        </select>

        <?php break;
        case 4 : ?>

        <p>
            Display the Admin Password and API Token
            Post install checks May Include Updates
            Hook 3rd Party App installation procedures

        </p>

       
        <?php break;
        case 1 : ?>

        <?php echo nl2br($this->layout("license")); ?>

        <span style="display: block"><input type="radio" name="eula_accept" value="1"  /> <?php echo _(' I <strong>ACCEPT</strong> the terms and conditions'); ?></span>
        <span style="display: block"><input type="radio" name="eula_accept" /> <?php echo _(' I <strong>DO NOT accept</strong> the terms and conditions'); ?> </span>

        <p>&nbsp;</p> 

        <?php break;
        default : ?>

        <p><?php echo $step; ?></p>

        <?php break;
        endswitch; ?>


        <div class="form-actions">
            <div class="clearfix">
                <?php if($step>1) : ?>
                <a href="<?php echo $this->link('/setup/install/step'.((int) $this->get('step') - 1) ) ?>" class="btn pull-left" type="button" rel="goback"><?php echo _('Previous Step'); ?></a>
                <?php endif; ?>
                <button type="submit" class="btn pull-right"><?php echo ($step === 1) ? "I agree to these Terms" : "Next Step" ?></button>
            </div>
        </div>


    </fieldset>
</form>
