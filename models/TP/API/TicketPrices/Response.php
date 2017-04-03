<?php

namespace TP\API\TicketPrices;

require __DIR__ . '/../Response.php';
require_once MDLD . '/City/Data.php';
require_once MDLD . '/Ticket.php';

/**
 * @var $request \TP\API\TicketPrices\Request
 * 
 * @author carlos
 *
 */
class Response extends \TP\API\Response
{
    
    /**
     * @var array
     */
    public $list;
    
    /**
     * {@inheritDoc}
     * @see \TP\API\Response::importJSON()
     */
    public function importJSON($data)
    {
//        echo '<pre>';
//        var_dump($data);
//        echo '</pre>';
//        exit;

        $cities = new \City\Data;

        $this->list = [];

        foreach ($data as $row)
        {
            $ticket = new \Ticket();

            try
            {
                $ticket->origin = $cities->findCode($row['origin']);
                $ticket->destination = $cities->findCode($row['destination']);
            }
            catch (\City\Error\CodeNotFound $error)
            {
                continue;
            }

            $ticket->value = $row['value'];
            $ticket->departDate = $row['depart_date'];
            $ticket->returnDate = $row['return_date'];
            $ticket->numberOfChanges = $row['number_of_changes'];
            $ticket->tripClass = $row['trip_class'];
            $ticket->distance = $row['distance'];
            $ticket->foundAt = $row['found_at'];
            
            $this->list[] = $ticket;
        }
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        return $this->list;
    }

    /**
     * @param int|null $limit
     * @return array
     */
    public function getFromRussia(int $limit = null) : array
    {
        $result = [];

        /* @var $ticket Ticket */
        foreach ($this->list as $ticket)
        {
            if (!$ticket->origin->isRussian() || $ticket->destination->isRussian())
            {
                continue;
            }

            $result[] = $ticket;
            if (!is_null($limit) && count($result) == $limit)
            {
                break;
            }
        }

        return $result;
    }

    /**
     * @param int|null $limit
     * @return array
     */
    public function getToRussia(int $limit = null) : array
    {
        $result = [];

        /* @var $ticket Ticket */
        foreach ($this->list as $ticket)
        {
            if ($ticket->origin->isRussian() || !$ticket->destination->isRussian())
            {
                continue;
            }

            $result[] = $ticket;
            if (!is_null($limit) && count($result) == $limit)
            {
                break;
            }
        }

        return $result;
    }

    /**
     * @param int|null $limit
     * @return array
     */
    public function getInRussia(int $limit = null) : array
    {
        $result = [];

        /* @var $ticket Ticket */
        foreach ($this->list as $ticket)
        {
            if (!$ticket->origin->isRussian() || !$ticket->destination->isRussian())
            {
                continue;
            }

            $result[] = $ticket;
            if (!is_null($limit) && count($result) == $limit)
            {
                break;
            }
        }

        return $result;
    }

}