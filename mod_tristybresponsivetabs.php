<?php

#@license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

/* tristyb's responsive tabs module */

defined('_JEXEC') or die;
JHtml::_('behavior.framework', true);

// add the helper file becuase we need it...
require_once(dirname(__FILE__).'/helper.php');

// define document
$doc =& JFactory::getDocument();

// add stylesheet
$doc->addStyleSheet(JURI::base(true) . '/modules/mod_tristybresponsivetabs/assets/css/style.css', 'text/css' );

// get the content for the tabs (passing in paramaters)
$tab_content = mod_tristybresponsivetabsHelper::getContent($params);

$breaks = mod_tristybresponsivetabsHelper::addBreakpoints($params);

// do we need ie8? Run that method and pass in the params
mod_tristybresponsivetabsHelper::supportAwfulBrowser($params);

//keeps module class suffix even if templateer tries to stop it
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

// get the template
require(JModuleHelper::getLayoutPath('mod_tristybresponsivetabs'));
