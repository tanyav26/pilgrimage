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
                <?php $menus = $this->get('menus'); foreach($menus as $group ) : ?>
                <?php if($group['menu_group_iscore'] < 1 ): ?>
                <li><a data-target="#<?php echo $group['menu_group_uid']; ?>" data-toggle="tab"><?php echo $group['menu_group_title']; ?></a></li>
                <?php endif; ?>
                <?php endforeach; ?>
                <li class="divider"></li>
                <li><a href="/system/admin/settings/appearance#navigation" >Create New Menu ...</a></li>
            </ul>
        </li>
        <li><a href="#" data-toggle="tab"><i class="icon icon-edit"></i></a></li>
    </ul>
    <div class="tab-content">
        <?php $menus = $this->get('menus'); foreach($menus as $group ) : ?>
        <div class="tab-pane" id="<?php echo $group['menu_group_uid']; ?>">
             <ul class="admin-menu-lists">
                 <?php foreach( $group['nodes'] as $menu ): ?>
                 <li>
                     <div class="row-fluid">
                         <div class="span1"><input type="checkbox" /></div>
                         <div class="span8"><span><?php echo htmlentities($menu['menu_title']); ?></span></div>
                         <div class="span2"><a href="#">Permissions</a></div>
                         <div class="span1"><a href="#">Edit</a></div>
                     </div>
                 </li>
                <?php if(sizeof($menu['children'])>0): ?>
                <ul>
                   <?php foreach( $menu['children'] as $_menu ): ?>
                  <li>
                      <div class="row-fluid">
                          <div class="span1"><input type="checkbox" /></div>
                          <div class="span8"><?php echo htmlentities($_menu['menu_title']); ?></div>
                          <div class="span2"><a href="#">Permissions</a></div>
                          <div class="span1"><a href="#">Edit</a></div>
                      </div>
                   </li>
                   <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                 
                <?php endforeach; ?>
             </ul>
        </div>
        <?php endforeach; ?>
    </div>
    <script type="text/javascript">
        $(function(){
            //alert('woot');
            $("#navigationPreferences a:first").tab('show');
        });
    </script>
</tpl:layout>