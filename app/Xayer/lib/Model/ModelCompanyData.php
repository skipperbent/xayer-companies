<?php

namespace Xayer\Model;

use Pecee\DB\DB;
use Pecee\DB\DBTable;
use Pecee\Model\Model;

class ModelCompanyData extends Model {

	public function __construct() {
		$table = new DBTable();
		$table->column('id')->integer()->primary()->increment();
		$table->column('company_id')->integer()->index();
		$table->column('key')->string(255)->index();
		$table->column('value')->longtext();

		parent::__construct($table);
	}

	public static function Clear($companyId) {
		self::NonQuery('DELETE FROM {table} WHERE `company_id` = %s', $companyId);
	}

	public static function Get($companyId, $rows = 10, $page = 0) {
		return self::FetchPage('SELECT * FROM {table} WHERE `company_id` = %s', $rows, $page, $companyId);
	}

}