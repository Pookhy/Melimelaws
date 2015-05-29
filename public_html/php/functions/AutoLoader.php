<?php

class AutoLoader
{
    public $prefix = array();

    public function register()
    {
        spl_autoload_register(array($this, "loadClass"));
    }

    public function loadClass($className)
    {
        $prefix = $className;
        while (false !== $pos = strrpos($prefix, "\\")) {
            $prefix = substr($className, 0, $pos + 1);

            // the rest is the relative class name
            $relative_class = substr($className, $pos + 1);

            // try to load a mapped file for the prefix and relative class
            $mapped_file = $this->loadMappedFile($prefix, $relative_class);
            echo $mapped_file;
            if ($mapped_file) {
                echo $mapped_file;
                return $mapped_file;
            }

            // remove the trailing namespace separator for the next iteration
            // of strrpos()
            $prefix = rtrim($prefix, '\\');
        }

        // never found a mapped file
        return false;
    }

    protected function loadMappedFile($prefix, $relative_class)
    {
        // are there any base directories for this namespace prefix?
        if (isset($this->prefix[$prefix]) === false) {
            return false;
        }

        // look through base directories for this namespace prefix
        foreach ($this->prefix[$prefix] as $base_dir) {

            // replace the namespace prefix with the base directory,
            // replace namespace separators with directory separators
            // in the relative class name, append with .php
            $file = $base_dir
                    . str_replace('\\', '/', $relative_class)
                    . '.php';
            // if the mapped file exists, require it
            if ($this->requireFile($file)) {
                // yes, we're done
                echo "in";
                return $file;
            }
        }

        // never found it
        return false;
    }

    public function addNamespace($prefix, $base_dir, $prepend = false)
    {
        // normalize namespace prefix
        $prefix = trim($prefix, '\\') . '\\';

        // normalize the base directory with a trailing separator
        $base_dir = rtrim($base_dir, DIRECTORY_SEPARATOR) . '/';

        // initialize the namespace prefix array
        if (isset($this->prefix[$prefix]) === false) {
            $this->prefix[$prefix] = array();
        }

        // retain the base directory for the namespace prefix
        if ($prepend) {
            array_unshift($this->prefix[$prefix], $base_dir);
        } else {
            array_push($this->prefix[$prefix], $base_dir);
        }
    }

    protected function requireFile($file)
    {
//        if (file_exists($file)) {
            require $file;
//            return true;
//        }
//        return false;
    }

}
