<?php

namespace AloTech;

class Report
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
     * Get reports agent performance
     *
     * @param array $parameter [optional]
     *
     * @return array
     */
    public function agentPerf($parameter = null)
    {
        return $this->aloTech->request('reportsAgentPerf', $this->aloTech->getAuthentication()->getAppToken(), null, null, $parameter);
    }
}
