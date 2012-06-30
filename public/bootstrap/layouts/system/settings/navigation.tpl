<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <ul class="nav nav-tabs admin-main-tabs" id="navigationPreferences">
        <li class="active"><a data-target="#general" data-toggle="tab">Admin Menu</a></li>
        <li><a data-target="#server" data-toggle="tab">Main Menu</a></li>
        <li><a data-target="#localization" data-toggle="tab">Profile Menu</a></li>
        <li><a data-target="#information" data-toggle="tab">Dashboard Menu</a></li>
        <li><a data-target="#information" data-toggle="tab">Settings Menu</a></li>
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