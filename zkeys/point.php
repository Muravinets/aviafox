<?php
/**
 * Convert keywords to urls for pages of type: Route
 * User: carlos
 */

define( 'MDLD', __DIR__ . '/../models' );

if ( isset( $_POST['keywords'] ) && $_POST['keywords'] )
{
	require_once MDLD . '/City/Data.php';
	$citiesData = new \City\Data();

	$errors = [];
	$urls = [];
	$titles = [];
	$descriptions = [];
	$keywords = explode("\n", $_POST['keywords']);
	foreach ($keywords as $counter => &$keyword)
	{
		$keyword = trim($keyword);
		if (!$keyword) {
			unset($keywords[$counter]);
			continue;
		}

		$point = null;
		try {
			$point = $citiesData->findTitle( $keyword );
		}
		catch (\City\Error\TitleNotFound $exception) {
			$errors[] = $keyword;
			continue;
		}

		$urls[] = $point->getUriName();
	}
}
?><html>
<head>
	<title>Город по ключевым словам</title>
	<link rel="stylesheet" type="text/css" href="normalize.css" media="all" />
	<style>
		body
		{
			font-size: 17px;
			padding:1em;
		}
		ul {
			list-style: none;
			margin: 0;
			padding: 0;
		}
		ul.errors {
			color: red;
		}
		form ul {
			display: flex;
			align-items: center;
			justify-content: center;

		}
		form li	{
			flex: auto;
		}
		form li.button
		{
			flex: 0;
			margin: 0 1em;
		}
		textarea
		{
			width: 100%;
		}
		input[type="submit"]
		{
			padding: 1em;
		}
	</style>
</head>
<body>
    <h1>Города</h1>

	<? if (isset($errors) && count($errors)) : ?>
	<ul class="errors">
		<? foreach ($errors as $error) : ?>
		<li><?= $error ?></li>
		<? endforeach; ?>
	</ul>
	<? endif; ?>

	<form method="post">
		<ul>
			<li>
				<div>
					<label for="keywords">Ключевые слова</label>
				</div>
				<textarea id="keywords" name="keywords" rows="20"><?
					if (isset($keywords)) {
						echo implode("\n", $keywords);
					}
				?></textarea>
			</li>
			<li class="button">
				<input type="submit" value="=>>>>>" />
			</li>
			<li>
				<div>
					<label for="urls">Города</label>
				</div>
				<textarea id="urls" name="urls" rows="20"><?
					if (isset($urls)) {
						echo implode("\n", $urls);
					}
				?></textarea>
			</li>
		</ul>
	</form>
</body>
</html>