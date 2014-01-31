<?php

namespace Juno;

use InvalidArgumentException;

class TemplateLocator
{
    protected $paths;

    public function __construct(array $paths)
    {
        $this->paths = $paths;
    }

    public function add($path)
    {
        array_unshift($this->paths, $path);
    }

    public function locate($file)
    {
        foreach ($this->paths as $path) {
            $path = $path . '/' . $file;

            if (is_file($path)) {
                return $path;
            }
        }

        throw new InvalidArgumentException('Could not locate "' . $file . '" in "' . json_encode($this->paths) . '"');
    }
}
