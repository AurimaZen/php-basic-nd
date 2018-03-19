<?php
class Ps4Autoloader
{
    private $rules = [];

    public function add(string $prefix, string $path): self
    {
        $this->rules[] = ['prefix' => $prefix, 'path' => $path];

        return $this;
    }

    public function register()
    {
        // TODO: implement this

        spl_autoload_register(function ($class) {

            // kelias= return iš add funkcijos
             $path = $this->rules['path'];

            // tikriname, ar turi prefiksa
            $len = strlen($prefix);
            if (strncmp($prefix, $class, $len) !== 0) {
                // jei ne, baigti
                return;
            }
            // gauti relative klases pavadinima
            $relative_class = substr($class, $len);

            // pakeisti namespace prefiksa i pagrindine direktorija, pakeisti namespace
            // skirtukus su direktoriju skirtukais in the relativ klases pavadinime,
            // pridedame .php
            $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

            // jei failas egzistuoja, reikalaujame
            if (file_exists($file)) {
                require $file;
            }
        });
    }
}
$autoloader = new Ps4Autoloader();
$autoloader
    ->add('Nfq\\Academy\\Homework\\', __DIR__.'/src/')
    ->register();
