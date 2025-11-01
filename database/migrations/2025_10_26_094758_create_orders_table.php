<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('customer_id')->nullable();
            $table->string('name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_number2')->nullable();
            $table->string('service')->nullable();
            $table->string('quantity')->nullable();
            $table->string('shalwar_kameez_qty')->nullable();
            $table->string('waistcoat_qty')->nullable();
            $table->string('kurta_qty')->nullable();
            $table->string('coat_qty')->nullable();
            $table->longText('address')->nullable();
            $table->string('reference_person')->default('no')->nullable();
            $table->string('gala')->nullable();
            $table->string('kamar')->nullable();
            $table->string('chhati_tayar')->nullable();
            $table->string('chhati')->nullable();
            $table->string('bazoo')->nullable();
            $table->string('teera')->nullable();
            $table->string('lambai')->nullable();
            $table->string('button')->nullable();
            $table->string('collar')->nullable();
            $table->string('collar_bean')->nullable();
            $table->string('kaff')->nullable();
            $table->string('pati')->nullable();
            $table->string('gheera_tayar')->nullable();
            $table->string('pancha')->nullable();
            $table->string('shalwar')->nullable();
            $table->string('button_style')->nullable();
            $table->string('pancha_style')->nullable();
            $table->string('shalwar_pocket')->nullable();
            $table->string('side_pocket')->nullable();
            $table->string('front_pocket')->nullable();

//            coat measurement

            $table->string('w_coat_lambai')->nullable();
            $table->string('w_coat_teera')->nullable();
            $table->string('w_coat_bazoo')->nullable();
            $table->string('w_coat_chhati')->nullable();
            $table->string('w_coat_kamar')->nullable();
            $table->string('w_coat_gala')->nullable();
            $table->string('w_coat_hip')->nullable();


            $table->longText('note')->nullable();
            $table->string('total_amount')->nullable();

            $table->enum('status', ['Complete', 'Pending'])->default('Pending')->nullable();
            $table->enum('gender', ['Male', 'Female'])->default('Male')->nullable();
            $table->string('payment')->default('Pending')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
