<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paymentgatway extends Model
{
    protected $table = 'paymentgateways';

    protected $fillable = ['environment', 'currency', 'secret_key', 'publics_key'];
}
