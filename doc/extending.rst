Extending
=========

As each Bernard installiation can use custom middleware that could collect statistics and so on. It is important
that theese can be shown in Juno.

Overriding templates
--------------------

Juno uses twig for templating this makes it easy to override. All templates used by Juno are under the ``Juno`` namespace.
This means accessing a template would be ``@Juno/queue.html.twig``.

``src/Resources/views/blocks.html.twig`` contains the blocks used by Juno. This includes the layout and different blocks.
To override using this create a new ``layout.html.twig`` file and include the blocks template file. Just remember
to add you override path to the twig loader.
