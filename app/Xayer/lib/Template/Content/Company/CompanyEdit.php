<? /* @var $this \Xayer\Widget\Company\CompanyEdit */ ?>
<div>

	<h3><?= lang('Create company'); ?></h3>

	<?= $this->form()->start('saveCompany'); ?>

	<?= $this->showFlash(); ?>

	<?= $this->form()->input('name', 'text', $this->company->name)->addAttribute('placeholder', lang('Enter name')) ?>
	<?= $this->validationFor('name'); ?>

	<div>
		<h3><?= lang('Meta data'); ?></h3>

		<? if($this->company->getMetaData()->hasRows()) : ?>
			<? foreach($this->company->getMetaData()->getRows() as $i => $meta) : ?>
				<div class="js-meta">
					<?= $this->form()->input('metakey[]', 'text', $meta->key)->addAttribute('placeholder', lang('Key')); ?><br/>
					<?= $this->form()->textarea('metavalue[]', 10, 10, $meta->value)->addAttribute('style', 'width: 300px; height: 70px;'); ?>

					<? if($i > 0) : ?>
						<input type="button" value="Delete" onclick="deleteMeta(this);" />
					<? endif; ?>
				</div>
			<? endforeach; ?>
		<? else: ?>
			<div class="js-meta">
				<?= $this->form()->input('metakey[]', 'text')->addAttribute('placeholder', lang('Key')); ?><br/>
				<?= $this->form()->textarea('metavalue[]', 10, 10)->addAttribute('style', 'width: 300px; height: 70px;'); ?>
			</div>
		<? endif; ?>

		<div id="meta-input-container"></div>

		<input type="button" value="<?= lang('Add meta fields'); ?>" class="js-add-meta" />

		<hr/>

		<?= $this->form()->submit('saveBtn', lang('Update')); ?>
	</div>

	<?= $this->form()->end(); ?>
</div>

<script>
	function deleteMeta(el) {
		$(el).parents('.js-meta:first').remove();
	}

	$(document).ready(function() {
		$(document).on('click', '.js-add-meta', function(e) {
			var newInputs = $('.js-meta:first').clone();

			newInputs.find('input, textarea').each(function() {
				$(this).val('');
			});

			newInputs.append('<input type="button" value="Delete" onclick="deleteMeta(this);" />');

			$('#meta-input-container').append(newInputs);
		});
	});
</script>
