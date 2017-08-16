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
	$keywords = explode("\n", $_POST['keywords']);
	foreach ($keywords as $counter => &$keyword)
	{
		$keyword = trim($keyword);
		if (!$keyword) {
			unset($keywords[$counter]);
			continue;
		}

		$departure = null;
		$destination = null;

		$words = explode(' ', $keyword);
		foreach ($words as $word)
		{
			if (!$word)
				continue;

			try {
				$city = $citiesData->findTitle($word);
				if (!isset($departure))
					$departure = $city;
				elseif (!isset($destination))
					$destination = $city;
				else
					$errors[] = '"' . $keyword . '". Several destinations';
			}
			catch (\City\Error\TitleNotFound $exception) {
				continue;
			}
		}

		if (!isset($destination))
		{
			$errors[] = $keyword;
			continue;
		}

		require_once MDLD . '/Route.php';
		$route = new Route($departure, $destination);
		$urls[] = $route->getFullUrl();
	}
}
?><html>
<head>
	<title>Ссылки на направления по ключевым словам</title>
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
					<label for="urls">Ссылки</label>
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