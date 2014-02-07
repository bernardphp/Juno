Extending
=========

As each Bernard installiation can use custom middleware that could collect statistics and so on. It is important
that theese can be shown in Juno.

Templates
---------

Juno uses twig for templating this makes it easy to override. All templates used by Juno are under the ``Juno`` namespace.
This means accessing a template would be ``@Juno/queue.html.twig``.

``src/Resources/views/base.html.twig`` contains the layout with its blocks used by Juno. This includes the layout and
different blocks. To override using this create a new ``layout.html.twig`` file and extend ``@Juno/base.html.twig``.

.. code-block:: jinja

    {% extends '@Juno/base.html.twig' %}

    {% block stylesheets %}
        <style>.navbar-default{background:pink}</style>
    {% endblock %}

Remember to prepend you new path to twigs file loader so it will be checked before the standard templates.
This is done by extending the service.

.. code-block:: php

    <?php

    $app['twig.loader.filesystem'] = $app->share($app->extend('twig.loader.filesystem', function ($loader) {
        $loader->prependPath('/my/override/dir', 'Juno');

        return $loader;
    }));

For a list of templates look in ``src/Resources/views`` where the also the templates used for Angular can be found.

Blocks
~~~~~~

Everything in the layout is defined as blocks to make it easy to override. Also it is possible to turn specific stuff
off such as the "Fork me on GitHub!" ribbon.

Here is a `layout.html.twig` template which overrides all the blocks

.. code-block:: jinja

    {% extends '@Juno/base.html.twig' %}

    {% block ribbon '' %}

    {% block title 'Not Juno' %}

    {% block stylesheets %}
        {{ parent() }}

        {# additional style includes #}
    {% endblock %}

    {% block javascripts %}
        {{ parent() }}

        {# additional script includes #}
    {% endblock %}

..
