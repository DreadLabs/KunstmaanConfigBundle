# Kunstmaan CMS Configuration Bundle

Provide streamlined configuration for a Kunstmaan CMS application.

## What does it do?

  1. Compiler passes

     - `kunstmaan_media.filesystem_adapter` - Allow re-configuration of the path according to the integrated `LiipImagineBundle`

## Installation

    composer require dreadlabs/kunstmaan-config-bundle:*

## How to activate?

Add the bundle to your `AppKernel`:

    // ...
    new DreadLabs\KunstmaanConfigBundle\DreadLabsKunstmaanConfigBundle(),
    // ...

Add the following configuration keys to your `parameters.yml.dist`:

    liipimagine_webroot: '%kernel.root_dir%/../web'

Configure the default resolver in the `liip_imagine` configuration in `app/config/config.yml`:

    liip_imagine:
        resolvers:
            default:
                web_path:
                    web_root: '%liipimagine_webroot%'

Add the `loaders` section to the `liip_imagine` configuration section in `app/config/config.yml`:


    liip_imagine:

        // ...

        loaders:
            default:
                filesystem:
                    data_root: '%liipimagine_webroot%'
