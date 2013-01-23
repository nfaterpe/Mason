<?php
/*------------------------------------------------------------------------
# author    Kevin Solomon
# copyright Copyright © 2013 kevinsolomon.com. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.kevinsolomon.com
    -------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die;

#Template Param for Conditional Loading

$loadModernizr = $this->params->get('modernizr');
$loadBootstrap = $this->params->get('bootstrap');
$loadMootools = $this->params->get('mootools');
$pie = $this->params->get('pie');

if ( !$loadMootools ) {
    unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-core.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-more.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/core.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/caption.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/modal.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools.js']);
    unset($doc->_scripts[$this->baseurl.'/plugins/system/mtupgrade/mootools.js']);
}

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx'); // parameter (menu entry)
$tpath = $this->baseurl.'/templates/'.$this->template;


$this->setGenerator(null);

// load sheets and scripts
$doc->addStyleSheet($tpath.'/css/template.css.php?b='.$loadBootstrap.'&amp;v=1');
if ($loadModernizr==1) $doc->addScript($tpath.'/js/modernizr-2.6.2.js'); // <- this script must be in the head

// unset scripts, put them into /js/template.js.php to minify http requests
unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/caption.js']);
?>