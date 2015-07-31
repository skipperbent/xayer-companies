<?php
namespace Xayer\Widget;
use Pecee\Debug;
use Pecee\UI\Html\Html;
use Pecee\UI\Site;

abstract class WidgetAbstract extends \Pecee\Widget {
	public function __construct() {
		parent::__construct();

		// This is really not required, but if you want you can change the doctype like so..
		$this->getSite()->setDocType(Site::DOCTYPE_HTML_5);

		// GetSite contains information about the site - here we can add javascript and change styling etc.

		$this->getSite()->setTitle('Test site');
		$this->getSite()->addWrappedCss('style.css');
		$this->getSite()->addWrappedJs('jquery-1.11.3.min.js');
		$this->getSite()->addWrappedJs('global.js');
        $this->getSite()->addWrappedJs('pecee.js');

		// Add meta viewport field
		$object = new Html('meta');
		$object->setClosingType(Html::CLOSE_TYPE_SELF);
		$object->addAttribute('name', 'viewport');
		$object->addAttribute('content', 'width=device-width, initial-scale=1');

		$this->getSite()->addHeader($object);

		// Add entry to debug class
		Debug::GetInstance()->add('NU HAR JEG LOADED ABSTRACT');

		// OVERSTÅENDE SVARER TIL AT GØRE SÅDAN HER
		//$this->getSite()->addMeta('viewport', 'width=device-width, initial-scale=1');
	}

	public function showFlash($formName=NULL) {
		$o=$this->showMessages('error', $formName);
		$o.=$this->showMessages('warning', $formName);
		$o.=$this->showMessages('info', $formName);
		$o.=$this->showMessages('success', $formName);
		return $o;
	}

	public function showMessages($type, $formName = NULL) {
		if(is_null($formName) || is_null($this->getFormName()) || $formName == $this->getFormName()) {
			if($this->hasMessages($type)) {
				$o = sprintf('<div class="msg %s"><div class="txt">', $type);
				$msg=array();
				/* @var $error \Pecee\UI\Form\FormMessage */
				foreach($this->getMessages($type) as $error) {
					$msg[] = sprintf('%s', $error->getMessage());
				}

				$o .= join('<br/>', $msg) . '</div></div>';
				return $o;
			}
		}
		return '';
	}

	public function validationFor($name) {
		if($this->form()->validationFor($name)) {
			return '<span class="error">'.$this->form()->validationFor($name).'</span>';
		}
		return '';
	}
}