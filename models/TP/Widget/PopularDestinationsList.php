<?php
namespace TP\Widget;


class PopularDestinationsList
{

    /**
     * @var string[]
     */
    private $cities = [];

    /**
     * @param string[] $cities
     */
    public function __construct($cities)
    {
        $this->cities = $cities;
    }

    public function render() : string
    {
    	$html = '<script async src="' . $this->getSrc() . '" charset="UTF-8"></script>';
        return $html;
    }

}