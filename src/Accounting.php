<?php

namespace Enam\Acc;

use Enam\Acc\Models\AccHead;

class Accounting
{
    public static function isHeadExists($head)
    {
        return AccHead::query()->where('head', $head)->count();
    }

    public static function makeTransaction($head, $subHead, $parentHead, $debit, $credit, $note, $description)
    {

    }
}
