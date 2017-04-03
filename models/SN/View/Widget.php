<?php
/**
 * User: carlos
 */

namespace SN\View;

class Widget
{

    /**
     * @var string
     */
    private $title = 'Понравилась страница? Расскажи о ней друзьям.';

    public function render()
    {
        include __DIR__ . '/widget.phtml';
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

}