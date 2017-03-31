<?php

namespace AviaPartner;

/**
 * @author Igor Muravinets
 *
 */
class Object
{
    
    public $name;
    public $title;
    public $logoName;
    public $logoAlt;
    public $logoTitle;
    public $logoSourceUrl;

    public function __construct($data)
    {
        $this->name = $data[0];
        $this->title = $data[1];
        $this->logoName = $data[3];
        $this->logoAlt = $data[4];
        $this->logoTitle = $data[5];
        $this->logoSourceUrl = $data[6];
    }
 
    /**
     * @return string
     */
    public function getLogoUrl()
    {
        return '/web/images/airline/logos/' . $this->logoName;
    }
    
    /**
     * @return string
     */
    public function getLogoFullUrl()
    {
        return 'https://www.aviafox.com' . $this->getLogoUrl();
    }
        
    /**
     * @return string
     */
    public function getLogoHtml()
    {
        return '<img src="' . $this->getLogoUrl() . '" alt="' . 
                htmlspecialchars($this->logoAlt) . '" title="' . 
                htmlspecialchars($this->logoTitle) . '" />';
    }
    
}