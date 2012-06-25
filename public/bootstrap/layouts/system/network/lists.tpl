<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <ul class="nav nav-tabs admin-main-tabs" id="systemPreferences">
        <li class="active"><a data-target="#lists" data-toggle="tab">All Members</a></li>
        <li><a data-target="#types" data-toggle="tab">Member Types</a></li>
        <li><a data-target="#attributes" data-toggle="tab">Attributes</a></li>
        <li><a data-target="#connectionrules" data-toggle="tab">Relationships</a></li>
        <li><a data-target="#definitions" data-toggle="tab">Definitions</a></li>
    </ul>

    <form class="form-horizontal">
        <fieldset class="no-margin">
            <div class="content-list">
                <div class="row-fluid">
                    <div class="span5">
                        <div class="btn-group">
                            <button class="btn">Bulk Actions</button>
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
                    <div class="span7">
                        <div class="pagination no-margin pull-right">
                            <ul>
                                <li class="active"><a href="#"><i class="icon  icon-th-list"></i> List</a></li>
                                <li><a href="#"><i class="icon  icon-th"></i> Grid</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <table class="table table-striped">
                    <!-- Colgroup -->  
                    <colgroup>  
                        <col class="col-odd" />  
                        <col class="col-even" />  
                        <col class="col-odd" />  
                        <col class="col-even" />  
                    </colgroup> 
                    <thead>
                        <tr>
                            <th scope="col" ><input type="checkbox" /></th>
                            <th scope="col" class="span1">&nbsp;</th>
                            <th scope="col" class="span6">Full Name</th>
                            <th scope="col" class="span2">User Name</th>
                            <th scope="col" class="span2">Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                    </tfoot>
                    <tbody>
                        <?php for ($i = 0; $i < 30; $i++): ?>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td><img class="profile-avatar" src="https://si0.twimg.com/profile_images/1734672571/logo_normal.png" alt="Livingstone Fultang" width="48" height="48" /></td>
                            <td><a href="#">Livingstone Kimbi Fatele Fultang</a></td>                  
                            <td>Category</td>
                            <td>Tags</td>
                        </tr>
                        <?php endfor ; ?>
                    </tbody>
                </table>
            </div>
            <div class="row-fluid">
                <div class="span3">
                    <div class="btn-group pull-left">
                        <button class="btn">Bulk Actions</button>
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
                <div class="span7">
                    <div class="pagination no-margin" align="center">
                        <ul>
                            <li class="disabled"><a href="#">«</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">7</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
                <div class="span2">
                    <div class="btn-group pull-right">
                        <button class="btn">Length</button>
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
            </div>
        </fieldset>
    </form>
</tpl:layout>
