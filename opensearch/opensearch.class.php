<?php
/**
 * Parent class of opensearch module
 *
 * @author ned3y2k (ned3y2k@tistory.com)
 * @license LGPL v2
 */
class opensearch extends ModuleObject {
	function moduleInstall()
	{
		$this->getModuleController()->insertActionForward('opensearch', 'view', 'opensearch_xml');
		$this->getModuleController()->insertTrigger('display', 'opensearch', 'controller', 'triggerBeforeDisplay', 'before');
	}

	function checkUpdate()
	{
		if(!$this->isInstalledActionForward())  return true;
		if(!$this->getModuleModel()->getTrigger('display', 'opensearch', 'controller', 'triggerBeforeDisplay', 'before')) return true;

		return false;
	}

	function moduleUpdate()
	{
		if(!$this->isInstalledActionForward())
			$this->getModuleController()->insertActionForward('opensearch', 'view', 'opensearch_xml');

		if(!$this->getModuleModel()->getTrigger('display', 'opensearch', 'controller', 'triggerBeforeDisplay', 'before'))
			$this->getModuleController()->insertTrigger('display', 'opensearch', 'controller', 'triggerBeforeDisplay', 'before');

		return $this->createObject(0, 'success_updated');
	}

	function recompileCache()
	{
	}


	protected function isInstalledActionForward() {
		if((array)$this->getModuleModel()->getActionForward('opensearch_xml'))
			return true;

		return false;
	}

	/** @return moduleController */
	protected function getModuleController() { return getController('module'); }

	/** @return moduleModel */
	protected function getModuleModel() { return getModel('module'); }

	/** @return Context */
	protected function getContext() { return Context::getInstance(); }

    protected function createObject($error = 0, $message = 'success') {
        if(class_exists("BaseObject")) {
            return new BaseObject($error, $message);
        } else {
            return new Object($error, $message);
        }
    }
}