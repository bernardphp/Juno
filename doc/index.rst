Juno
====

Juno is a small web application build in Silex and AngularJS. It provides a nice interface for introspection
and monitoring of Bernard.

It can be run as a single application or it can be embedded Silex through a Service Provider. Also i can be wrapped
with StackPHP and be pseudu embedded. You can read more about `StackPHP here <http://stackphp.com>`_.

Installing
----------

As all other appliations in the PHP world Juno is installed through Composer. Composer will handle autoloading
and package dependency resolvement.

.. code-block:: bash

    composer require bernard/juno:~1.0

To run Juno on its own just install it with Composer and create a front controller. Juno provides a function that
bootstraps the application. As the function returns the instance it is possible to do any configuration at this point.

.. code-block:: php

    <?php

    $app = Juno\create_application($debug = true);

Now copy the frontend resources in to a folder that lets ``/juno/app.js`` be found. Assuming we use ``web`` as the document
root this will look like this. Also you can do a symlink.

.. code-block:: bash

    $ cp -R vendor/bernard/juno/src/Resources/public web/juno
