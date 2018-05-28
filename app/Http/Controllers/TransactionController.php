<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransactionController extends Controller
{
    /*getting all transactions*/
    public function index()
    {
        return view('transactions', ['transactions' => Transaction::all()]);
    }

    /*getting a transaction*/
    public function show($customerId, $id)
    {
        return Transaction::select('id as transactionId', 'amount', 'created_at as date')
            ->where([
                'id' => $id,
                'customer_id' => $customerId
            ])->first();
    }

    /*getting a transaction using filters*/
    public function filters($customerId, $amount, $date, $offset, $limit)
    {
        return Transaction::where([
                'customer_id' => $customerId,
                'amount'      => $amount,
                'created_at'  => $date,
            ])->offset($offset)
            ->limit($limit)
            ->get();
    }

    /*add transaction*/
    public function add(Request $request)
    {
        $transaction = Transaction::create($request->all());

        return Transaction::select('id as transactionId', 'customer_id as customerId', 'amount', 'created_at as date')
            ->where([
                'id' => $transaction->id,
            ])->first();
    }

    /*update transaction*/
    public function update(Request $request, $id)
    {

        $transaction = Transaction::find($id);

        if (isset($transaction)) {
            $transaction->update($request->all());

            return Transaction::select('id as transactionId', 'customer_id as customerId', 'amount', 'created_at as date')
                ->where([
                    'id' => $transaction->id,
                ])->first();
        }

        return 'fail';
    }

    /*delete transaction*/
    public function delete($id)
    {
        $article = Transaction::find($id);
        if (isset($article)) {
            $article->delete();

            return 'success';
        }

        return 'fail';
    }
}
