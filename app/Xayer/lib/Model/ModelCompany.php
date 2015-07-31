<?php

namespace Xayer\Model;

use Pecee\DB\DBTable;
use Pecee\Model\Model;

class ModelCompany extends Model {

	protected $metadata;

	public function __construct() {

		// Defines the table we are using
		$table = new DBTable();
		$table->column('id')->integer()->primary()->increment();
		$table->column('name')->string(255);
		$table->column('date')->datetime()->index();

		parent::__construct($table);

		// If we want any default values that is not required for the users to set we add them here.
		// We can always overwrite them later by doing $company->date = [NEW-VALUE]
		$this->date = \Pecee\Date::ToDateTime();
		$this->metadata = new ModelCompanyData();
	}

	/**
	 * @return ModelCompanyData
	 */
	public function getMetaData() {
		return $this->metadata;
	}

	public function setMetaData($meta) {
		$this->metadata = $meta;
	}

	protected function saveMetaData() {
		if($this->metadata->hasRows()) {
			foreach($this->metadata->getRows() as $metadata) {
				$metadata->company_id = $this->id;
				$metadata->save();
			}
		}
	}

	public function update() {
		parent::update();

		ModelCompanyData::Clear($this->id);
		$this->saveMetaData();
	}

	public function save() {
		// We have overwritten the save method, so we call the parent save to ensure that the
		// data is saved. We want this to happen before be save the meta-data so we can use $this->id;
		parent::save();
		$this->saveMetaData();
	}

	public static function Get($rows = 30, $page = 0) {
		return self::FetchPage('SELECT * FROM {table}', $rows, $page);
	}

	/**
	 * @param $id
	 * @return ModelCompany
	 */
	public static function GetById($id) {
		$company = self::FetchOne('SELECT * FROM {table} WHERE `id` = %s', $id);
		$company->setMetaData(ModelCompanyData::Get($company->id));
		return $company;
	}

}