<?php
use Enam\Acc\Http\Controllers\AccHomeController;
use Enam\Acc\Http\Livewire\AccHeadComponent;
use Enam\Acc\Http\Livewire\EarnExpenseComponent;
use Enam\Acc\Http\Livewire\LedgerComponent;
use Enam\Acc\Http\Livewire\TrialBalanceComponent;
use Enam\Acc\Http\Livewire\VoucherEntryComponent;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])
    ->group(function () {
        Route::get('/acc', [AccHomeController::class, 'index']);
        Route::get('/acc/heads', AccHeadComponent::class)->name('acc.heads');
        Route::get('/acc/voucher', VoucherEntryComponent::class)->name('acc.voucher');
        Route::get('/acc/earn-expense', EarnExpenseComponent::class)->name('acc.earn-expense');
        Route::get('/acc/trial-balance', TrialBalanceComponent::class)->name('acc.trial-balance');
        Route::get('/acc/ledger', LedgerComponent::class)->name('acc.ledger');
    });
