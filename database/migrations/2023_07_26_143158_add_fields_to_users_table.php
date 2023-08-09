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
        Schema::table('users', function (Blueprint $table) {
            $table->double('balance', 10, 2)->default(0)->nullable();
            $table->enum('state', ['active', 'idle']);
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('country')->nullable();
            $table->text('address')->nullable();
            $table->bigInteger('zip')->nullable();
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
            $table->dropColumn('balance');
            $table->dropColumn('state');
            $table->dropColumn('birth_date');
            $table->dropColumn('gender');
            $table->dropColumn('country');
            $table->dropColumn('address');
            $table->dropColumn('zip');
        });
    }
};
