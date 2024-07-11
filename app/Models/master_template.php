<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_template extends Model
{
    use HasFactory;
    protected $fillable =[
        'type',
        'size',
        'serial',
        'method',
        'master',
        'changed',
        'uid',
        'headquarter_id'
    ];


    public function templates(){
        return $this->hasMany(template::class,'master','id');
    }

    public function headquarter(){
        return $this->belongsTo(headquarter::class,'headquarter_id','id');
     }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uid = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        });
    }


}
