<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/20
 * Time: 18:57
 */

namespace App\Http\Controllers;


use App\Entity\Transaction;

class TransactionController extends Controller
{

    public function transactionList()
    {
        $userId = parent::UserId();

        $transactionPaginate = Transaction::where("user_id", $userId)
                    -> OrderBy("created_at", "desc")
                    -> with("product")
                    -> paginate(parent::RowPerPage);

        foreach ($transactionPaginate as $transaction)
        {
            if (!is_null($transaction->product->photo))
            {
                $transaction->product->photo = url($transaction->product->photo);
            }
        }

        $model = [
            "title" => "transaction list",
            "transactionPaginate" => $transactionPaginate
        ];

        return view("transaction.transactionList", $model);
    }
}