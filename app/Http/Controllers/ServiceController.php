<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Entity;
use Illuminate\Http\Request;
use Validator;

class ServiceController extends Controller
{
    public function listService() {
        $services = Service::select('serviceID', 'entities.entityID', 'entity', 'service')
                            ->join('entities', 'entities.entityID', '=', 'services.entityID')
                            ->orderBy('entity', 'ASC')
                            ->get();
        return response()->json($services);
    }

    public function listEntity() {
        $entities = Entity::where('under', 0)->get();
        return response()->json($entities);
    }

    public function addService(Request $request) {
        $validator = Validator::make($request->all(), [
            'service' => 'required|unique:services',
            'entity' => 'required',
        ]);
        $response = array(
            'status' => 0,
            'error' => array(),
        );
        if ($validator->fails()) {
            $response['status'] = 1;
            $response['error'] = $validator->errors();
        } else { 
            $service = new Service;
            $service->fill($request->all());
            $service->entityID = $request->entity;
            $service->save();
        }
        return response()->json($response);
    }

    public function deleteService(Request $request) {
        $validator = Validator::make($request->all(), [
            'service' => 'required',
        ]);
        $response = array(
            'status' => 0,
            'error' => array(),
        );
        if ($validator->fails()) {
            $response['status'] = 1;
            $response['error'] = $validator->errors();
        } else {
            $service = Service::find($request->service);
            $service->delete();
        }
        return response()->json($response);
    }

    public function editService(Request $request) {
        $validator = Validator::make($request->all(), [
            'service' => 'required|unique:services,service,'.$request->id.',serviceID',
            'entity' => 'required'
        ]);
        $response = array(
            'status' => 0,
            'error' => array(),
        );
        if ($validator->fails()) {
            $response['status'] = 1;
            $response['error'] = $validator->errors();
        } else {
            $service = Service::find($request->id);
            $service->fill($request->all());
            $service->entityID = $request->entity;
            $service->save();
        }
        return response()->json($response);
    }
}
