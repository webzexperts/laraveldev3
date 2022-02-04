<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Property;

class PropertyController extends Controller
{
    //
    public function index(){
        $response['status']=false;
        $response['message']="Data not found.";
        $property = Property::select('id','name','real_state_type','city','country')->where("is_deleted",0)->get()->toArray();
        if(!empty($property)){
            $response['status']=true;
            $response['data']=$property;
            $response['message']="Data found.";
        }
        return response()->json($response);

    }
    public function show(Request $request){
        
        $response['status']=false;
        $response['message']="Data not found.";
        $validator = Validator::make($request->all(), [
            'property_id' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $response['message']=$messages[0];
            return response()->json($response);
        }
        $property = Property::where("id",$request->property_id)->where("is_deleted",0)->first();
        if(!empty($property)){
            $response['status']=true;
            $response['data']=$property;
            $response['message']="Data found.";
        }
        return response()->json($response);

    }
    public function add(Request $request){
        
        $response['status']=false;
        $response['message']="Something went wrong.";
        $validator = Validator::make($request->all(), [
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
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $response['message']=$messages[0];
            return response()->json($response);
        }
        $property_id = Property::insert($request->all());
        if(!empty($property_id)){
            $response['status']=true;
            $response['message']="Property has been added.";
        }
        return response()->json($response);

    }
    public function update(Request $request){
        
        $response['status']=false;
        $response['message']="Something went wrong.";
        $validator = Validator::make($request->all(), [
            'id'=> 'required',
            'name'=> 'max:128',
            'street'=> 'max:128',
            'external_number'=> 'alpha_dash|max:12',
            'Internal_number'=> 'required_if:real_state_type,department,commercial_ground|max:12',
            'neighborhood'=> 'max:128',
            'city'=> 'max:64',
            'country'=> 'max:12',
            'comments'=> 'max:128',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $response['message']=$messages[0];
            return response()->json($response);
        }
        $property = Property::findOrFail($request->id);
        $update_data=$request->all();
        unset($update_data['id']);
        $res = $property->update($update_data);
        if(!empty($res)){
            $response['status']=true;
            $response['data']=Property::find($request->id);
            $response['message']="Property has been updated.";
        }
        return response()->json($response);

    }
    public function destroy(Request $request){
        
        $response['status']=false;
        $response['message']="Something went wrong.";
        $validator = Validator::make($request->all(), [
            'id'=> 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $response['message']=$messages[0];
            return response()->json($response);
        }
        $property = Property::findOrFail($request->id);
        $update_data=['is_deleted'=>1];
        $res = $property->update($update_data);
        if(!empty($res)){
            $response['status']=true;
            $response['data']=Property::find($request->id);
            $response['message']="Property has been deleted.";
        }
        return response()->json($response);

    }
}
