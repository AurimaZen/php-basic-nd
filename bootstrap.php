<?php
class Ps4Autoloader
{
    private $rules = [];

    public function add(string $prefix, string $path): self
    {
        // sukurti nauja prefixa ir kaip reiksme nustatyti jo $path
        $this->rules[$prefix] = $path;
        return $this;
    }

    public function register()
    {
        spl_autoload_register(function ($class) {

            foreach($this->rules as $prefix => $path) {

                $len = strlen($prefix);
                if (strncmp($prefix, $class, $len) !== 0) {
                    //jei nesutampa klases, nutraukti
                    return;
                }

                // gauti relative klases pavadinima
                $relative_class = substr($class, $len);


                $file = $path . str_replace('\\', '/', $relative_class) . '.php';

                if (file_exists($file)) {
                    require $file;
                }
            }

    });
    }
}
$autoloader = new Ps4Autoloader();
$autoloader
    ->add('Nfq\\Academy\\Homework\\', __DIR__.'/src/')
    //->add('PHP-basic-nd\\Understand\\howitworks\\', __DIR__.'/src/subsrc/thisisit/')
    ->register();
