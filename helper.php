<?php

#@license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

defined('_JEXEC') or die;

class mod_tristybresponsivetabsHelper{

	public function getContent($params){
		
		$tabs = array();

		for($i = 1; $i <= 5; $i++){
			if($params->get('tab'.$i) && $params->get('content'.$i)){
				$tabs[$i] = array();
				$tabs[$i]['tab_count'] = $i;
				$tabs[$i]['tab_title'] = $params->get('tab'.$i);
				$tabs[$i]['tab_content'] = $params->get('content'.$i);
			}
		}

		return $tabs;
	}

	public function supportAwfulBrowser($params){
		if($params->get('ie_fallback')){
			$doc = &JFactory::getDocument();
			$app = &JFactory::getApplication();
			$file="/modules/mod_tristybresponsivetabs/assets/js/scripts.min.js";
			$doc->addScript($file);	
		}		
	}

}