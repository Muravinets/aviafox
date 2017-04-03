<?php

/**
 * @author carlos
 *
 */
class Ticket
{

    /**
     * @var \City\Object
     */
    public $origin;

    /**
     * @var \City\Object
     */
    public $destination;

    public $tripClass;
    public $departDate;
    public $returnDate;
    public $numberOfChanges;
    public $value;
    public $distance;
    public $foundAt;
}