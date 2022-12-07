PHP copo renderer
=====================

Introduction
------------

In package hopocode/copo-renderer you will be able to render html from specification.

Installation
------------

The recommended way to install is via Composer:

```
composer require hopocode/copo-renderer
```

Test case is available at https://raw.githubusercontent.com/hopocode/component-renderer-out/main/list.json

Basic example
-------------
```php

$html = CapoRender::specFileToHtml("https://raw.githubusercontent.com/hopocode/component-renderer-out/main/src/hello-world.json");

echo $html; // will render: <h1>Hello world</h1>



```