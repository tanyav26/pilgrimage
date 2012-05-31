<form class="wrap">
    <fieldset >
        <h3><?php echo _('System Appearance settings'); ?></h3>

        <p>The details requested here are important in governing how the platform works. Read through and complete each accordingly</p>

        <hr class="hr-ccc" />

        <div class="grid">
            <div class="row wrap">
                <div class="col third" align="left">
                    <a class="button" title="<?php echo _('Add new themes'); ?>" href="/system/admin/extensions/add" style="width:80px">Add Themes</a>
                </div>
                <div class="col third" align="center">&nbsp;</div>
                <div class="col third" align="right">
                    <button style="margin-right:-3px">List</button>
                    <button style="margin-left:-3px" class="active">Grid</button>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <label> <?php echo _('Background Image'); ?>
            <span class="small"> &HorizontalLine; <a href="#"><?php echo _('Upload from URL instead?');?></a></span>
        </label>
    <input type="file" name="backgroun-image" value="" id="title" style="width: 100%" />
    </fieldset>
</form>