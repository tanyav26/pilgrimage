<tpl:layout name="input" xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">

    <form action="/system/activity/create" method="POST">
        <tpl:condition  data="user.isauthenticated" test="boolean" value="1" >
            <fieldset class="timeline-item-publisher no-margin">
                <div class="row-fluid">
                   
                    <textarea class="input-xxxlarge focused" rows="3" name="post_content" placeholder="Where are you now and what are you doing?"></textarea>
                </div>
                <div class="row-fluid hide">
                    <div class="row-fluid">
                        <div class="input-prepend">
                            <span class="add-on"><i class=" icon-map-marker"></i>&nbsp;</span>
                            <input type="text" name="activity-location" style="width: 95%" />  
                        </div>
                    </div>
                    <!-- The global progress bar -->
                    <div class="btn-toolbar">
                        <span class="btn btn-success fileinput-button">
                            <i class="icon-plus icon-white"></i>
                            <span>Add files...</span>
                            <input type="file" name="files[]" multiple="" style="display: none" />
                        </span>

                        <button type="reset" class="btn btn-warning cancel">
                            <i class="icon-ban-circle icon-white"></i>
                            <span>Cancel</span>
                        </button>

                        <button type="submit" class="btn btn-primary start pull-right">
                            <i class="icon-upload icon-white"></i>
                            <span>Upload</span>
                        </button>

                    </div>
                    <table class="table table-condensed table-striped no-margin">
                        <tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery">
                            <tr class="template-upload fade in">
                                <td class="preview"><span>Le onde.pdf</span></td>
                                <td class="name"><span class="label label-important">Error</span> Filetype not allowed</td>
                                <td class="size"><span>164.12 KB</span></td>
                                <td class="cancel">
                                    <button class="btn btn-warning pull-right">
                                        <i class="icon-ban-circle icon-white"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="template-download fade in" style="height: 53px; ">
                                <td class="preview">
                                    <a href="#" title="Screen Shot 2012-02-21 at 13.23.50.png" rel="gallery" download="Screen Shot 2012-02-21 at 13.23.50.png"><img src="data:image/png;base64,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" /></a>
                                </td>
                                <td class="name">
                                    <a href="#" title="Screen Shot 2012-02-21 at 13.23.50.png" rel="gallery" download="Screen Shot 2012-02-21 at 13.23.50.png">Screen Shot 2012-02-21 at 13.23.50.png</a>
                                </td>
                                <td class="size"><span>20.33 KB</span></td>
                                <td class="delete">
                                    <button class="btn btn-danger pull-right" data-type="DELETE" data-url="http://jquery-file-upload.appspot.com/AMIfv947Ypoyi1BG-CGezF1N_CDuCV5slPKidOB3l5KpMWCs54QxzywIscw9bMD5vJfEAp8SQa-VcfjtP9tpLzO5-7FwzbE7FSAzTzMl7w5_HVoL0FLezKch0Ta91Zk4G5ZAHD8v7wTJFeETZMM12FrQjemWYLu9nkLrRdhf0Efttnnrl4TYYoI/Screen%20Shot%202012-02-21%20at%2013.23.50.png" >
                                        <i class="icon-trash icon-white"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="progress progress-info progress-striped active mini-bar hide">
                        <div class="bar" style="width:90%;"></div>
                    </div>
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