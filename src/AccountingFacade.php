<?php

namespace Enam\Acc;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Enam\Accounting\Skeleton\SkeletonClass
 */
class AccountingFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'accounting';
    }
}
