<?php

class Occitech_OnePageConfiguration_Model_Region extends Mage_Core_Model_Config_Data {
	public function save() {
		$resource = Mage::getModel('core/config');
		$stateRequired = Mage::getStoreConfig('general/region/state_required');
		$resource->saveConfig('general/region/state_required', 'DE,AT,CA,ES,EE,FI,LV,LT,RO,CH,US');
		$resource->saveConfig('general/region/display_all', 0); // prevent displaying regions if they are not required
		return parent::save();
	}
}