<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <ul class="nav nav-tabs admin-main-tabs" id="navigationPreferences">
        
        <?php $menus = $this->get('menus'); foreach($menus as $group ) : ?>
            <?php if($group['menu_group_iscore'] > 0 ): ?>
                <li><a data-target="#<?php echo $group['menu_group_uid']; ?>" data-toggle="tab"><?php echo $group['menu_group_title']; ?></a></li>
            <?php endif; ?>
        <?php endforeach; ?>
        
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon icon-plus"></i></a>
            <ul class="dropdown-menu">
                <li><a data-target="#dropdown1" data-toggle="tab">Custom Menu 1</a></li>
                <li><a data-target="#dropdown2" data-toggle="tab">Custom Menu 2</a></li>
                <li class="divider"></li>
                <li><a href="/system/admin/settings/appearance#navigation" >Create New Menu ...</a></li>
            </ul>
        </li>
    </ul>
</tpl:layout>