<?php
namespace TP\Widget;

require_once MDLD . '/TP/Service.php';

use \TP;

class Hotels
{
    /**
     * IATA code of the city
     * @var string
     */
    private $cityCode;

    /**
     * WL
     * @var string
     */
    private $host = 'search.hotellook.com';
//    private $host = 'tickets.aviafox.com%2Fhotels';

	/**
	 * @var int
	 */
    private $limit = 10;

    /**
     * @param string $cityCode
     */
    public function __construct(string $cityCode)
    {
        $this->cityCode = $cityCode;
    }

    public function render() : string
    {
    	$html = '<script async src="' . $this->getSrc() . '" charset="UTF-8"></script>';
        return $html;
    }

    /**
     * @return string
     */
    public function getSrc() : string
    {
	    $src = '//www.travelpayouts.com/blissey/scripts.js?'
//	         . 'categories=popularity'
//	           . '&id=6623'
	           . 'iata=' . strtoupper($this->cityCode)
	           . '&type=compact'
	           . '&currency=rub'
	           . '&host=' . $this->host
	           . '&marker=' . TP\Service::getMarker()
	           . '&limit=' . $this->limit
	    ;

        return $src;
    }

}