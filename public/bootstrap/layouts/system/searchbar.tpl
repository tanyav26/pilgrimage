<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
<div id="searcher">
    <form component="searchForm" id="searchForm" action="/search.json" method="GET">
        <input id="searchField" type="text" autocomplete="off" name="find" class="nostyle" placeholder="<?php echo _('Search'); ?>" />
        <button id="submit-form" style="display: none">Search</button>
    </form>
</div>
</tpl:layout>


