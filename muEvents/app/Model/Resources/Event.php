<?php

namespace App\Model\Resources;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table='events';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=['title','description','date','allTickets','map','image','price','region', 'discountPerc','daysNumber'];
    
    
    
}





