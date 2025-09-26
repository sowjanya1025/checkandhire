<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //kycdocuments
//linkedIn ID
//Hr mamanger mail id
//hr manager name and mobile nmber
            $table->string('linkedIn_id')->nullable()->after('image');
            $table->string('kyc_documents')->nullable()->after('linkedIn_id');
            $table->string('hr_manager_name')->nullable()->after('kyc_documents');
            $table->string('hr_manager_mobile')->nullable()->after('hr_manager_name');
            $table->string('hr_manager_email')->nullable()->after('hr_manager_mobile');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['linkedIn_id', 'kyc_documents', 'hr_manager_name', 'hr_manager_mobile', 'hr_manager_email']);
        });
    }
}
