<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use function Psy\debug;

class EquipmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return ['id' => $this->id,
            'equipment_type' => new EquipmentTypeResource($this->equipment_type),
            'serial_number' => $this->serial_number,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at];
    }
}
