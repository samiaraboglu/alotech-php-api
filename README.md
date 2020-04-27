# alotech-php-api

[![Latest Stable Version](https://poser.pugx.org/samiaraboglu/alotech-php-api/v/stable)](https://packagist.org/packages/samiaraboglu/alotech-php-api)
[![Total Downloads](https://poser.pugx.org/samiaraboglu/alotech-php-api/downloads)](https://packagist.org/packages/samiaraboglu/alotech-php-api)
[![License](https://poser.pugx.org/samiaraboglu/alotech-php-api/license)](https://packagist.org/packages/samiaraboglu/alotech-php-api)

- [AloTech Official Documentation](https://alotech.atlassian.net/wiki/spaces/PA1/overview)
- [Bundle for Symfony](https://github.com/samiaraboglu/alotech-api-bundle)

### Installing

Via composer
```
$ composer require samiaraboglu/alotech-php-api
```

### Authentication
```php
$authentication = new AloTech\Authentication();
$authentication->setUsername('{USER_NAME}');
$authentication->setAppToken('{APP_TOKEN}');

$aloTech = new AloTech\AloTech($authentication);
```

### Ping
Test method to check API status and connectivity.
```php
$response = $aloTech->ping();
```

### Login
Set user session key.
```php
$aloTech->login('{EMAIL}');
```

### Click 2
Use click2 service.
```php
$click2 = new AloTech\Click2($aloTech);
```

#### Call
Used to trigger a call to given number.
```php
$click2->call([
    'phonenumber' => '{PHONE_NUMBER}',
    'hangup_url' => '{YOUR_HANGUP_URL}'
]);
```

#### Hang
Hangs up the active call of the agent.
```php
$click2->hang();
```

#### Hold
Holds the active call of the agent.
```php
$click2->hold();
```

#### Unhold
Unholds the active call of the agent.
```php
$click2->unhold();
```

### Report
Use report service.
```php
$report = new AloTech\Report($aloTech);
```

#### Agent Performance
Returns agent performance information for the given period.

```php
$report->agentPerf(
    '{Y-m-d}',          // Optional - DateTime Object
    '{Y-m-d}',          // Optional - DateTime Object
    '{AGENT}',          // Optional
    '{EMAIL}',          // Optional
    '{AGENTCUSTOMID}',  // Optional
    '{TEAM}'            // Optional
);
```
