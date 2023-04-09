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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('user_id')->on('customers')->onDelete('cascade');
            $table->string('admin_id')->default(1);
            $table->string('subject')->nullable();
            $table->longText('customer_message')->nullable();
            $table->longText('admin_message')->nullable();

            $table->enum('notify',['new','read'])->default('new');
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
        Schema::dropIfExists('messages');
    }
};
