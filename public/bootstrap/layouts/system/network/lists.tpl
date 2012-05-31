<div class="sidetabs vertical-tabs">

    <!-- Side Tab Navigation -->
    <nav class="sidetab-switch">
        <ul>
            <li><a class="default-sidetab current" href="#lists">Members</a></li>
            <li><a  href="#types">Types</a></li>

            <li><a  href="#attributes">Attributes</a></li>
            <li><a  href="#connectionrules">Relationships</a></li>
            <li><a  href="#definitions">Definitions</a></li>
        </ul>

    </nav>
    <!-- /Side Tab Navigation -->

    <div class="sidetab  default-sidetab padding-20" id="lists" style="display: block;"> 
        <form class="wrap">
            <fieldset >
                <h3><?php echo _('Network Members'); ?></h3>

                <p><?php echo _('Below is a list of all members of your nework, including - groups, users, pages etc'); ?></p>

                <!--            <hr class="hr-ccc" />-->

                <div class="grid">
                    <div class="row wrap">
                        <div class="col third" align="left">
                            <a class="button" title="Add new " href="/system/admin/network/add" style="width:60px">Add New</a>
                        </div>
                        <div class="col third" align="left">
                            <select style="width:100%">
                                <option><?php echo _('Filter by...'); ?></option>
                                <option><?php echo _('Member Type'); ?></option>
                                <option><?php echo _('Member Name'); ?></option>
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
                            <col class="col-odd">  
                            <col class="col-even">  
                            <col class="col-odd">  
                            <col class="col-even">  
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
</div>
