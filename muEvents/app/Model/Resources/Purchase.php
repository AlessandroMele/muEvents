<?php

namespace App\Model\Resources;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table='purchases';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=['payment','userId','eventId','discountedPrice'];
}