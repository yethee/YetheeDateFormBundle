# DateFormBundle

This bundle fixed issue with timezone **Europe/Moscow** for `date` and `datetime` form types, 
when used ICU < 54.1.

See this [issue](https://github.com/symfony/symfony/issues/13848) for details.

## Installation

Open a command console, enter your project directory and execute the following command 
to download the latest stable version of this bundle:

```bash
$ composer require yethee/date-form-bundle
```

Then, enable the bundle by adding the following line in the app/AppKernel.php file of your project:

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Yethee\DateFormBundle\YetheeDateFormBundle(),
    );
}
```
