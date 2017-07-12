<?php
namespace TP\Widget;

require_once MDLD . '/TP/Service.php';

use \TP;

class HotelsMap
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
    private $host = 'hotellook.ru';

    /**
     * @param string $cityCode
     */
    public function __construct(string $cityCode)
    {
        $this->cityCode = $cityCode;
    }

    public function render() : string
    {
	    $html = '<iframe src="'
	            . $this->getSrc() .'" height="400px" width="100%" scrolling="no" frameborder="0"></iframe>';

        return $html;
    }

    /**
     * @return string
     */
    public function getSrc() : string
    {
	    $src =
		    '//maps.avs.io/hotels?'
		    . 'color=%2300b1dd&locale=ru'
		    . '&marker='. TP\Service::getMarker() . '.hotelsmap'
		    . '&changeflag=0&draggable=true&map_styled=false&map_color=%2300b1dd&contrast_color=%23FFFFFF'
		    . '&disable_zoom=false&base_diameter=16&scrollwheel=false'
		    . '&host=' . $this->host
		    . '&zoom=12'
		    . '&city_iata=' . strtoupper($this->cityCode)
	    ;

        return $src;
    }

}