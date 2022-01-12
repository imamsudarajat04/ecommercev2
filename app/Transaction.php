<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['user_id', 'transaction_date'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function transaction_details()
    {
        return $this->hasMany('App\TransactionDetail');
    }
}
