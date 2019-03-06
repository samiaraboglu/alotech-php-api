<?php

namespace AloTech;

class Click2Call
{
    /**
     * @var AloTech
     */
    protected $aloTech;

    /**
     * Constructor
     *
     * @param Config $aloTech
     */
    public function __construct(AloTech $aloTech)
    {
        $this->aloTech = $aloTech;
    }

    /**
     * Call
     *
     * @return array $parameter
     */
    public function call($parameter)
    {
        return $this->aloTech->request('click2call', null, null, $this->aloTech->getAuthentication()->getSession(), $parameter);
    }
}
