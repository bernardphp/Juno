Embedding
=========

Just as you can run Juno on its own, it is also possible to embed it into you application or run it side by side using
StackPHP.

StackPHP
--------

To run within StackPHP you need its ``url-map`` package. Now push Juno on to your map. Using StackPHP enables you to
embed it into any application that is build on ``HttpKernelInterface``. Thee applications includes Symfony, Laravel, 
Silex, Flint, Drupal and a bunch or others.

.. code-block:: php

    <?php

    $juno = Juno\create_application($debug = true);
    // Configure $juno here.

    $map = new Stack\UrlMap($myApp, array(
        '/_juno' => $juno,
    ));

    // Assuming $app contains your normal HttpKernel application.
    $map->handle();

Instead of doing the ``handle()`` call explicitly it is encouraged to use ``Stack\run`` which handles calling the right
events etc.

.. code-block:: php

    <?php

    use Stack\UrlMap;

    $map = new UrlMap($myApp, array(
        '/_juno', Juno\create_application($debug = true),
    ));

    Stack\run($map);

Within a Silex Application
--------------------------

Juno is written as ``ServiceProviderInterface`` and ``ControllerProviderInterface`` implementations. This lets you embed
it directly by using the service providers. The service provider uses the ``boot`` method to mount the controller provider.

.. code-block:: php

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

.. note

    When mounting a controller provider in silex it will always add a trailing slash. This will prohibit accessing
    ``/_juno``. To fix this a simple get route can be added to you application.

    .. code-block:: php

        <?php

        // $app is the configured application
        $app->get('/_juno', 'Juno\Controller\DefaultController::indexAction');
