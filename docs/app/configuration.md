# Configuration

The configuration files are located at `/confg`.

Bones app configuration documentation can be found [here](https://github.com/bayfrontmedia/bones/blob/master/docs/usage/config.md).

- [App](#app)
- [Router](#router)
- [Veil](#veil)
- [Web app](#web-app)

## App

The `app.php` file includes [configuration required by Bones](https://github.com/bayfrontmedia/bones/blob/master/docs/usage/config.md).

In addition, this file also contains the following keys:

```php
[
    'version' => '1.0.0' // Current app version (string)
]
```

## Router

The config file `router.php` exists for the [Router service](https://github.com/bayfrontmedia/bones/blob/master/docs/services/router.md).

## Veil

The config file `veil.php` exists for the [Veil service](https://github.com/bayfrontmedia/bones/blob/master/docs/services/veil.md).

## Web app

The config file `webapp.php` exists for the Bones [web app service](https://github.com/bayfrontmedia/bones-service-webapp).