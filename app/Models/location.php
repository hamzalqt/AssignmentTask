<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'address',
        'contact',
        'status',
        'headquarter_id'
    ];


    public function headQuarter(){
       return $this->belongsTo(headquarter::class,'headquarter_id','id');
    }


}
