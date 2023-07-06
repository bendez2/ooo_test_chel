<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipmentRequest;
use App\Http\Requests\EquipmentUpdateRequest;
use App\Http\Resources\api\EquipmentResource;
use App\Models\api\equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipments = EquipmentResource::collection(Equipment::all());

        return $equipments;
    }

    /**
     * @param $id
     * @return EquipmentResource
     */
    public function get($id)
    {
        $equipment = Equipment::with(['equipment_type'])->where('id', $id)->first();

        return new EquipmentResource($equipment);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request  $request)
    {
        $equipment_request = new EquipmentRequest($request->all());
        $validator = Validator::make($request->all(), $equipment_request->rules());

        $validated = $validator->valid();
        $success = [];
        foreach($validated as $item) {
            $equipment = Equipment::create([
                'equipment_type_id' => $item['equipment_type_id'],
                'serial_number' => $item['serial_number'],
                'description' => $item['description'],
            ]);

            $success[] = new EquipmentResource($equipment);
        }
        $errors_validator = $validator->errors();
        $errors = [];

        foreach($errors_validator->messages() as $ue_key=>$ue_val) {
            $arr_key = explode('.', $ue_key);
            $key = $arr_key[0];
            $val = $arr_key[1];

            $errors->{$key}[] = str_replace($ue_key, $val, $ue_val[0]);
        }

        return response()->json((object)[
            'errors' => $errors,
            'success' => $success,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param EquipmentRequest $request
     * @param equipment $equipment
     * @return EquipmentResource
     */
    public function update(Equipment $equipment,EquipmentUpdateRequest $request)
    {
        $equipment->update($request->validated());

        return new EquipmentResource($equipment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return new EquipmentResource($equipment);
    }
}
