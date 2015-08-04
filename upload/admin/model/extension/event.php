<?php
// *	@copyright	OCSHOP.CMS \ ocshop.net 2011 - 2015.
// *	@demo	http://ocshop.net
// *	@blog	http://ocshop.info
// *	@forum	http://forum.ocshop.info
// *	@source		See SOURCE.txt for source and other copyright.
// *	@license	GNU General Public License version 3; see LICENSE.txt

class ModelExtensionEvent extends Model {
	public function addEvent($code, $trigger, $action) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "event SET `code` = '" . $this->db->escape($code) . "', `trigger` = '" . $this->db->escape($trigger) . "', `action` = '" . $this->db->escape($action) . "'");
	}

	public function deleteEvent($code) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "event WHERE `code` = '" . $this->db->escape($code) . "'");
	}
}