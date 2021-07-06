# Intervention Image Bundle
~~A **very simple** Symfony Bundle that wraps around the [Intervention Image](http://image.intervention.io) ImageManager.~~

## Deprecated bundle
**This bundle will no longer be updated**. It didn't provide much to begin with,
and with symfony nowadays it can be replaced with a simple service configuration
following these instructions:

### Install:
```
composer require intervention/image
```

### Config:
```
services:
    ...
    Intervention\Image\ImageManager:
        arguments:
            - driver: gd # or imagick
```

```PHP
use Intervention\Image\ImageManager;

public function __construct(ImageManager $manager)
{
    $image = $manager->make('public/foo.jpg')->resize(300, 200);
    ...
}
```

