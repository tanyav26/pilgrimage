<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
<div class="btn-toolbar no-top-margin">
    <div class="btn-group">
        <button class="btn">Add New ...</button>
        <button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
        </ul>
    </div>
    <div class="btn-group">
        <a class="btn" href="/member/settings/account"><i class="icon icon-cog"></i>&nbsp;Edit Information</a>
    </div>
</div>


<!-- System Wide Menu -->
<div style="margin-top:15px">
    <tpl:menu id="settingsmenu" type="nav-block" />
</div>

</tpl:layout>
