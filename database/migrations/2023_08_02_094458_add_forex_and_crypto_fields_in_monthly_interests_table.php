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
        Schema::table('monthly_interests', function (Blueprint $table) {
            $table->double('interest_type_forex', 8, 2)->after('interest_value')->nullable();
            $table->double('interest_type_crypto', 8, 2)->after('interest_type_forex')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monthly_interests', function (Blueprint $table) {
            $table->dropColumn('interest_type_forex');
            $table->dropColumn('interest_type_crypto');
        });
    }
};
