<?php
namespace TP\Widget;


class PopularDestinations
{
    /**
     * IATA code of the destination city
     * @var string
     */
    private $destinationCode;

    /**
     * Travelpayouts affiliate marker
     * @var string
     */
    private $marker = '65544';

    /**
     * WL
     * @var string
     */
    private $host = 'wl.aviafox.com';

    /**
     * PopularDestinations constructor.
     * @param string $destinationCode
     */
    public function __construct(string $destinationCode)
    {
        $this->destinationCode = $destinationCode;
    }

    public function render()
    {
        include TPLD . '/tp/widget/popular-destinations.php';
    }

    /**
     * @return string
     */
    public function getSrc() : string
    {
        $src = '//www.travelpayouts.com/weedle/widget.js?'
             . 'marker=' . $this->marker
             . '&host=' . $this->host
             . '&locale=ru&currency=rub'
             . '&destination=' . strtoupper($this->destinationCode)
             . '&destination_name=undefined'
        ;

        return $src;
    }

}