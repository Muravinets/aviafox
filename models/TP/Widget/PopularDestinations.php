<?php
namespace TP\Widget;

require_once MDLD . '/TP/Service.php';

use \TP;

class PopularDestinations
{
    /**
     * IATA code of the destination city
     * @var string
     */
    private $destinationCode;

    /**
     * WL
     * @var string
     */
//    private $host = 'ticket.aviafox.com';
    private $host = 'test-wl.aviafox.com';

    /**
     * PopularDestinations constructor.
     * @param string $destinationCode
     */
    public function __construct(string $destinationCode)
    {
        $this->destinationCode = $destinationCode;
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
        $src = '//www.travelpayouts.com/weedle/widget.js?'
             . 'marker=' . TP\Service::getMarker()
             . '&host=' . $this->host
             . '&locale=ru&currency=rub'
             . '&destination=' . strtoupper($this->destinationCode)
             . '&destination_name=undefined'
        ;

        return $src;
    }

}