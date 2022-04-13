<?php
 
namespace App\Model\Resources;
use Illuminate\Database\Eloquent\Model;
 
class Participation extends Model
{
    protected $table='participations';
    //protected $primaryKey=['userId','eventId'];
    public $timestamps=false;
    protected $fillable=['userId','eventId'];
}