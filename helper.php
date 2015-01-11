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

		$rembreakpoints[0] = ($params->get('first_break')/16 * 1);
		$rembreakpoints[1] = ($params->get('second_break')/16 * 1);
		$rembreakpoints[2] = ($params->get('third_break')/16 * 1);

		$responsive_styles = "@media only screen and (min-width: ".$rembreakpoints[0]."rem){\n"
							."#responsive-tabs label{\n"
							."display: inline-block;\n"
							."margin-left: -0.3125rem;\n"
							."border-bottom: 1px solid transparent;\n"
							."}\n"
							."#responsive-tabs input[type='radio']:checked + label,\n"
							."#responsive-tabs input[type='radio'].checked + label{\n"
							."border-bottom: 1px solid transparent;\n"
							."}\n"
							."}\n"
							."@media only screen and (min-width: ".$rembreakpoints[1]."rem){\n"
							."#responsive-tabs label{\n"
							."padding: 1rem;\n"
							."font-size: 0.85rem;\n"
							."}\n"
							."#responsive-tabs label:before{\n"
							."display: none;\n"
							."}\n"
							."#responsive-tabs label span{\n"
							."display: block;\n"
							."}\n"
							."}\n"
							."@media only screen and (min-width: ".$rembreakpoints[2]."rem){\n"
							."#responsive-tabs label{\n"
							."font-size: 1rem;\n"
							."}\n"
							."}\n";

		$ie_styles = "@media only screen and (min-width: ".$breakpoints[0]."px){\n"
							."#responsive-tabs label{\n"
							."display: inline-block;\n"
							."margin-left: -5px;\n"
							."border-bottom: 1px solid transparent;\n"
							."}\n"
							."#responsive-tabs input[type='radio']:checked + label,\n"
							."#responsive-tabs input[type='radio'].checked + label{\n"
							."border-bottom: 1px solid transparent;\n"
							."}\n"
							."}\n"
							."@media only screen and (min-width: ".$breakpoints[1]."px){\n"
							."#responsive-tabs label{\n"
							."padding: 1em;\n"
							."font-size: 0.85em;\n"
							."}\n"
							."#responsive-tabs label:before{\n"
							."display: none;\n"
							."}\n"
							."#responsive-tabs label span{\n"
							."display: block;\n"
							."}\n"
							."}\n"
							."@media only screen and (min-width: ".$breakpoints[2]."px){\n"
							."#responsive-tabs label{\n"
							."font-size: 1em;\n"
							."}\n"
							."}\n";

		$doc = JFactory::getDocument();

		if($params->get('ie_fallback')){
			$doc->addStyleDeclaration( $ie_styles );
			$doc->addStyleDeclaration( $responsive_styles );
		} else {
			$doc->addStyleDeclaration( $responsive_styles );
		}

	}

	public function supportAwfulBrowser($params){
		if($params->get('ie_fallback')){
			$doc = &JFactory::getDocument();
			
			$jslink = '<!--[if lte IE 8]>' ."\n";
			$jslink .= '<style type="text/js" href="/modules/mod_tristybresponsivetabs/assets/js/scripts.min.js" />'."\n";
			$jslink .= '<![endif]-->' ."\n";
 
			$doc->addCustomTag($jslink);
		}		
	}

}