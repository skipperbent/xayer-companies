<?php
namespace Xayer\Widget\Company;

use Pecee\DB\DB;
use Pecee\UI\Html\Html;
use Xayer\Model\ModelCompany;
use Xayer\Widget\WidgetAbstract;

class CompanyHome extends WidgetAbstract {
	public $companies;

	public function __construct() {
		parent::__construct();

		$this->companies = ModelCompany::Get($this->getParam('rows', 30), $this->getParam('page', 0));
	}

}