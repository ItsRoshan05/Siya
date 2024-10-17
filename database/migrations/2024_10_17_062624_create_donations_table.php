<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->decimal('donation_amount', 15, 2);
            $table->string('donation_type');
            $table->text('donation_message')->nullable();
            $table->boolean('anonymous')->default(false);
            $table->text('is_verify')->nullable();

            $table->string('payment_proof');
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
        Schema::dropIfExists('donations');
    }
}
