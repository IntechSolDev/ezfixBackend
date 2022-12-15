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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('dob')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('occupation')->nullable();
            $table->string('group')->nullable();
            $table->string('name_of_activity')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->longText('api_token')->nullable();
            $table->longText('fcm_token')->nullable();
            $table->boolean('status')->default(0)->nullable()->comment('o for Inactive and 1 for active');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
