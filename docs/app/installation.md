# Installation

These instructions are for the initial installation of this application.

- [Create project](#create-project)
- [Define environment variables](#define-environment-variables)
- [Configure the app](#configure-the-app)
- [Set file permissions](#set-file-permissions)
- [Deployment](#deployment)

## Create project

```shell
composer create-project bayfrontmedia/bones-web PROJECT_NAME
cd PROJECT_NAME
npm install
```

## Define environment variables

Rename `.env.example` to `.env` and update. ([See docs](https://github.com/bayfrontmedia/bones/blob/master/docs/install/manual.md#add-required-environment-variables))

> **NOTE:** Be sure to define a cryptographically secure app key for the APP_KEY variable.

Once Bones is installed, you can use the `php bones install:key` command to replace `SECURE_APP_KEY` with a valid key,
or you can use the `php bones make:key` command to generate a key you can define manually.

## Configure the app

Update all configuration files at `config/*.php` as needed. ([See configuration](configuration.md))

### Set file permissions

The web server must have write permissions to the `storage/app` directory.
Typically, this is done by granting the `www-data` group ownership and write access:

```shell
chgrp -R www-data /path/to/storage/app
chmod -R 775 /path/to/storage/app
```

## Deployment

### Self-hosted

Self-hosted deployment can be handled with the `deploy:app` [console command](console.md#deployapp).

### DigitalOcean

To deploy to DigitalOcean app platform:

[![Deploy to DO](https://www.deploytodo.com/do-btn-blue.svg)](https://cloud.digitalocean.com/apps/new?repo=https://github.com/bayfrontmedia/bones-web/tree/master&refcode=7e41d0ac1ab5)

When deploying to DigitalOcean, be sure to update the environment variables in `.do/deploy.template.yaml`
and encrypt the `APP_KEY` and applicable `DB_*` values.