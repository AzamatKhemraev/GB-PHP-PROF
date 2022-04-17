<?php
namespace app\engine;

class Autoload
{
    public function nameSpaceReplacer($className) {
        return str_replace(
            '\\',
             '/',
             preg_replace('/^app/', '..', $className)
            );
    }

    public function loadClass($className)
    {
        $fileName = $this->nameSpaceReplacer($className) . '.php';
        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}
