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
            $file = str_replace('/', '\\', $file);
            $path = rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $file;

            if ($this->exists($path)) {
                return $path;
            }
        }

        throw new InvalidArgumentException('Could not locate "' . $file . '" in "' . json_encode($this->paths) . '"');
    }

    public function render($file, array $values = array())
    {
        return strtr(file_get_contents($this->locate($file)), $values);
    }

    protected function exists($path)
    {
        return is_file($path);
    }
}
