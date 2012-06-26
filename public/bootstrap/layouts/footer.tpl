<tpl:layout name="footer" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <section role="footer">
        <tpl:block data="page.block.footer">Footer</tpl:block>
        <div class="row-fluid">
            <div class="span8">
                <ul class="nav nav-pills">
                    <li><a href="/system/admin/index">Administrator</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/apps">Apps</a></li>
                    <li><a href="http://blog.stonyhillshq.com">Blog</a></li>
                    <li><a href="http://developers.stonyhillshq.com">Developers</a></li>
                    <li><a href="/help">Help</a></li>
                    <li><a href="/legal/privacy">Privacy</a></li>
                    <li><a href="/legal/terms">Terms</a></li>
                </ul>
            </div>
            <div class="span4">
                <ul class="nav nav-pills pull-right">
                    <li><a href="#">&copy; Stonyhills HQ 2012.</a></li>
                </ul>
            </div>
        </div>
        <tpl:import layout="console" />
    </section>
</tpl:layout>