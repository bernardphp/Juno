Juno
====

Wife of Zeus. A very nagging, distrustful and monitoring wife.

Juno provides a web interface for monitoring [Kø](http://unreleased) and its redis server(s). Juno is built ontop of Flint but can be used standalone
by including the service provider and routing into your own application.

If you do not want to have Flint installed as a dependency you can add the following to your composer.json file and it will be excluded.

``` json
{
    "replace" : {
        "henrikbjorn/flint" : "*"
    }
}
```
