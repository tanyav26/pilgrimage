<h3>Welcome back to Pilgrimage</h3>
<hr class="separator-rule" />
<div class="well">
    <div class="row-fluid">
        <div class="span8">
            <ul class="thumbnails">
                <?php for ($i = 0; $i < 10; $i++): ?>
                    <li>
                        <a href="#" class="thumbnail">
                            <img src="http://placehold.it/40x40" alt="">
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </div>
        <div class="span4">
            <strong>Influence</strong>
            <div class="progress progress-danger">
                <div class="bar"style="width: 43%;">43%</div>
            </div>
            <strong>Engagement</strong>
            <div class="progress progress-success">
                <div class="bar"style="width: 69%;">69%</div>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span6">
        <div class="progress progress-success">
            <div class="bar"style="width: 100%;">100%</div>
        </div>
    </div>
    <div class="span6">
        <div class="progress progress-info">
            <div class="bar"style="width: 60%;">60%</div>
        </div>
    </div>
</div>
<?php
$user = \Platform\User::getInstance();
print_R($user);
?>