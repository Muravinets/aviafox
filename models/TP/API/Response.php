<?php

namespace TP\API;

abstract class Response
{

    /**
     * @var Request;
     */
    protected $request;
    
    /**
     * @param json $data
     */
    abstract public function importJSON($data);
    
    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
}