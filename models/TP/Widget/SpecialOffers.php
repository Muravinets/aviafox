<?php
namespace TP\Widget;


/**
 * Class SpecialOffers
 * Виджет спецпредложений
 *
 * @link https://www.travelpayouts.com/tools/widgets/ducklett
 * @link https://support.travelpayouts.com/hc/ru/articles/216486858
 * @package TP\Widget
 * @author Igor Muravinets
 */
class SpecialOffers
{
    /**
     * @var \Airline\Object
     */
    private $airline;

    /**
     * @var \City\Object
     */
    private $departure;

    /**
     * @var \City\Object
     */
    private $destination;

    /**
     * @var integer
     */
    private $limit = 9;

    public function render() : string
    {
    	return '<script async src="' . $this->getSrc() . '" charset="UTF-8"></script>';
    }

    /**
     * @return string
     */
    public function getSrc() : string
    {
        $result = '//www.travelpayouts.com/ducklett/scripts.js?'
                . 'widget_type=slider'
//                . 'widget_type=brickwork'
                . '&currency=rub'
                . '&host=wl.aviafox.com%2Fflights'
                . '&marker=65544.'
                . '&limit=' . $this->limit;
        ;

        if (isset($this->airline))
        {
            $result .= '&airline_iatas=' . strtoupper($this->airline->getCode());
//                . '&airline_iatas=' . strtolower($this->airline->getCode())
        }
        if (isset($this->departure))
        {
            $result .= '&origin_iatas=' . strtoupper($this->departure->getCode());
        }
        if (isset($this->destination))
        {
            $result .= '&destination_iatas=' . strtoupper($this->destination->getCode());
        }

        return $result;
    }

    /**
     * @param \Airline\Object $airline
     * @return self
     */
    public function setAirline(\Airline\Object $airline): self
    {
        $this->airline = $airline;
        return $this;
    }

    /**
     * @param \City\Object $departure
     * @return self
     */
    public function setDeparture(\City\Object $departure): self
    {
        $this->departure = $departure;
        return $this;
    }

    /**
     * @param \City\Object $destination
     * @return self
     */
    public function setDestination(\City\Object $destination): self
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * @param int $limit
     * @return self
     */
    public function setLimit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

}