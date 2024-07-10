<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class template extends Model
{
    use HasFactory;
    protected $fillable =[
        'type',
        'size',
        'serial',
        'method',
        'headquarter_id',
        'uid',
        'master',
    ];


    public function master_temp(){

        return $this->hasOne(master_template::class,'master','id');

    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uid = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        });
    }


}
