Juno
====

__NOT READY YET__

Wife of Zeus. A very nagging, distrustful and monitoring wife.

Juno provides a web interface for monitoring [Raekke](http://github.com/henrikbjorn/Raekke) and its redis server(s).
Juno is built ontop of Flint but can be used standalone by including the service provider and routing into your own application.

Embedding into other Applications
---------------------------------

1. Add `henrikbjorn/juno` to you composer file.
2. Register `Juno\Provider\JunoServiceProvider` as a ServiceProvider on you application.
3. If using the controller provier make sure `Silex\Provider\ServiceControllerServiceProvider` is enabled.
3. Register `Juno\Provider\JunoControllerProvider` or add `src/Juno/Resources/config/routing.xml` in your routing file (if using Flint). Remember
   to give it a prefix like `/juno` when registering either.
