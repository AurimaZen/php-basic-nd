# php-basic-nd
Užduotis:
Implementuoti Psr4Autoloader klasę, kad būtų galimas žemiau parodytas panaudojimas
$autoloader = new Ps4Autoloader();
$autoloader
    ->add('Nfq\\Academy\\Homework\\', __DIR__.'/src/')
    ->register();
