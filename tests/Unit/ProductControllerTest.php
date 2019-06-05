<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class ProductControllerTest extends TestCase
{
	use WithoutMiddleware;

    public function testBuscarProdutos()
    {
//    	dd(env('APP_ENV'));
    	$response = $this->json('GET', '/api/products');
    	//$response = $this->actingAs(['email' => 'user@user.com', 'password' => 'secret'])->get('/api/produtos');
    	$response->assertStatus(200);
    }


    public function testBuscarProdutosPorId()
    {
    	$response = $this->json('GET', '/api/products/16');
    	$response->assertStatus(200);
    }


    public function testCreateProduto()
    {
    	$response = $this->json('POST', '/api/products',[
    		'name' 			=> 'teste agora',
    		'description' 	=> 'agora vai',
    		'price' 		=> '11.99'
    	]);
    	$response->assertStatus(201);
    }


    public function testEditProduto()
    {
    	$response = $this->json('POST', '/api/products/16',[
    		'_method' 		=> 'PUT',
    		'name' 			=> 'teste agora editando',
    		'description' 	=> 'agora vai',
    		'price' 		=> '99.99'
    	]);
    	$response->assertStatus(201);
    }


    public function testDeleteProduto()
    {
    	$response = $this->json('POST','/api/products/17',[
    		'_method'		=> 'DELETE',
    	]);

    	$response->assertStatus(204);
    }
}
