<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\UserAddress;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\OrderStatus;
class InvoiceTransactions extends Model
{
    protected $table = 'invoice_transactions';
    protected $fillable = ['invoice_id', 'payment_id','result','auth','reference','track_id','tran_id','amount' ,'currency' ,'time' ];

    public function invoice()
    {
        return $this->belongsToMany(Invoice::class);
    }

}
