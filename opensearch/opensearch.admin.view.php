<?php
/**
 * The admin view class of the opensearch module
 *
 * @author ned3y2k (ned3y2k@tistory.com)
 * @license LGPL v2
 */
class opensearchAdminView extends opensearch {
	/**
	 * Initialization
	 *
	 * @return void
	 */
	function init() {
		$path = $this->module_path.'tpl/';
		$this->setTemplatePath($path);
	}


	function dispOpensearchAdminSetting() {
		$this->setTemplateFile('admin.index');
	}
}