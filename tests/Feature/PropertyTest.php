<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class PropertyTest extends TestCase
{

    public function test_add_property()
    {
        $validator = [
            'name'=> 'required|max:128',
            'real_state_type'=> 'required',
            'street'=> 'required|max:128',
            'external_number'=> 'required|alpha_dash|max:12',
            'Internal_number'=> 'required_if:real_state_type,department,commercial_ground|max:12',
            'neighborhood'=> 'required|max:128',
            'city'=> 'required|max:64',
            'country'=> 'required|max:12',
            'rooms'=> 'required',
            'bathrooms'=> 'required',
            'comments'=> 'required|max:128',
        ];
        $data = [
            'name' => 'Test',
            'real_state_type' => 'department',
            'street' => 'xczc',
            'external_number' => 'zxczxczxc',
            'Internal_number' => 'zxczxcxc',
            'neighborhood' => '3423',
            'city' => 'xvxcvxcv',
            'country' => 'vxcvxcv',
            'rooms' => '1',
            'bathrooms' => '3',
            'comments' => 'cxxcvxcvxv',
        ];
        $v = $this->app['validator']->make($data, $validator);
        $this->assertTrue($v->passes());

        $response = $this->json('post', 'api/property/add', $data);
        $response->assertStatus(200);
    }

    public function test_update_property()
    {
        $validator = [
            'id'=> 'required',
            'name'=> 'max:128',
            'street'=> 'max:128',
            'external_number'=> 'alpha_dash|max:12',
            'Internal_number'=> 'required_if:real_state_type,department,commercial_ground|max:12',
            'neighborhood'=> 'max:128',
            'city'=> 'max:64',
            'country'=> 'max:12',
            'comments'=> 'max:128',
        ];
        $data = [
            'id' => '1',
            'name' => 'updated',
            'street' => 'xczc',
            'external_number' => 'zxczxczxc',
            'Internal_number' => 'zxczxcxc',
            'neighborhood' => '3423',
            'city' => 'xvxcvxcv',
            'country' => 'vxcvxcv',
            'comments' => 'cxxcvxcvxv',
        ];
        $v = $this->app['validator']->make($data, $validator);
        $this->assertTrue($v->passes());

        $response = $this->json('post', 'api/property/update', $data);
        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_property()
    {
        $response = $this->json('post', 'api/property/show', ['property_id' => 1]);
        $response->assertStatus(200);
    }


    public function test_get_all_property()
    {
        $response = $this->json('get', 'api/property/list');
        $response->assertStatus(200);
        $retData = json_decode($response->content());
        $this->assertGreaterThan(0, count($retData->data));
    }

    public function test_delete_property()
    {
        $response = $this->json('post', 'api/property/destroy',['id'=>1]);
        $response->assertStatus(200);
    }


}
