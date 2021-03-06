<?php
/**
 * Convert keywords to urls for pages of type: Route
 * User: carlos
 */

define( 'MDLD', __DIR__ . '/../models' );

if ( isset( $_POST['keywords'] ) && $_POST['keywords'] )
{
	require_once MDLD . '/Route.php';
	require_once MDLD . '/City/Data.php';

	$citiesData = new \City\Data();

	$errors = [];
	$urls = [];
	$titles = [];

	$descSuffix = '. Поиск найдет и покажет низкие цены';
	$descriptions = [];

	$keywords = explode("\n", $_POST['keywords']);
	foreach ($keywords as $counter => &$keyword)
	{
		$keyword = trim($keyword);
		$keyword = trim($keyword, '"');
		$keyword = trim($keyword);
		if (!$keyword) {
			unset($keywords[$counter]);
			continue;
		}

		$departure = null;
		$destination = null;

		$descParts = [];

		$words = explode(' ', $keyword);
		foreach ($words as $word)
		{
			if (!$word)
				continue;

			try {
				$city = $citiesData->findTitle($word);
			}
			catch (\City\Error\TitleNotFound $exception)
            {
			    if (count($descParts) < 3)
				    $descParts[] = count($descParts) ? $word : mb_convert_case($word, MB_CASE_TITLE);

				continue;
			}

			if (
				(is_object($departure) && ($city == $departure))
				||
				(is_object($destination) && $city == $destination)
			) { // Fix double city
				continue;
			}

            $descParts[] = $city->getTitle();

			if (!is_object($departure))
				$departure = $city;
			elseif (!is_object($destination))
				$destination = $city;
			else
				$errors[] = '"' . $keyword . '". Several destinations:"' . $departure->getCode() . '" - "' . $destination->getCode() . '"';

		}

		if (!is_object($destination))
		{
			$errors[] = $keyword;
			continue;
		}

		$route = new Route($departure, $destination);

		$title = implode(' ', $descParts);
		if (mb_strlen($title) > 33)
		{
		    $title = $route->getTitle(true);
			if (mb_strlen($title) > 33) {
				$errors[] = '"' . $keyword . '". Заголовок "' . $title . '" - длина ' . mb_strlen( $title );
				continue;
			}
        }

		$description = implode(' ', $descParts) . $descSuffix;
		if (mb_strlen($description) > 75)
		{
			$description = $route->getTitle(true) . $descSuffix;
			if (mb_strlen($description) > 75) {
				$errors[] = '"' . $keyword . '". Описание "' . $description . '" - длина ' . mb_strlen( $description );
				continue;
			}
        }

		$keyword = '"' . $keyword . '"';
		$urls[] = $route->getFullUrl();
		$titles[] = $title;
		$descriptions[] = $description;
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
    <h1>Ключевые слова в направления</h1>

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
        <ul>
			<li>
				<div>
					<label for="titles">Заголовки</label>
				</div>
				<textarea id="titles" name="titles" rows="20"><?
					if (isset($titles)) {
						echo implode("\n", $titles);
					}
				?></textarea>
			</li>
			<li>
				<div>
					<label for="descriptions">Описания</label>
				</div>
				<textarea id="descriptions" name="descriptions" rows="20"><?
					if (isset($descriptions)) {
						echo implode("\n", $descriptions);
					}
				?></textarea>
			</li>
		</ul>
	</form>
</body>
</html>