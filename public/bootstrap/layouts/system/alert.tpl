<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <tpl:loop data="alerts">
        <div class="alert alert-${alertType}">
            <strong><tpl:element type="text" data="alertTitle" /></strong> <tpl:element type="text" data="alertBody" />
        </div>
    </tpl:loop>
</tpl:layout>
