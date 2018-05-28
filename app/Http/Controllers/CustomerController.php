<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /*add customer*/
    public function add(Request $request)
    {
        return Customer::create($request->all())->only('id');
    }
}
