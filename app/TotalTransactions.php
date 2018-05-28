<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalTransactions extends Model
{
    public $timestamps = false;

    protected $fillable = ['date', 'amount'];
}
