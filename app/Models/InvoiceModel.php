<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceModel extends Model
{
    protected $table = 'invoices';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'total_amount',
        'discount_amount',
        'voucher_code',
        'created_at',
        'expired_at',
    ];
}
