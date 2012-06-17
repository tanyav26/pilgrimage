<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
<form action="/system/admin/index!#summary">
    <fieldset>
        <div class="row-fluid">
            <div class="span12">
                <div>
                    <h4 class="bottom-pad">Welcome your newest members</h4>
                    <ul class="thumbnails">
                        <?php for ($i = 0; $i < 14; $i++): ?>
                        <li>
                            <a href="#" class="thumbnail">
                                <img src="http://placehold.it/64x64" alt=""/>
                            </a>
                        </li>
                        <?php endfor; ?>
                    </ul>
                </div>
                <h4>Welcome your newest members</h4>
                <div class="top-pad">
                    <ul class="thumbnails">
                        <?php for ($i = 0; $i < 14; $i++): ?>
                        <li>
                            <a href="#" class="thumbnail">
                                <img src="http://placehold.it/64x64" alt=""/>
                            </a>
                        </li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
        </div>
    </fieldset>
</form>


<script type="text/javascript" src="<?php echo $this->getTemplatePath() ?>/js/plugins/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo $this->getTemplatePath() ?>/js/administrator.js"></script>
</tpl:layout>