# Twig integration in Jarvis micro framework

## Installation

you need to install it using composer and then be sure that this configuration 
is available when Jarvis Application is started:

```php
<?php

require_once __DIR__.'/vendor/autoload.php';

$jarvis = new Jarvis\Jarvis([
    'container_provider' => [
        'Jarvis\Skill\Twig\ContainerProvider',
    ],
    'twig' => [
        'templates_paths' => '/path/to/templates',
    ],
]);
```

Note that `templates_paths` is a required parameter. This skill changes default values for some options:

- `debug`: if not provided, this value take the value of Jarvis `debug` parameter.
- `auto_reload`: this is setted to `true` as default value in this skill.
- `strict_variables`: this option is also setted to `true` by default.

You can see complete options list on [Twig documentation](http://twig.sensiolabs.org/doc/api.html#environment-options).

```php
<?php

require_once('./../vendor/autoload.php');
require_once('./../config.php');

use Jarvis\Jarvis;
/* ... */

$jarvis->router->addRoute('get', '/', function ($jarvis) {
    return $jarvis->twig->render('index.twig', ['world' => 'World']);
});

$response = $jarvis->analyze();

$response->send();
```
