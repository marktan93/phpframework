<?php

function __autoload($class_name) {
	$core = DOC_ROOT.HOST.ROOT.'core/classes/'.$class_name.'.php';
	$app  = DOC_ROOT.HOST.ROOT.'app/controllers/'.$class_name.'.php';
    $model= DOC_ROOT.HOST.ROOT.'app/models/m_'.$class_name.'.php';

	if (file_exists($core))
		include ($core);
	if (file_exists($app))
		include ($app);
	if (file_exists($model))
		include ($model);
}

$cipher = new cipher(SECRET_KEY);

$page = null;
$obj = null;

?>