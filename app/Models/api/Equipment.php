<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'equipment';

    protected $fillable = [
        'equipment_type_id',
        'serial_number',
        'description',
    ];

    public function equipment_type()
    {
        return $this->belongsTo(EquipmentType::class, 'equipment_type_id', 'id');
    }

}
