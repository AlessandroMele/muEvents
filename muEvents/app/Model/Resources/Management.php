<?php

namespace App\Model\Resources;
use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $table='managements';
    //protected $primaryKey=['userId','eventId'];
    public $timestamps=false;
    protected $fillable=['userId','eventId'];

}