# Raindrop GeoIp Bundle #

[![Build Status](https://travis-ci.org/raindropdevs/RaindropGeoipBundle.png?branch=master)](https://travis-ci.org/raindropdevs/RaindropGeoipBundle)

To install this bundle please follow the next steps:

First add the dependency to your `composer.json` file:

    "require": {
        ...
        "raindrop/geoip-bundle": "dev-master"
    },

Then install the bundle with the command:

    php composer.phar update

Enable the bundle in your application kernel:

    <?php
    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Raindrop\GeoipBundle\RaindropGeoipBundle(),
        );
    }

Now the bundle is enabled.

This bundle use Maxmind[1] data source file (in '.dat' format).

You can get the Maxmind data source file simply executing this command:

    php app/console raindrop:geoip:update-data %url-data-source%

Replace %url-data-source% with the url of the needed data source.
ex: http://geolite.maxmind.com/download/geoip/database/GeoLiteCity.dat.gz

Now can use the Raindrop GeoIp Bundle everywhere in your Symfony2 application.

You can lookup an IP address with:

    $geoip = $this->get('raindrop.geoip')->lookup(%IP_ADDR%);

and these are the available methods:

    $geoip->getCountryCode();
    $geoip->getCountryCode3();
    $geoip->getCountryName();
    $geoip->getRegion();
    $geoip->getCity();
    $geoip->getPostalCode();
    $geoip->getLatitude();
    $geoip->getLongitude();
    $geoip->getAreaCode();
    $geoip->getMetroCode();
    $geoip->getContinentCode();

This library is an import of [Maxmind GeoIp Free Library][1].

[1]: http://www.maxmind.com/