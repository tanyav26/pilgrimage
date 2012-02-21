<tpl:layout name="console" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <button data-controls-modal="console" data-backdrop="true" data-keyboard="true" class="button pull-right">Debug console</button>
    <div id="console" class="modal"  style="white-space: wrap; display: none;">
        <div class="modal-header">
            <a href="#" class="close">×</a>
            <h3>Console</h3>
        </div>
        <div class="modal-body">
            Body
        </div>
        <div class="modal-footer">
            <ul>
                <li><tpl:element type="text" formatting="sprintf" data="debug.speed">Request completed in %s ms. </tpl:element></li>
                <li><tpl:element type="text" formatting="sprintf" data="debug.queries"> %s database queries executed. </tpl:element></li>
                <li><tpl:element type="text" formatting="sprintf" data="debug.memory"> Memory usage %s</tpl:element></li>
            </ul>
        </div>
    </div>
</tpl:layout>
