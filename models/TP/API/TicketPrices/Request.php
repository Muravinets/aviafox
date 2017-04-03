<?php

namespace TP\API\TicketPrices;

require __DIR__ . '/../Request.php';
require __DIR__ . '/Response.php';


/**
 * Цены на авиабилеты
 * https://support.travelpayouts.com/hc/ru/articles/203956163#02
 * 
 * @author carlos
 */
class Request extends \TP\API\Request
{

    /**
     * Пункт отправления. IATA код города или код страны. Длина не менее 2 и не более 3 символов.
     * @var string
     */
    protected $origin;

    /**
     * Пункт назначения. IATA код города или код страны. Длина не менее 2 и не более 3.
     * @var string
     */
    protected $destination;

    /**
     * Количество записей на странице. Значение по умолчанию — 30. Не более 1000.
     * @var int
     */
    protected $limit;

    /**
     * @var string
     */
    protected $url = 'http://api.travelpayouts.com/v2/prices/latest';
    // 'http://api.travelpayouts.com/v2/prices/latest?currency=rub&period_type=year&page=1&limit=30&show_to_affiliates=true&sorting=price&trip_class=0&token=' . $token;
    // http://api.travelpayouts.com/v2/prices/latest?currency=rub&period_type=year&page=1&limit=30&show_to_affiliates=true&sorting=price&trip_class=0&token=65544
    
    /**
     * {@inheritDoc}
     * @see \TP\API\Request::getUrl()
     */
    protected function getUrl()
    {
        $params = [];
        if ($this->origin) 
        {
            $params[] = 'origin=' . $this->origin;
        }
        if ($this->destination)
        {
            $params[] = 'destination=' . $this->destination;
        }
        if ($this->limit)
        {
            $params[] = 'limit=' . $this->limit;
        }
        $params[] = 'token=9de08b81ed456dcaa65416aad35de826';

        $this->url .= '?' . implode('&', $params);
        return $this->url;
    }
    
    /**
     * {@inheritDoc}
     * @see \TP\API\Request::createResponse()
     */
    protected function createResponse()
    {
        return new Response($this);
    }

    /**
     * @param string $value
     * @return self
     */
    public function setOrigin(string $value): self
    {
        $this->origin = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return self
     */
    public function setDestination($value)
    {
        $this->destination = $value;
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