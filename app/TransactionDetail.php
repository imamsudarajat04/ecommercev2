<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transaction_details';
    protected $fillable = ['transaction_id', 'product_id', 'quantity'];

    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
