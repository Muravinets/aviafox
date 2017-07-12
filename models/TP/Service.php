<?php
namespace TP;

use Tracker;

class Service
{
	/**
	 * @return string
	 */
	public static function getMarker()
	{
		$marker = '65544';

		if (Tracker::gi()->hasCode())
			$marker .= '.' . Tracker::gi()->getCode();

		return $marker;
	}
}