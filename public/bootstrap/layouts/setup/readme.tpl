<tpl:layout xmlns="http://www.w3.org/1999/xhtml" xmlns:tpl="http://tuiyo.co.uk/tpl">
<div class="page-header">
    <h1>Installation Complete!</h1><br />
    <small>Congratulations on completing the installation and first time configuration for your web app. We hope you enjoy using your new site. Before you start exploring, here are a few details you need to make a note of. If possible print them out and keep them safe (Don't let any ONE see them but you). You will probably need them at some point: if things don't work as they should</small>
</div>
    <p><a href="/system/admin/settings/configuration" class="pull-left">Visit the Configurations Panel</a><a href="javascript:window.print()" class="pull-right">Print this page</a></p>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td class="span4">Admin Full Name</td>
                <td>Livingstone Fultang</td>
            </tr>
            <tr>
                <td>Admin User Name ID</td>
                <td>livingstone.fultang</td>
            </tr>
            <tr>
                <td>Admin E-mail address</td>
                <td>livingstonefultang@gmail.com</td>
            </tr>
            <tr>
                <td>Admin Password</td>
                <td>The one you set at installation. <a href="#">Have you forgotten it?</a></td>
            </tr>


            <tr>
                <td>System Path</td>
                <td><?php echo \Library\Config::getParam("path", "/"); ?></td>
            </tr>
            <tr>
                <td>System Domain</td>
                <td><?php echo \Library\Config::getParam("host", null); ?></td>
            </tr>
                        <tr>
                <td class="span4">System Design</td>
                <td><?php echo \Library\Config::getParam("template",null ); ?></td>
            </tr>

            <tr>
                <td class="span4">Session Cookie Name</td>
                <td><?php echo \Library\Config::getParam("cookie", null, "session"); ?></td>
            </tr>
            <tr>
                <td>Sesssion Handler</td>
                <td><?php echo \Library\Config::getParam("store", null, "session"); ?></td>
            </tr>

            <tr>
                <td class="span4">Encryption Key</td>
                <td><?php echo \Library\Config::getParam("key",null, "encrypt"); ?></td>
            </tr>
            <tr>
                <td>Environment mode</td>
                <td><?php echo \Library\Config::getParam("path", "/"); ?></td>
            </tr>
            <tr>
                <td>Access control mode</td>
                <td><?php echo \Library\Config::getParam("store", null, "session"); ?></td>
            </tr>
  
            <tr>
                <td class="span4">Database Host</td>
                <td><?php echo \Library\Config::getParam("host",null, "database"); ?></td>
            </tr>
            <tr>
                <td>Database User</td>
                <td><?php echo \Library\Config::getParam("user", null, "database"); ?></td>
            </tr>
            <tr>
                <td>Database Name</td>
                <td><?php echo \Library\Config::getParam("name", null, "database"); ?></td>
            </tr>
            <tr>
                <td>Database Prefix</td>
                <td><?php echo \Library\Config::getParam("prefix", null, "database"); ?></td>
            </tr>
        </tbody>
    </table>

    <div class="action top-pad">
        <a href="/" class="btn btn-success btn-large">Start Exploring</a> or <a href="#">Check for updates</a>
    </div>

</tpl:layout>