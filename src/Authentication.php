<?php

namespace AloTech;

Class Authentication
{
    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $appToken;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var Session
     */
    protected $session;

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set appToken
     *
     * @param string $appToken
     */
    public function setAppToken($appToken)
    {
        $this->appToken = $appToken;
    }
    /**
     * Get appToken
     *
     * @return string
     */
    public function getAppToken()
    {
        return $this->appToken;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set session
     *
     * @param string $session
     */
    public function setSession($session)
    {
        $this->session = $session;
    }
    /**
     * Get session
     *
     * @return string
     */
    public function getSession()
    {
        return $this->session;
    }
}
