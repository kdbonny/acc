<?php

namespace Enam\Acc;


use Enam\Acc\Http\Livewire\AccHeadComponent;
use Enam\Acc\Http\Livewire\EarnExpenseComponent;
use Enam\Acc\Http\Livewire\LedgerComponent;
use Enam\Acc\Http\Livewire\TrialBalanceComponent;
use Enam\Acc\Http\Livewire\VoucherEntryComponent;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AccountingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        Livewire::component('acc::voucher-entry-component', VoucherEntryComponent::class);
        Livewire::component('acc::acc-head-component', AccHeadComponent::class);
        Livewire::component('acc::earn-expense-component', EarnExpenseComponent::class);
        Livewire::component('acc::trial-balance-component', TrialBalanceComponent::class);
        Livewire::component('acc::ledger-component', LedgerComponent::class);

        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'accounting');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'acc');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('accounting.php'),
            ], 'config');

//            // Publishing the views.
//            $this->publishes([
//                __DIR__.'/../resources/views' => resource_path('views/vendor/acc'),
//            ], 'views');

            // Publishing assets.
//            $this->publishes([
//                __DIR__.'/../resources/assets' => public_path('vendor/accounting'),
//            ], 'assets');

            // Publishing the translation files.
            $this->publishes([
                __DIR__ . '/database/migrations' => database_path('/migrations/'),
            ], 'migrations');
//             $this->publishes([
//                __DIR__.'/Http/Livewire' => app_path('/Http/Livewire/'),
//            ], 'livewire');
//            $this->publishes([
//                __DIR__.'/http/controllers' => app_path('Http/Controllers/'),
//            ]);

            // Registering package commands.
            // $this->commands([]);

        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'accounting');

        $this->app->singleton('accounting', function () {
            return new Accounting;
        });
    }
}
