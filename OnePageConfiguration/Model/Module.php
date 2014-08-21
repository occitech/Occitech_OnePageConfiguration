<?php

class Occitech_OnePageConfiguration_Model_Module extends Mage_Core_Model_Config_Data {
	public function save() {
		if ($this->isValueChanged()) {
			$modulesToDisable = explode(' ', $this->getValue());
			$resource = Mage::getModel('core/config');

			foreach ($modulesToDisable as $moduleName) {
				$resource->saveConfig('advanced/modules_disable_output/' . $moduleName, 1);
			}
		}
		return parent::save();
	}
}