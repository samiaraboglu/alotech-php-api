<?php

namespace AloTech;

class Recording
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
     * Get recording info
     *
     * @param array $parameter
     */
    public function info($callKey)
    {
        return $this->aloTech->request('recordinginfo', $this->aloTech->getAuthentication()->getAppToken(), null, null, [
            'callkey' => $callKey
        ]);
    }
}
