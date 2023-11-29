<?php

namespace AloTech;

class AloTech
{
    const API_URL = 'https://{username}.alo-tech.com/api';

    const TYPE_GET = 'GET';

    /**
     * @var Authentication
     */
    protected $authentication;

    /**
     * @var setEndpoint
     */
    protected $endpoint;

    /**
     * @var services
     */
    protected $services;

    /**
     * Constructor
     *
     * @param Config $authentication
     */
    public function __construct(Authentication $authentication)
    {
        $this->authentication = $authentication;
    }

    /**
     * Set authentication
     *
     * @param Authentication $authentication
     */
    public function setAuthentication($authentication)
    {
        $this->authentication = $authentication;
    }

    /**
     * Get authentication
     *
     * @return Authentication
     */
    public function getAuthentication()
    {
        return $this->authentication;
    }

    /**
     * Set endpoint
     *
     * @param string $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * Get endpoint
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Login by email
     *
     * @param string $email
     *
     * @return bool
     */
    public function login($email)
    {
        $this->authentication->setEmail($email);

        $response = $this->request('login', $this->authentication->getAppToken(), $this->authentication->getEmail());

        if ($response['login'] == false) {
            throw new \Exception($response['message']);
        }

        $this->authentication->setSession($response['session']);

        return true;
    }

    /**
     * Ping to api
     *
     * @return array
     */
    public function ping()
    {
        return $this->request('ping', $this->authentication->getAppToken());
    }

    /**
     * Is json
     *
     * @param string $string
     *
     * @return bool
     */
    public function isJson($string) {
        json_decode($string);

        return (json_last_error() == JSON_ERROR_NONE);
    }

    /**
     * Request to AloTech API
     *
     * @param string $function
     * @param array  $body Body
     * @param string $type Request type (POST)
     *
     * @return array
     */
    public function request($function, $appToken = null, $email = null, $session = null, $params = [], $type = self::TYPE_GET)
    {
        $params['function'] = $function;

        if ($appToken) {
            $params['app_token'] = $appToken;
        }

        if ($email) {
            $params['email'] = $email;
        }

        if ($session) {
            $params['session'] = $session;
        }

        $url = str_replace('{username}', $this->authentication->getUsername(), self::API_URL);

        if ($type == self::TYPE_GET) {
            $url .=  '/?' . http_build_query($params);
        }

        $this->setEndpoint($url);

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        if (!$response) {
            throw new \Exception("Not get response");
        }

        if (!$this->isJson($response)) {
            throw new \Exception($response);
        }

        curl_close($curl);

        if ($error) {
            throw new \Exception("cURL Error #:" . $error);
        }

        return json_decode($response, true);
    }

    /**
     * Populate service
     *
     * @param string $name Service name
     *
     * @return object
     */
    public function __get($name)
    {
        if (!in_array($name, ['click2', 'recording', 'report'])) {
            $trace = debug_backtrace();
            throw new \Exception(sprintf('Undefined property via __get(): %s in %s on line %u', $name, $trace[0]['file'], $trace[0]['line']));
        }

        if (isset($this->services[$name])) {
            return $this->services[$name];
        }

        $serviceName = sprintf('%s\\%s', __NAMESPACE__, ucfirst($name));

        $this->services[$name] = new $serviceName($this);

        return $this->services[$name];
    }
}
