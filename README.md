GulpRevBundle
=======================

The GulpRevBundle adds a simple twig filter for files revisioned with gulp-rev.

### Download and install GulpRevBundle

To install GulpRevBundle run the following command:

``` bash
$ php composer.phar require sayme/gulp-rev-bundle
```

### Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Sayme\GulpRevBundle\SaymeGulpRevBundle(),
    );
}
```

### Changing the manifest_path and build_directory

Below are the default settings. You can change them to whatever you prefer.

``` yaml
# app/config/config.yml

sayme_gulp_rev:
    manifest_path: "%kernel.root_dir%/Resources/rev-manifest.json"
    build_dir: "build"
```

### Usage

Add the asset_rev filter to your twig asssets.

```
<script src="{{ asset('js/app.js'|asset_rev) }}"></script>
```