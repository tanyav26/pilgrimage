<div class="grid input-box wrap">
    <div class="row">
        <div class="col whole">
            <div class="modal-box">
                <form>
                    <fieldset>
                        <h3><?php echo _('Add new Photos!'); ?></h3>
                        <hr class="hr-ccc" />
                        <div class="row wrap">
                            <div class="col two-thirds mutableContent wrap">
                                <div id="extras-input">

                                    <label> Select Photo 
                                        <span class="small"> &HorizontalLine; <a href="#">Upload from URL instead?</a></span>
                                    </label>
                                    <input type="file" name="email" value="" id="title" style="width: 100%" />
                                    <div class="caption-input" style="display:block">
                                        <label>Caption
                                            <span class="small">(optional)</span>
                                        </label>
                                        <textarea name="ptext" id="ptext" style="width: 100%;min-height: 92px"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col half  mutableContent"> 
                                            <button class="button medium"><?php echo _("Add Caption"); ?></button>

                                        </div>                        
                                        <div class="col half" align="right">
                                            <button class="button medium"><?php echo _("Add multiple"); ?></button>
                                        </div>

                                    </div>
                                </div>

                                <hr class="hr-ccc" />
                                <div id="text-input">
                                    <div id="title-input">
                                        <label>Album Title
                                            <span class="small">(optional)</span>
                                        </label>
                                        <input type="text" name="title" value="" id="title" style="width: 100%" />
                                    </div>
                                    <label>Description
                                        <span class="small"> &HorizontalLine; <?php echo _('Optional description'); ?></span>
                                    </label>
                                    <textarea name="ptext" id="ptext" style="width: 100%;min-height: 205px"></textarea>
                                </div>

                            </div>
                            <div class="col two-sixths wrap">
                                <div style="padding: 0 0 0 15px">
                                    <label>Tag friends
                                        <span class="small"></span>
                                    </label>
                                    <textarea name="ptext" id="ptext" style="width: 100%;min-height: 205px" placeholder="<?php echo _('Tag your friends, or by topic. Seperate each tag with a comma.'); ?>"></textarea>

                                    <hr class="hr-ccc" />
                                    <div id="section-input">
                                        <label class="required"><?php echo _('Section'); ?>
                                            <span class="small"></span>
                                        </label>
                                        <select style="width: 100%">
                                            <option value="1">My Profile</option>
                                            <option value="1">Stupid Women&trade; (Group)</option>
                                        </select>
                                    </div>
                                    <div id="date-input">
                                        <label class="required"><?php echo _('Publication Date'); ?>
                                            <span class="small"></span>
                                        </label>
                                        <input type="text" name="email" class="datepicker" value="<?php echo date('m/d/Y'); ?>" id="title" style="width: 100%" />
                                    </div>

                                    <label class="required">Privacy</label>
                                    <select style="width: 100%">
                                        <option value="1">Make post public</option>
                                        <option value="1">Make visible to followers only</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="hr-ccc" /> 
                        <div class="row">
                            <div class="col sixth  mutableContent"> 
                                <button class="button medium"><?php echo _("Preview Photo"); ?></button>

                            </div>                        
                            <div class="col four-sixths">&nbsp;</div>
                            <div class="col sixth" align="right">
                                <button class="button medium"><?php echo _("Publish Photo"); ?></button>
                            </div>

                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>