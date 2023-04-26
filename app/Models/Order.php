<?php

namespace App\Models;

use App\Models\OrderItem;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;

    protected $table ="orders";
    protected $fillable = 
    [       
            'user_id',
            'fname',
            'lname',
            'phone',
            'email',
            'address1',
            'address2',
            'city',
            'country',
            'state',
            'pincode',
            'status',
            'message',
            'tracking_no',     


    ];
    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
