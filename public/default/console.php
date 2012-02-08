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
<div id="console" class="modal"  style="white-space: wrap; display: none;">
	<div class="modal-header">
		<a href="#" class="close">×</a>
		<h3><?php echo ("Debug Console"); ?></h3>
	</div>
	<div class="modal-body">
		<div class="console-box">
			<div class="console-body" style="overflow-y: auto; max-height:300px; padding:10px; background: #fff">
				<?php $this->position("do:console"); ?>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<div class="console-info"><?php echo sprintf(_('%s Database queries, +2 others for updating sessions'), $this->get("debugqueries") ) ?> | <?php echo sprintf(_('%s of memory used'), $this->get("debugmemory")) ?> | <?php echo sprintf(_('Process time: %s ms'), $this->get("debugtime")) ?> | Debug mode: <?php echo $this->get('debugmode'); ?>
		</div>
	</div>
</div>
