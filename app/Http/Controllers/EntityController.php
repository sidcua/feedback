<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use Illuminate\Http\Request;
use Validator;

class EntityController extends Controller
{
    public function saveEntity(Request $request){

        $validator = Validator::make($request->all(), [
            'entity' => 'required|unique:entities'
        ]);

        $response = array();

        if($validator->fails()){
            $response['status'] = 0;
            $response['message'] = $validator->errors();
        }else{
            Entity::create([
                'entity' => $request->entity
            ]);
            $response['status'] = 1;
            $response['message'] = strtoupper($request->entity) . ' has been added to record.';
        }
        return $response;
    }
}
