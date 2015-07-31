<?php
namespace Xayer\Widget\Company;

use Pecee\DB\DB;
use Pecee\UI\Form\Validate\ValidateInputNotNullOrEmpty;
use Pecee\UI\Html\Html;
use Xayer\Model\ModelCompany;
use Xayer\Model\ModelCompanyData;
use Xayer\Widget\WidgetAbstract;

class CompanyEdit extends WidgetAbstract {
	public $company;

	public function __construct($id) {
		parent::__construct();

		$this->company = ModelCompany::GetById($id);

		if(!$this->company->hasRow()) {
			$this->setMessage(lang('The company does not exist'), 'warning');

			// Go back to the list view
			redirect(url('company', 'index'));
		}

		if($this->isPostBack()) {
			$this->addInputValidation(lang('Company name'), 'name', new ValidateInputNotNullOrEmpty());

			$this->company->name = $this->data->name;

			$meta = array();

			foreach($this->data->metakey as $i => $key) {
				$model = new ModelCompanyData();
				$model->key = $key;
				$model->value = $this->data->metavalue[$i];

				$meta[] = $model;
			}

			$this->company->getMetaData()->setRows($meta);

			$this->company->update();

			$this->setMessage('Company successfully updated', 'success');

			// Redirect to list view
			redirect(url('company', 'index'));

		}
	}

}