<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentType extends Model
{
    use HasFactory;

    protected $table = 'equipment_type';

    protected $fillable = [
        'name',
        'mask',
    ];

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

//    public function checkingMask($mask, $serial_number)
//    {
//        $elements = array(
//            'N' => '[0-9]',
//            "A" => '[A-Z]',
//            'a' => '[a-z]',
//            'X' => '[A-Z0-9]',
//            'Z' => '[-|_|@]'
//        );
//
//
//    }

}
