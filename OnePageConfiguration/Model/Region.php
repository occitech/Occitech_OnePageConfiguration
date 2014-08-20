<?php

class Occitech_OnePageConfiguration_Model_Region extends Mage_Core_Model_Config_Data {
	public function save() {
		if ($this->isValueChanged()) {
			$resource = Mage::getModel('core/config');
			$stateRequired = Mage::getStoreConfig('general/region/state_required');
			$displayRegion = $this->getValue();
			if ($displayRegion) {
				if (strpos($stateRequired, ',FR') === false) {
					$stateRequired = $stateRequired . ',FR';
				}
			} else {
				$stateRequired = str_replace(',FR', '', $stateRequired);
			}
			$resource->saveConfig('general/region/state_required', $stateRequired);
			$resource->saveConfig('general/region/display_all', 0); // prevent displaying regions if they are not required
		}
		return parent::save();
	}
}