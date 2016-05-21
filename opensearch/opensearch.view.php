<?php
/**
 * The view class of the opensearch module
 *
 * @author ned3y2k (ned3y2k@tistory.com)
 * @license LGPL v2
 */
class opensearchView extends opensearch {
	/**
	 * Initialization
	 *
	 * @return void
	 */
	function init() {
		$path = $this->module_path.'tpl/';
		$this->setTemplatePath($path);
	}


	function opensearch_xml() {
		// Force the result output to be of XMLRPC
		$this->getContext()->setResponseMethod('XMLRPC');

		$descriptionFormat = $this->getContext()->getLang('provider_description_format');

		$siteTitle = $this->getContext()->getSiteTitle();
		$this->getContext()->set('shortName', $siteTitle);
		$this->getContext()->set('description', sprintf($descriptionFormat, $siteTitle));
		$this->getContext()->set('defaultUrl', $this->getContext()->getDefaultUrl());

		/** @var adminAdminModel $oAdminModel */
		$oAdminModel = getAdminModel('admin');
		$favicon_url = $oAdminModel->getFaviconUrl(false);
		$this->getContext()->set('favicon_url', $favicon_url);
		$this->setTemplateFile('opensearch');
	}
}