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
     * Get mobile
     *
     * @return string
     */
    public function call($mobile)
    {
        return $this->aloTech->request('click2call', null, null, $this->aloTech->getAuthentication()->getSession(), [
            'phonenumber' => $mobile
        ]);
    }
}
