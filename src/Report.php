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
     * @param DateTime $startdate [optional]
     * @param DateTime $finishdate [optional]
     * @param string $agent [optional]
     * @param string $email [optional]
     * @param int $agentcustomid [optional]
     * @param string $team [optional]
     *
     * @return array
     */
    public function agentPerf(\DateTime $startdate = null, \DateTime $finishdate = null, $agent = null, $email = null, $agentcustomid = null, $team = null)
    {
        return $this->aloTech->request('reportsAgentPerf', $this->aloTech->getAuthentication()->getAppToken(), null, null, [
            'startdate' => $startdate->format('Y-m-d'),
            'finishdate' => $finishdate->format('Y-m-d'),
            'agent' => $agent,
            'email' => $email,
            'agentcustomid' => $agentcustomid,
            'team' => $team,
        ]);
    }
}
