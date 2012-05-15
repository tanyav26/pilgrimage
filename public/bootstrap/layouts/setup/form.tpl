<?php $step = (int) $this->get("step"); ?>

<div class="wizard">
    <div class="points row-fluid">
        <div class="span3 <?php echo ($step > 0) ? 'active' : ''; ?>"> <a href="<?php echo $this->link('/setup/install/step1') ?>">License Agreement</a><span class="marker">&nbsp;</span></div>
        <div class="span3 <?php echo ($step > 1) ? 'active' : ''; ?>"><a href="<?php echo $this->link('/setup/install/step2') ?>">Requirements</a><span class="marker"></span></div>
        <div class="span3 <?php echo ($step > 2) ? 'active' : ''; ?>"><a href="<?php echo $this->link('/setup/install/step3') ?>">Configuration</a><span class="marker"></span></div>
        <div class="span3 <?php echo ($step > 3) ? 'active' : ''; ?>"><a href="<?php echo $this->link('/setup/install/step4') ?>">Finish</a><span class="marker"></span></div>
    </div>
    <div class="progress mini-bar">
        <div class="bar" style="width: <?php echo intval(12.5*((2*$step)-1)).'%'; ?>">&nbsp;</div>
    </div>
</div>

<form id="form" name="setup-form" class="form-vertical" method="POST" action="<?php echo $this->link('/setup/install/step'.((int) $this->get('step') + 1) ) ?>">
    <fieldset>

        <?php switch ($step): 

        case 2 :
        echo $this->layout("requirements"); 

        break;
        case 3: 

        echo $this->layout("database"); 

        break;
        case 4 :

        echo $this->layout("user"); 

        break;
        case 1 :  echo nl2br($this->layout("license")); ?>

        <span style="display: block"><input type="radio" name="eula_accept" value="1"  /> <?php echo _(' I <strong>ACCEPT</strong> the terms and conditions'); ?></span>
        <span style="display: block"><input type="radio" name="eula_accept" /> <?php echo _(' I <strong>DO NOT accept</strong> the terms and conditions'); ?> </span>

        <?php break;
        default : ?>

        <p><?php echo $step; ?></p>

        <?php break;
        endswitch; ?>
    </fieldset>
    <div class="form-actions page-end">
        <div class="clearfix">
            <?php if($step>1) : ?>
            <a href="<?php echo $this->link('/setup/install/step'.((int) $this->get('step') - 1) ) ?>" class="btn pull-left" type="button" rel="goback"><?php echo _('Previous Step'); ?></a>
            <?php endif; ?>
            <button type="submit" class="btn pull-right"><?php echo ($step === 1) ? "I agree to these Terms" : "Next Step" ?></button>
        </div>
    </div>

</form>
