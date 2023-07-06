<?php

namespace App\Http\Controllers;

use App\Http\Resources\api\EquipmentTypeResource;
use App\Models\api\EquipmentType;
use Illuminate\Http\Request;

class EquipmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipments = EquipmentTypeResource::collection(EquipmentType::all());

        return $equipments;
    }

}
