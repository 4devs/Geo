Getting Started With Geo Library
=================================

## Installation and usage

Installation and usage is a quick:

1. Download Locale using composer
2. Use the library


### Step 1: Download Locale library using composer

Add Locale library in your composer.json:

```json
{
    "require": {
        "fdevs/geo": "*"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update fdevs/geo
```

Composer will install the bundle to your project's `vendor/fdevs` directory.


### Step 2: Use the library

####Use with symfony form:

```php
<?php

require DIR . '/../vendor/autoload.php';

use FDevs\Geo\Form\Type\CoordinatesType;
use FDevs\Geo\Form\Type\PointType;

$formFactory = Forms::createFormFactoryBuilder()
    ->addType(new CoordinatesType())
    ->addType(new PointType())
    ->getFormFactory();
    
$form = $formFactory->createBuilder()
    ->add('coordinates', 'geo_point')
    ->getForm();

echo $twig->render('new.html.twig', array(
    'form' => $form->createView(),
));
```
