<?php
namespace TP\API;

require __DIR__ . '/Client.php';

/**
 * @author carlos
 *
 */
abstract class Request
{

    /**
     * @var Client
     */
    private $client;
    
    /**
     * @var boolean
     */
    private $isDebug = FALSE;
    
    /**
     * @var string
     */
    protected $url;    

    /**
     * Set request to debug mode
     * 
     * @return self
     */
    public function debug()
    {
        $this->isDebug = TRUE;
        
        return $this;
    }
    
    /**
     * @return Response
     */
    public function send()
    {
        $client = new Client();
        $json = $client->get($this->getUrl());
        
        if ($this->isDebug)
        {
            $client->dump($json);
//            exit;
        }
        
        $response = $this->createResponse();
        $response->importJSON($json);
        
        if ($this->isDebug)
        {
            $client->dump($response);
            exit;
        }
        
        return $response;
    }
    
    /**
     * @return string
     */
    abstract protected function getUrl();
    
    /**
     * @return Response
     */
    abstract protected function createResponse();
    
    
}