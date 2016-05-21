<?php
/**
 * The controller class of the opensearch module
 *
 * @author ned3y2k (ned3y2k@tistory.com)
 * @license LGPL v2
 */
class opensearchController extends opensearch {
	function triggerBeforeDisplay() {
		if (Context::getResponseMethod() != 'HTML') return;
		if (Context::get('module') == 'admin') return;


		$this->getContext()->addHtmlHeader('<link href="?act=opensearch_xml" rel="search" title="'.$this->getContext()->getSiteTitle().'" type="application/opensearchdescription+xml">');
	}
}