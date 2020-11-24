<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acc_heads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user');
            $table->integer('cid')->nullable();
            $table->string('parent_head');
            $table->string('sub_head');
            $table->string('head');
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
        Schema::dropIfExists('acc_heads');
    }
}
