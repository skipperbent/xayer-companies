<? /* @var $this \Xayer\Widget\Company\CompanyHome */ ?>
<div>
	<?= $this->showFlash(); ?>

	<? if(!$this->companies->hasRows()) : ?>
		<?= lang('No companies found'); ?>
	<? else: ?>

		<table style="width: 100%;">
			<thead>
				<tr>
					<th>
						Name
					</th>
					<th>
						Actions
					</th>
				</tr>
			</thead>
			<tbody>
					<? /* @var $company \Xayer\Model\ModelCompany */
					foreach($this->companies->getRows() as $company) : ?>
						<tr>
							<td>
								<?= $company->name; ?>
							</td>
							<td>
								View - <a href="<?= url('company', 'edit', array($company->id)); ?>">Edit</a> -
								<a href="<?= url('company', 'delete', array($company->id)); ?>" onclick="return confirm('<?= lang('Are you sure you want to delete this company?'); ?>');">Delete</a>
							</td>
						</tr>
					<? endforeach; ?>
			</tbody>
		</table>
	<? endif; ?>
</div>