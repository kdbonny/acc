<?php

namespace Enam\Acc\Models;

use Illuminate\Database\Eloquent\Model;

class AccountTransaction extends Model
{
    protected $guarded = [];
    protected $table = 'acc_transactions';

    public function user()
    {
        return $this->belongsTo('App\User', 'user', 'id');
    }

}
