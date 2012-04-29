<?php $alerts = $this->get("alerts");
foreach ($alerts as $alert) : ?>
<div class="alert alert-<?php echo $alert['alertType'] ?>">
    <a class="close" data-dismiss="alert" href="#">×</a>
    <?php if (!empty($alert['alertTitle'])) : ?><strong><?php echo $alert['alertTitle'] ?></strong> <?php endif; ?><?php echo $alert['alertBody'] ?>
</div>
<?php endforeach; ?>
