<? /* @var $this \Xayer\Widget\WidgetAbstract */ ?>
<?= \Pecee\UI\Site::GetInstance()->getDocType(); ?>
<html>
	<head>
		<?= $this->printHeader(); ?>
	</head>
	<body>
		<div class="wrapper container">
			<h1>Xayer</h1>

			<ul>
				<li>
					<a href="<?= url('company', 'index'); ?>"><?= lang('Companies'); ?></a>
					<a href="<?= url('company', 'create'); ?>"><?= lang('Create company'); ?></a>
				</li>
			</ul>

			<?= $this->getContentHtml(); ?>
		</div>
	</body>
</html>