<?php

/**
 * Class Route
 *
 * @author Carlos
 */
class Route
{
	/**
	 * @var \City\Object
	 */
	private $departure;

	/**
	 * @var \City\Object
	 */
	private $destination;

	/**
	 * @param \City\Object $departure
	 * @param \City\Object $destination
	 */
	public function __construct(\City\Object $departure, \City\Object $destination)
	{
		$this->departure = $departure;
		$this->destination = $destination;
	}

	/**
	 * Возвращает название направления.
	 * Example: Симферополь - Москва
	 *
	 * @return string
	 */
	public function getTitle()
	{
		return $this->departure->getTitle() . ' - ' . $this->destination->getTitle();
	}

	/**
	 * @return \City\Object
	 */
	public function getDeparture(): \City\Object {
		return $this->departure;
	}

	/**
	 * @return \City\Object
	 */
	public function getDestination(): \City\Object {
		return $this->destination;
	}

	/**
	 * @return string
	 */
	public function getFullUrl(): string
	{
		$baseUrl = 'https://www.aviafox.com/routes';
		return $baseUrl . '/' . $this->departure->getUriName() . '/' . $this->destination->getUriName();
	}

}