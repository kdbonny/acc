<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acc_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('sort_by')->nullable();
            $table->integer('vno')->default(-1);
            $table->string('head')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('note')->nullable();
            $table->double('credit')->default(0);
            $table->double('debit')->default(0);
            $table->date('date');
            $table->unsignedBigInteger('user');
            $table->string('lkey')->nullable();
            $table->timestamps();
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_transactions');
    }
}
