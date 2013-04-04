<?php

namespace Raindrop\GeoipBundle\Tests\Command;

use Raindrop\GeoipBundle\Command\LoadDataCommand;

/**
 * Test of LoadDataCommand Calss
 *
 */
class LoadDataCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        parent::setUp();

        $this->mockOutput = $this->getMockBuilder('Symfony\Component\Console\Output\Output')
            ->setMethods(array('doWrite'))
            ->disableOriginalConstructor()
            ->getMock();

        $this->mockInput = $this->getMockBuilder('Symfony\Component\Console\Input\ArgvInput')
            ->disableOriginalConstructor()
            ->getMock();         
        
        $this->mockOutputFormatter = $this->getMockBuilder('Symfony\Component\Console\Formatter\OutputFormatter')
            ->disableOriginalConstructor()
            ->getMock();         

        $this->command = new LoadDataCommand();
    }
    
    /**
     * Test configure()
     */
    public function testConfigure()
    {
        $this->assertEquals('raindrop:geoip:update-data', $this->command->getName());
    } 
    
    /**
     * Test execute()
     */
    public function testExecute()
    {        
        $this->mockOutput->setFormatter($this->mockOutputFormatter);
        
        $this->mockInput->expects($this->once())
                ->method('getArgument')
                ->with('source')
                ->will($this->returnValue(__DIR__ . '/../Fixtures/GeoIP.dat.gz'));
        
        $this->command->run($this->mockInput, $this->mockOutput);
        $this->assertTrue(file_exists(__DIR__ . '/../../Resources/data/GeoIP.dat'));
    }  
}
