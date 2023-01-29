<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allotment extends Model
{
    use HasFactory;
    protected $table = 'allotment';

    public $primaryKey = 'id';

    protected $keyType = 'string';

    public $timestamps = true;

    protected $fillable =
    [
        'room_id',
        'user_id',
        'room_rate_plan_id',
        'allotment_room',
        'allotment_publish_rate',
        'allotment_ro_rate',
        'allotment_extrabed_rate',
        'allotment_date'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function room_rate_plans()
    {
        return $this->hasMany('App\Models\RoomRatePlan','id','room_rate_plan_id' );
    }
}
