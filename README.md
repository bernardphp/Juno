Juno
====

Juno is a small web application build in Silex and AngularJS. It provides a nice interface for introspection
and monitoring of Bernard.

It can be run as a single application or it can be embedded Silex through a Service Provider. Also i can be wrapped
with StackPHP and be pseudu embedded. You can read more about [StackPHP here](http://stackphp.com).

Installing
----------

As all other appliations in the PHP world Juno is installed through Composer. Composer will handle autoloading
and package dependency resolvement.

``` bash
composer require bernard/juno:~2.0@dev
```

To run Juno on its own just install it with Composer and create a front controller. Juno provides a function that
bootstraps the application. As the function returns the instance it is possible to do any configuration at this point.


Now copy the frontend resources in to a folder that lets `/juno/app.js` be found. Assuming we use `web` as the document
root this will look like this. Also you can do a symlink.

``` bash
$ cp -R vendor/bernard/juno/web/juno web/juno
```

### Single Application

``` php
<?php

// my_front_controller.php

$app = Juno\create_application($debug = true);

// do some configuration here with $app

$app->run();
```

### StackPHP

To run within StackPHP you need its `url-map` package. Now push Juno on to your map. Using StackPHP enables you to
embed it into any application that is build on `HttpKernelInterface`. Thee applications includes Symfony, Laravel, 
Silex, Flint, Drupal and a bunch or others.

``` php

use Stack\UrlMap;

$juno = Juno\create_application($debug = true);
// Configure $juno here.

$map = new UrlMap($myApp, array(
    '/_juno' => $juno,
));

// Assuming $app contains your normal HttpKernel application.
$map->handle();
```

Instead of doing the `handle()` call explicitly it is encouraged to use `Stack\run` which handles calling the right
events etc.

``` php
<?php

use Stack\UrlMap;

$map = new UrlMap($myApp, array(
    '/_juno', Juno\create_application($debug = true),
));

Stack\run($map);
```

### Within a Silex Application

Juno is written as `ServiceProviderInterface` and `ControllerProviderInterface` implementations. This lets you embed
it directly by using the service providers. The service provider uses the `boot` method to mount the controller provider.

``` php
<?php

use Silex\Application;
use Juno\Provider\JunoServiceProvider);
use Bernard\Silex\BernardServiceProvider;

$app = new Silex\Applcation(array('debug' => true));
$app->register(new BernardServiceProvider);
$app->register(new JunoServiceProvider, array(
    'juno.mount_prefix' => '/_juno',
));
$app->run();
```

