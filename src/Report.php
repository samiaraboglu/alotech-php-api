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
     * @param DateTime $startDate [optional]
     * @param DateTime $finishDate [optional]
     * @param string $agent [optional]
     * @param string $email [optional]
     * @param int $agentCustomId [optional]
     * @param string $team [optional]
     *
     * @return array
     */
    public function agentPerf(\DateTime $startDate = null, \DateTime $finishDate = null, $agent = null, $email = null, $agentCustomId = null, $team = null)
    {
        return $this->aloTech->request('reportsAgentPerf', $this->aloTech->getAuthentication()->getAppToken(), null, null, [
            'startdate' => $startDate ? $startDate->format('Y-m-d') : null,
            'finishdate' => $finishDate ? $finishDate->format('Y-m-d') : null,
            'agent' => $agent,
            'email' => $email,
            'agentcustomId' => $agentCustomId,
            'team' => $team,
        ]);
    }
}
