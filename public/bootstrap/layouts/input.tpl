<tpl:layout name="input" xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">

    <form action="/system/activity/create" method="POST">
        <tpl:condition  data="user.isauthenticated" test="boolean" value="1" >
            <fieldset class="timeline-item-publisher no-margin">
                <div class="row-fluid">
                    <textarea class="input-xxxlarge focused" rows="3" name="post_content" placeholder="Where are you now and what are you doing?"></textarea>
                </div>
                <div class="timeline-item-publisher-actions">
                    <div class="btn-toolbar  no-margin">
                        <div class="btn-group">
                            <button class="btn"><i class="icon icon-map-marker"></i> Check-in</button>
                        </div>
                        <div class="btn-group">
                            <button type="submit" class="btn">Upload</button>
                        </div>
                        <div class="btn-group pull-right">
                            <button type="submit" class="btn btn-success" href="#">Publish</button>    
                        </div>
                    </div>
                </div>
            </fieldset>
        </tpl:condition>
        <tpl:condition  data="user.isauthenticated" test="boolean" value="0" >
            <div class="alert alert-warning">
                <a href="/member/session/start">Login now</a> to share a story from your current location, or upload photos 
            </div>
        </tpl:condition>
    </form>
</tpl:layout>