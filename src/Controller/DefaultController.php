<?php

namespace Juno\Controller;

class DefaultController
{
    public function indexAction()
    {
        return trim(file_get_contents(__FILE__, null, null, __COMPILER_HALT_OFFSET__));
    }
}

__halt_compiler();

<html>
    <head>
        <title>Juno</title>
    </head>

    <body>
        <p>Velkommen til Juno</p>
    </body>
</html>
