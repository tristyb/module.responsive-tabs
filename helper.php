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

	public function addBreakpoints($params){
		
		$pixelbreakpoints = array(192, 368, 432);
		$rembreakpoints;
		$allbreakpoints;
		
		if($params->get('first_break')){
			$breakpoints[0] = $params->get('first_break');
		}

		if($params->get('second_break')){
			$breakpoints[1] = $params->get('second_break');
		}

		if($params->get('third_break')){
			$breakpoints[2] = $params->get('third_break');
		}

		$allbreakpoints[0] = ($params->get('first_break')/16 * 1);

		return $allbreakpoints;

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