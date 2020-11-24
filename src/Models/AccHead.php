<?php

namespace Enam\Acc\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccHead extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User', 'user', 'id');
    }


}
