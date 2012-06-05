<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
    <div id="contenttable">
        <form class="wrap">
            <fieldset >
                <h3><?php echo _('Installed Extension List') ; ?></h3>
                <p><?php echo _('The following are extensions, installed on your system. Click on an extension title to for further configuration information'); ?></p>
                <div class="grid">
                    <div class="row wrap">
                        <div class="col third" align="left">
                            <a class="button" title="Add new " href="/system/admin/extensions/add" style="width:60px">Add New</a>
                        </div>
                        <div class="col third" align="left">
                            <select style="width:100%">
                                <option><?php echo _('Filter by...'); ?></option>
                                <option><?php echo _('Published Status'); ?></option>
                                <option><?php echo _('Date Installed'); ?></option>
                                <option><?php echo _('Extension Name'); ?></option>
                            </select>
                        </div>
                        <div class="col third" align="right">
                            <button style="margin-right:-3px">List</button>
                            <button style="margin-left:-3px" class="active">Grid</button>
                        </div>

                    </div>
                    <div class="row wrap"></div>
                </div>

                <hr class="hr-ccc" />

                <div class="grid">
                    <table id="post_table" width="100%">
                        <!-- Colgroup -->  
                        <colgroup>  
                            <col class="col-odd" />  
                            <col class="col-even" />  
                            <col class="col-odd" />  
                            <col class="col-even" />  
                        </colgroup> 
                        <thead>
                            <tr>
                                <th scope="col" id="post_selector"><input type="checkbox" /></th>
                                <th scope="col" id="post_title">Title</th>
                                <th scope="col" id="post_author">Author</th>
                                <th scope="col" id="post_category">Category</th>
                                <th scope="col" id="post_tags">Tags</th>
                                <th scope="col" id="post_comments">Comments</th>
                                <th scope="col" id="post_date">Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" /></td>
                                <td>Post Title and a summary</td>
                                <td>Author</td>
                                <td>Category</td>
                                <td>Tags</td>
                                <td>Comments</td>
                                <td>Date</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </fieldset>
        </form>
    </div>
</tpl:layout>
