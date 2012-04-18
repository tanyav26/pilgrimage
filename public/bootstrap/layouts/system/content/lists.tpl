
<form class="form-horizontal">
    <fieldset>
        <div class="row-fluid">
            <div class="span6">
                <div id="example_length" class="dataTables_length">
                    <label><select name="example_length" class="input-small inline-input"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>&nbsp;Records per page</label>
                </div>
            </div>
            <div class="span6">
                <div class="dataTables_filter pull-right" id="example_filter">
                    <label>Search: <input type="text" aria-controls="example" /></label>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="content-list">
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
        <div class="pagination">
            <ul>
                <li class="disabled"><a href="#">« Previous</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">Next »</a></li>
            </ul>
        </div>
    </fieldset>
</form>

