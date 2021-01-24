<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Created order status
     * @var string
     */
    const STATUS_CREATED = 'created';

    /**
     * Payed Order status
     * @var string
     */
    const STATUS_PAYED = 'payed';

    /**
     * Rejected order status
     * @var string
     */
    const STATUS_REJECTED = 'rejected';

    protected $table = 'orders';

    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
