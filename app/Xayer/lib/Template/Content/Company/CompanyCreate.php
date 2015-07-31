<? /* @var $this \Xayer\Widget\Company\CompanyCreate */ ?>
<div>

	<h3><?= lang('Create company'); ?></h3>

	<?= $this->form()->start('saveCompany'); ?>

		<?= $this->showFlash(); ?>

		<?= $this->form()->input('name', 'text')->addAttribute('placeholder', lang('Enter name')) ?>
		<?= $this->validationFor('name'); ?>

		<div>
			<h3><?= lang('Meta data'); ?></h3>

			<div class="js-meta">
				<?= $this->form()->input('metakey[]', 'text')->addAttribute('placeholder', lang('Key')); ?><br/>
				<?= $this->form()->textarea('metavalue[]', 10, 10)->addAttribute('style', 'width: 300px; height: 70px;'); ?>
			</div>

			<div id="meta-input-container"></div>

			<input type="button" value="<?= lang('Add meta fields'); ?>" class="js-add-meta" />

			<hr/>

			<?= $this->form()->submit('saveBtn', lang('Save')); ?>
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

			newInputs.append('<input type="button" value="Delete" onclick="deleteMeta(this);" />');

			$('#meta-input-container').append(newInputs);
		});
	});
</script>
