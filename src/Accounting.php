<?php

namespace Enam\Acc;

use Carbon\Carbon;
use Enam\Acc\Models\AccHead;
use Enam\Acc\Models\AccountTransaction;

class Accounting
{
    public static $PRODUCT_SALES = "Product Sales";
    public static $SALES = "Sales";
    public static $CASH_IN_HAND = "Cash In Hand";

    public static function isHeadExists($head)
    {
        return AccHead::query()->where('head', $head)->count();
    }

    public static function makeHeadIfNotExists($head, $subHead, $parentHead)
    {
        $headCount = AccHead::query()->where('head', $head)->count();
        if ($headCount == 0) {
            $h = new AccHead;
            $h->head = $head;
            $h->sub_head = $subHead;
            $h->parent_head = $parentHead;
            $h->user = auth()->id();

            $h->save();

        }


    }

    public static function generateUniqueVoucher()
    {
        $acc_transaction = new AccountTransaction;

        $max = $acc_transaction::max('id');

        return $vno = ($max + 1);

    }


    public static function makeTransaction($transactionHolderId, $head, $voucherNumber, $debit, $credit, $note, $description, $date)
    {
        if ($date == null) {
            $date = Carbon::today();
        }
        $acc_transaction = new AccountTransaction;
        $acc_transaction->vno = $voucherNumber;
        $acc_transaction->head = $head;
        $acc_transaction->sort_by = $transactionHolderId;
        $acc_transaction->description = $description;
        $acc_transaction->credit = $credit;
        $acc_transaction->note = $note;
        $acc_transaction->debit = $debit;
        $acc_transaction->date = $date;
        $acc_transaction->user = auth()->id();
        $acc_transaction->save();


//        $acc_transaction = new AccTransaction;
//
//        $head = "Cash in Hand";
//        $description = "Sales";
//        $credit = 0;
//        $debit = $gtotal;
//
//        $acc_transaction->vno = $vno;
//        $acc_transaction->head = $head;
//        $acc_transaction->description = $description;
//        $acc_transaction->credit = $credit;
//        $acc_transaction->debit = $debit;
//        $acc_transaction->user = auth()->id();
//        $acc_transaction->date = $date;
//
//        $acc_transaction->save();
    }
}
