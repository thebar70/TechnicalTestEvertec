<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * Payment processor
     * @var string
     */
    const PAYMENT_PROCESSOR_PLACETOPAY = 'placetopay';

    /**
     * Pendig payment status
     * @var string
     */
    const PAYMENT_STATUS_PENDING = 'pending';

    /**
     * Approved payment status
     * @var string
     */
    const PAYMENT_STATUS_APPROVED = 'approved';

    /**
     * Rejected payment status
     * @var string
     */
    const PAYMENT_STATUS_REJECTED = 'rejected';

    /**
     * Failed payment status
     * @var string
     */
    const PAYMENT_STATUS_FAILED = 'failed';

    /**
     * Unknow payment status
     * @var string
     */
    const PAYMENT_STATUS_UNKNOW = 'unknow';


    protected $table = 'payments';

    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
}
