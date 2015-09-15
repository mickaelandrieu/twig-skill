# Twig integration in Jarvis micro framework

## Installation

you need to install it using composer and then be sure that this configuration 
is available when Jarvis Application is started:

```php
<?php
/* config.php */
const TWIG_CONFIG = [
    'templates_path' => __DIR__.'/views'
];
```

For instance, you can create a ``config.php`` file at the root of your project and then
require or include it in your front controller.


```php
<?php

require_once('./vendor/autoload.php');
require_once('./config.php');

use Jarvis\Jarvis;
/* ... */

$jarvis->router->addRoute('get', '/', function ($jarvis) {
    return $jarvis->twig->render('index.twig', ['world' => 'World']);
});

$response = $jarvis->analyze();

$response->send();
```
