<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
<div class="btn-toolbar no-top-margin">

    <div class="btn-group">
        <a class="btn" href="/member/settings/account"><i class="icon icon-edit"></i>&nbsp;Compose new...</a>
    </div>    
    <div class="btn-group">
        <button class="btn">Live Chat ...</button>
        <button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
        </ul>
    </div>
</div>


<div style="margin-top:15px">
    <tpl:menu id="messagesmenu" type="nav-block" />
</div>


<div class="widget top-pad">
    <h4>Live chat with followers</h4> 
    <div class="widget-body top-pad">

        <ul class="thumbnails">
            <?php for ($i = 0; $i < 15; $i++): ?>
            <li>
                <a href="#">
                    <img class="thumbnail" src="http://placehold.it/32x32" alt="" width="32" height="32" />
                </a>
            </li>
            <?php endfor; ?>
        </ul>
    </div>

</div>

<hr />

</tpl:layout>
