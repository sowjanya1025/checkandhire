<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('gender');
            $table->string('phone_number');
            $table->string('location')->nullable();
            $table->string('social_id')->nullable();
            $table->string('login_type')->nullable();
            $table->string('device_token')->nullable();            
            $table->string('password');
            $table->string('profile');
            $table->string('status')->comment('1 = Login or 0 = Logout')->nullable();
            $table->string('is_active')->comment('1 = active or 0 = block')->nullable();
            $table->string('verification')->comment('1 = notVerified or 0 = verified')->nullable();
            $table->string('otp')->nullable();
            $table->string('date_time')->nullable();            
            $table->timestamp('email_verified_at')->nullable()->nullable();                        
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
}
