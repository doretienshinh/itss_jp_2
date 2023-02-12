<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spendings', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('spending_types')->onDelete('cascade');
            $table->unsignedBigInteger('wallet_id');
            $table->foreign('wallet_id')->references('id')->on('wallets')->onDelete('cascade');
            // $table->date('date')->nullable();
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("spendings", function (Blueprint $table) {
            $table->dropForeign(["type_id"]);
            $table->dropForeign(["wallet_id"]);
            $table->dropIfExists('spendings');
        });
    }
};
