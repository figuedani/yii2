<?php
use yii\helpers\Html;

/**
 * @var yii\debug\panels\ConfigPanel $panel
 */
$extensions = $panel->getExtensions();
?>
<h1>Configuration</h1>

<div><?= Html::a('Show phpinfo() »', ['phpinfo'], ['class' => 'btn btn-info', 'target' => 'phpinfo']) ?></div>

<?php
echo $this->render('panels/config/table', [
	'caption' => 'Application Configuration',
	'values' => [
		'Yii Version' => $panel->data['application']['yii'],
		'Application Name' => $panel->data['application']['name'],
		'Environment' => $panel->data['application']['env'],
		'Debug Mode' => $panel->data['application']['debug'] ? 'Yes' : 'No',
	],
]);

if (!empty($extensions)) {
	echo $this->render('panels/config/table', [
		'caption' => 'Installed Extensions',
		'values' => $extensions,
	]);
}

echo $this->render('panels/config/table', [
	'caption' => 'PHP Configuration',
	'values' => [
		'PHP Version' => $panel->data['php']['version'],
		'Xdebug' => $panel->data['php']['xdebug'] ? 'Enabled' : 'Disabled',
		'APC' => $panel->data['php']['apc'] ? 'Enabled' : 'Disabled',
		'Memcache' => $panel->data['php']['memcache'] ? 'Enabled' : 'Disabled',
	],
]);
?>