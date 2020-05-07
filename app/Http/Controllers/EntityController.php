<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use Illuminate\Http\Request;
use Validator;

class EntityController extends Controller
{
    public function listEntities(Request $request){
        $entities = Entity::all();
        return response()->json($entities);
    }

    public function listMainEntities(Request $request){
        $entities = Entity::where('under', 0)
                            ->orderBy('entity', 'asc')
                            ->get();
        return response()->json($entities);
    }

    public function addEntity(Request $request){
        $validator = Validator::make($request->all(), [
            'entity' => 'required|unique:entities',
            'under' => 'required',
        ]);
        $response = array(
            'status' => 0,
            'error' => array(),
        );
        if($validator->fails()) {
            $response['status'] = 1;
            $response['error'] = $validator->errors();
        } else {
            $entity = new Entity;
            $entity->fill($request->all());
            $entity->status = 1;
            $entity->save();
        }
        return response()->json($response);
    }

    public function deleteEntity(Request $request){
        $validator = Validator::make($request->all(), [
            'entity' => 'required',
        ]);
        $response = array(
            'status' => 0,
            'error' => array(),
        );
        if($validator->fails()) {
            $response['status'] = 1;
            $response['error'] = $validator->errors();
        } else {
            $entity = Entity::find($request->entity);
            $entity->delete();
        }
        return response()->json($response);
    }

    public function editEntity(Request $request){
        $validator = Validator::make($request->all(), [
            'entity' => 'required|unique:entities,entity,'.$request->entity.',entityID',
            'under' => 'required',
            'status' => 'required',
        ]);
        $response = array(
            'status' => 0,
            'error' => array(),
        );
        if($validator->fails()) {
            $response['status'] = 1;
            $response['error'] = $validator->errors();
        } else {
            $entity = Entity::find($request->id);
            $entity->fill($request->all());
            $entity->save();
        }
        return response()->json($response);
    }
}
