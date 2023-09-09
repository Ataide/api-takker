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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("amz_link")->nullable();
            $table->float('tap_interval')->nullable()->default(0.0);
            $table->boolean('auto_stop_after_crash')->default(false);
            $table->boolean('auto_resume_search')->default(false);
            $table->decimal('offer_lead_time')->default(10);
            $table->string('minimum_base_paytype')->nullable();
            $table->float('minimum_base_payvalue')->nullable()->default(15);
            $table->string('offer_duration_start')->nullable()->default('0:00');
            $table->string('offer_duration_end')->nullable()->default('0:00');
            $table->boolean("working")->default(false);
            $table->string('timezone')->nullable();
            $table->string("account_status")->default('active');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
