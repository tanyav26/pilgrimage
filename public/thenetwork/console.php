<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * console.php
 *
 * Requires PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */
?>
<div id="console"  style="clear:both; position:fixed; bottom: 0; left:0; right:0; white-space: wrap">
    <div class="console-head clearfix">
        <strong><?php echo sprintf( _('%s messages in console Log') , $this->get("debugcount") ) ?></strong>
        <button class="active" id="toggleconsole"><?php echo _('Toggle console') ?></button>
    </div>
    <div class="console-box">
        <div class="console-info"><?php echo sprintf(_('%s Database queries, +2 others for updating sessions'), $this->get("debugqueries") ) ?> | <?php echo sprintf(_('%s of memory used'), $this->get("debugmemory")) ?> | <?php echo sprintf(_('Process time: %s ms'), $this->get("debugtime")) ?> | Debug mode: <?php echo $this->get('debugmode'); ?> </div>
        <div class="console-body" style="overflow-y: auto; max-height:300px; padding:10px; background: #fff">
            <?php $this->position("do:console"); ?>
        </div>
    </div>
</div>

<style type="text/css">
    body{position:relative; padding-bottom: 50px}
    .log-code{ background: #528CE0; color: #fff; padding: 2px; margin: 0px 5px 0 0; display: block; float: left; }
    /*.e4{background:#dc2509}*/
    .e256,.e1,.e4,.e64,.e9031,.e9032,.e9033,.e16{background-color:#FF010E}
    .success{background-color:#00804D}
    .e512,.e128,.e32,.e2{background-color:#FFA53A}
    .e8,.e1024{background-color:#0080A1}
    /*.e8{background-color:#708090}*/
    pre{display: inline-block; padding: 0; margin: 0 4px; max-width: 90%; word-wrap:break-word}
    .console-log{ padding: 2px 0; border-bottom: 1px solid #ddd; min-height: 25px }
    .console-log:after { clear: both; zoom:1 }
    .console-info{ background: #FFF6BF no-repeat 0 0 scroll; color: #514721; padding: 4px 10px; font-weight: bold}
    .console-head{position:relative;border-top:1px solid #999; border-bottom: 1px solid #CCC;background: none repeat scroll 0 0 #EEE;padding: 5px 10px;line-height: 30px;background: -webkit-gradient(linear,0% 0%,0% 100%,from(#F4F4F4),to(#EEE));background: -moz-linear-gradient(top,#F4F4F4,#EEE);filter: progid:DXImageTransform.Microsoft.Gradient(StartColorStr='#f4f4f4',EndColorStr='#eee',GradientType=0);margin: 0 !important;}
    .console-head h3{margin: 0; float: left; font-size: 15px}
    .console-head button{float:right}
    .tab-button {font-size: 13px;padding: 3px 20px; height: 24px;margin: 0 5px 0 0;}
    .tab-button{color: #060606;background-color: transparent;border: 1px solid #A5A5A5;background-color: #EDEDED;background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(252, 252, 252)), to(rgb(223, 223, 223)));-webkit-border-radius: 12px; -webkit-appearance: none;}
</style>

<script type="text/javascript">
    $(function(){
        $("#toggleconsole").click(function(e){
            e.preventDefault();
            var self = $(this);
            $(".console-box").toggle();
        })
    })(jQuery)
</script>