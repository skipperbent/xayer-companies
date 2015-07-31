<?php
namespace Xayer\Widget\Company;

use Pecee\UI\Form\Validate\ValidateInputMaxLength;
use Pecee\UI\Form\Validate\ValidateInputNotNullOrEmpty;
use Xayer\Model\ModelCompany;
use Xayer\Model\ModelCompanyData;
use Xayer\Widget\WidgetAbstract;

class CompanyDelete extends WidgetAbstract {

	public function __construct($id) {
		parent::__construct();

		$company = ModelCompany::GetById($id);

		if($company->hasRow()) {
			$this->setMessage('Company '. $company->name .' has been deleted', 'success');
			$company->delete();
		} else {
			$this->setMessage('Failed to delete company', 'error');
		}

		redirect(url('company', 'index'));
	}

}