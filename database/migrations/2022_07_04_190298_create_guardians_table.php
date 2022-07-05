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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->index()->constrained()->cascadeOnDelete();
            $table->string('email')->unique();
            $table->string('password');
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
        Schema::enableForeignKeyConstraints();
        Schema::table('guardians', function (Blueprint $table) {
            $table->dropForeign(['person_id']);
            $table->dropUnique('unique_name_location');
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('guardians');
    }
};
