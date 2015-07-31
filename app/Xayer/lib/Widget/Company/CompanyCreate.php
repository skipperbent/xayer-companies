<?php
namespace Xayer\Widget\Company;

use Pecee\UI\Form\Validate\ValidateInputMaxLength;
use Pecee\UI\Form\Validate\ValidateInputNotNullOrEmpty;
use Xayer\Model\ModelCompany;
use Xayer\Model\ModelCompanyData;
use Xayer\Widget\WidgetAbstract;

class CompanyCreate extends WidgetAbstract {

	public function __construct() {
		parent::__construct();

		if($this->isPostBack()) {

			// This is how to add more validations classes
			// $this->addInputValidation(lang('Company name'), 'name', array(new ValidateInputNotNullOrEmpty(), new ValidateInputMaxLength(50)));

			$this->addInputValidation(lang('Company name'), 'name', new ValidateInputNotNullOrEmpty());

			// If theres no errors, proceed
			if(!$this->hasErrors()) {

				// $this->file contains all values for postback files
				// $this->data contains all values for postback input

				// We build our own array from the postback data
				$company = new ModelCompany();
				$company->name = $this->data->name;

				$meta = array();

				foreach($this->data->metakey as $i => $key) {
					$model = new ModelCompanyData();
					$model->key = $key;
					$model->value = $this->data->metavalue[$i];

					$meta[] = $model;
				}

				$company->getMetaData()->setRows($meta);

				$company->save();

				$this->setMessage('Company successfully created', 'success');

				// Redirect to list view
				redirect(url('company', 'index'));
			}

		}

	}

}