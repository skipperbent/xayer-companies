<?php
namespace Xayer\Controller;
use Pecee\Controller;
use Xayer\Model\ModelCompany;
use Xayer\Model\ModelCompanyData;
use Xayer\Widget\Company\CompanyCreate;
use Xayer\Widget\Company\CompanyDelete;
use Xayer\Widget\Company\CompanyEdit;
use Xayer\Widget\Company\CompanyHome;

class ControllerCompany extends Controller {

	public function indexView() {
		echo new CompanyHome();
	}

	public function createView() {
		echo new CompanyCreate();
	}

	public function editView($id) {
		echo new CompanyEdit($id);
	}

	public function deleteView($id) {
		new CompanyDelete($id);
	}

}