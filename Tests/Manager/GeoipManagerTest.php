<?php

namespace Raindrop\GeoipBundle\Tests\Manager;

use Raindrop\GeoipBundle\Manager\GeoipManager;

/**
 * Tests of GeoipManager Class
 *
 */
class GeoipManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testLookup()
    {
        $geoip = new GeoipManager();
        
        $lookup = $geoip->lookup('8.8.8.8');
        $this->assertInstanceOf('Raindrop\GeoipBundle\Manager\GeoipManager', $lookup);
    }
    
    public function testLookupFails()
    {
        $geoip = new GeoipManager();
        
        $lookup = $geoip->lookup('127.0.0.1');
        $this->assertFalse($lookup);
        
        // bad ip
        $lookup = $geoip->lookup('1.2');
        $this->assertFalse($lookup);
    }
    
    public function testGetCountryCode()
    {
        $geoip = new GeoipManager();
        
        $lookup = $geoip->lookup('8.8.8.8');
        $countryCode = $lookup->getCountryCode();
        $this->assertEquals($countryCode, 'US');
    }
    
    public function testGetCountryCodeFails()
    {
        $geoip = new GeoipManager();
        
        $countryCode = $geoip->getCountryCode('127.0.0.1');
        $this->assertNull($countryCode);
        
        $countryCode = $geoip->getCountryCode(null);
        $this->assertNull($countryCode);
    }
}
