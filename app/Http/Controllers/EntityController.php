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
            $response['message'] = strtoupper($request->entity) . ' has been added to record. Page will now reload.';
        }
        return $response;
    }

    public function editEntity(Request $request){
        // return $request->all();

        Entity::where('entityID', $request->entityID)
                ->update(['entity' => $request->entity]);
            $response['message'] = strtoupper($request->entity) . ' has been added to record. Page will now reload.';
            return $response;
    }

    public function changeStatus(Request $request){
        $zz = "";
        $newStatus = "";
        if ($request->status == 0){
            $newStatus = 1;
            $zz = "activated!";
        }else{
            $newStatus = 0;
            $zz = "deactivated!";
        }

        Entity::where('entityID', $request->entityID)
                ->update(['status' => $newStatus]);
            $response['message'] = strtoupper($request->entity) . ' has been ' .$zz. ' Page will now reload.';
            return $response;
    }
}
