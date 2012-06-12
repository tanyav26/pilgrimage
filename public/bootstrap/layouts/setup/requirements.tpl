<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <div class="page-header">
        <h1><?php echo _('System Requirements') ; ?></h1><br />
        <small><?php echo _('Please ensure that your system passes all the test below.; unless of course you know what you are doing</small>') ; ?>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th class="span5"><?php echo _('Server Requirements'); ?></th>
                <th class="span2"><?php echo _('Required'); ?></th>
                <th class="span3"><?php echo _('Current Status'); ?></th>
                <th class="span2"><?php echo _('Test'); ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo _('PHP version'); ?></td>
                <td><?php echo $this->requirements["server"]["PHP"]["minimal"] . $this->requirements["server"]["PHP"]["version"] ?></td>
                <td><?php echo sprintf(_('%s Installed'), PHP_VERSION); ?></td>
                <td 
                    <?php if ($this->checker->checkVersion($this->requirements["server"]["PHP"])) : ?>
                    style="color:green;font-weight: bold"><?php echo _('Passed'); ?>
                    <?php else: ?>
                    style="color:red;font-weight: bold"><?php echo _('Failed'); ?>
                    <?php endif; ?>
            </td>
        </tr>
    </tbody>
</table>


<table class="table">
    <thead>
        <tr>
            <th class="span5"><?php echo _('PHP Module Requirements'); ?></th>
            <th class="span2"><?php echo _('Required'); ?></th>
            <th class="span3"><?php echo _('Current Status'); ?></th>
            <th class="span2"><?php echo _('Test'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->requirements['modules'] as $name => $module): $m = $this->checker->testModule($name, $module); ?>
        <tr> 
            <td><?php echo $m['title'] ?></td>
            <td><?php echo $m['name']; ?></td>
            <td><?php echo $m['current']; ?></td>
            <td
                <?php if ($m['test']) : ?>
                style="color:green;font-weight: bold"><?php echo _('Passed'); ?>
                <?php else: ?>
                style="color:red;font-weight: bold"><?php echo _('Failed'); ?>
                <?php endif; ?>
        </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<table class="table">
    <thead>
        <tr>
            <th class="span5"><?php echo _('PHP Directive Requirements'); ?></th>
            <th class="span2"><?php echo _('Required'); ?></th>
            <th class="span3"><?php echo _('Current Status'); ?></th>
            <th class="span2"><?php echo _('Test'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->requirements['directives'] as $name => $directive): $d = $this->checker->testDirective($name, $directive); ?>
        <tr>
            <td><?php echo $d['title']; ?></td>
            <td><?php echo $d['status']; ?></td>
            <td><?php echo $d['current']; ?></td>
            <td
                <?php if ($d['test']) : ?>
                style="color:green;font-weight: bold"><?php echo _('Passed'); ?>
                <?php else: ?>
                style="color:red;font-weight: bold"><?php echo _('Failed'); ?>
                <?php endif; ?>
            </td>
        </tr>    
        <?php endforeach; ?>
    </tbody>
</table>
</tpl:layout>
