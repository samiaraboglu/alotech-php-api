<?php

namespace AloTech;

class Click2
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
     * Click 2 Call
     *
     * @param array $parameter
     */
    public function call($parameter)
    {
        return $this->aloTech->request('click2call', null, null, $this->aloTech->getAuthentication()->getSession(), $parameter);
    }

    /**
     * Click 2 Hang
     */
    public function hang()
    {
        return $this->aloTech->request('click2hang', null, null, $this->aloTech->getAuthentication()->getSession());
    }

    /**
     * Click 2 Hold
     */
    public function hold()
    {
        return $this->aloTech->request('click2hold', null, null, $this->aloTech->getAuthentication()->getSession());
    }
}
