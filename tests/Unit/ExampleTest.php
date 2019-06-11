<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\UtilsTesteController;

class ExampleTest extends TestCase
{
	

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    // public function testRotaProdutos()
    // {
    // 	$response = $this->get('/login');
    // 	$response->assertStatus('404');
    // }


    public function testNumerosRomanosExatos()
    {
    	$utils = new UtilsTesteController();
    	$actual = $utils->intForRomano(5);
    	$expected = 'V';
    	$this->assertEquals($expected,$actual);
    }


    public function testInverterData()
    {
    	$utils = new UtilsTesteController();
    	$actual = $utils->inverterData('1981-10-07', '-', '/');
    	$this->assertEquals('07/10/1981',$actual);
    }


    public function testInverterDataHora()
    {
    	$utils = new UtilsTesteController();
    	$actual = $utils->inverterData('1981-10-07 09:00:00', '-', '/');
    	$this->assertEquals('07/10/1981 09:00:00',$actual);
    }


    public function testInverterDataHoraEmpty()
    {
    	$utils = new UtilsTesteController();
    	//$this->expectException(\ErrorException::class);

    	$actual = $utils->inverterData('');
    	$this->assertEmpty($actual);


    }

    // public function testInverterDataHoraException()
    // {
    // 	$utils = new UtilsTesteController();
    // 	// nesse caso estou falando qual erro que vai dar e espero abaixo
    // 	$this->expectException(\ErrorException::class); 

    // 	$actual = $utils->inverterData('');
    // 	//$this->assertEmpty($actual);
    // }


}
