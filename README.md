# alotech-php-api

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

### Click 2 Call
Used to trigger a call to given number.
```php
$click2Call = new AloTech\Click2Call($aloTech);
$click2Call->call('{PHONE_NUMBER}');
```