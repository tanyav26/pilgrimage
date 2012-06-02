<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
<div class="page-header">
    <h1>Notification settings</h1>
</div>

<form>
    <fieldset>

        <div class="grid" style="margin-bottom: 25px">
            <div class="row" style="border-bottom: 1px dashed #ddd; padding-top: 6px">
                <div class="col" style="width: 80%;"><strong>Mentions me in a posts</strong></div>
                <div class="col dashboard" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Notify on dashboard'); ?>" name="dashboard_n[wall_post]" /></div>
                <div class="col email" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Send e-Mail'); ?>" name="email_n[wall_post]" /></div>
                
            </div>
            <div class="row" style="border-bottom: 1px dashed #ddd; padding-top: 6px">
                <div class="col" style="width: 80%;">Shares a post on my wall</div>
                <div class="col dashboard" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Notify on dashboard'); ?>" name="dashboard_n[wall_post_direct]" /></div>
                <div class="col email" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Send e-Mail'); ?>" name="email_n[wall_post_direct]" /></div>
                
            </div>
            <div class="row" style="border-bottom: 1px dashed #ddd; padding-top: 6px">
                <div class="col" style="width: 80%;">Tags or Mentions me in a post</div>
                <div class="col dashboard" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Notify on dashboard'); ?>" name="dashboard_n[wall_post_tag]" /></div>
                <div class="col email" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Send e-Mail'); ?>" name="email_n[wall_post_tag]" /></div>
                
            </div>
        </div>


        <div class="grid" style="margin-bottom: 25px">
            <div class="row" style="border-bottom: 1px dashed #ddd; padding-top: 6px">
                <div class="col" style="width: 80%;"><strong>Photos of me</strong></div>
                <div class="col dashboard" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Notify on dashboard'); ?>" name="dashboard_n[photos]" /></div>
                <div class="col email" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Send e-Mail'); ?>" name="email_n[photos]" /></div>
                
            </div>
            <div class="row" style="border-bottom: 1px dashed #ddd; padding-top: 6px">
                <div class="col" style="width: 80%;"><?php echo _("Tags me in a photo"); ?></div>
                <div class="col dashboard" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Notify on dashboard'); ?>" name="dashboard_n[photo_tag]" /></div>
                <div class="col email" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Send e-Mail'); ?>" name="email_n[photos_tag]" /></div>
                
            </div>
            <div class="row" style="border-bottom: 1px dashed #ddd; padding-top: 6px">
                <div class="col" style="width: 80%;"><?php echo _("Comments on a photo of me"); ?></div>
                <div class="col dashboard" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Notify on dashboard'); ?>" name="dashboard_n[photo_comment]" /></div>
                <div class="col email" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Send e-Mail'); ?>" name="email_n[photo_comment]" /></div>
                
            </div>
        </div>

        <div class="grid" style="margin-bottom: 25px">
            <div class="row" style="border-bottom: 1px dashed #ddd; padding-top: 6px">
                <div class="col" style="width: 80%;"><strong>Photos of me</strong></div>
                <div class="col dashboard" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Notify on dashboard'); ?>" name="dashboard_n[photos]" /></div>
                <div class="col email" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Send e-Mail'); ?>" name="email_n[photos]" /></div>
                
            </div>
            <div class="row" style="border-bottom: 1px dashed #ddd; padding-top: 6px">
                <div class="col" style="width: 80%;"><?php echo _("Tags me in a photo"); ?></div>
                <div class="col dashboard" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Notify on dashboard'); ?>" name="dashboard_n[photo_tag]" /></div>
                <div class="col email" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Send e-Mail'); ?>" name="email_n[photos_tag]" /></div>
                
            </div>
            <div class="row" style="border-bottom: 1px dashed #ddd; padding-top: 6px">
                <div class="col" style="width: 80%;"><?php echo _("Comments on a photo of me"); ?></div>
                <div class="col dashboard" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Notify on dashboard'); ?>" name="dashboard_n[photo_comment]" /></div>
                <div class="col email" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Send e-Mail'); ?>" name="email_n[photo_comment]" /></div>
                
            </div>
        </div>


        <div class="grid" style="margin-bottom: 25px">
            <div class="row" style="border-bottom: 1px dashed #ddd; padding-top: 6px">
                <div class="col" style="width: 80%;"><strong><?php echo _('Required actions and tasks'); ?></strong></div>
                <div class="col dashboard" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Notify on dashboard'); ?>" name="dashboard_n[comments]" /></div>
                <div class="col email" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Send e-Mail'); ?>"  name="email_n[comments]" /></div>
                
            </div>
            <div class="row" style="border-bottom: 1px dashed #ddd; padding-top: 6px">
                <div class="col" style="width: 80%;"><?php echo _("Comments on an item after me"); ?></div>
                <div class="col dashboard" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Notify on dashboard'); ?>" name="dashboard_n[comments_followup]" /></div>
                <div class="col email" style="width: 10%" align="center"><input type="checkbox"  rel="tooltip" title="<?php echo _('Send e-Mail'); ?>" name="email_n[comments_followup]" /></div>
                
            </div>
            <div class="row" style="border-bottom: 1px dashed #ddd; padding-top: 6px">
                <div class="col" style="width: 80%;"><?php echo _("Rates any of my comments"); ?></div>
                <div class="col dashboard" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Notify on dashboard'); ?>" name="dashboard_n[comments_vote]" /></div>
                <div class="col email" style="width: 10%" align="center"><input type="checkbox" rel="tooltip" title="<?php echo _('Send e-Mail'); ?>" name="email_n[comments_vote]" /></div>
                
            </div>
        </div>

        <button type="submit" style="margin-top: 10px">Save notification settings</button>
    </fieldset>
</form>
</tpl:layout>