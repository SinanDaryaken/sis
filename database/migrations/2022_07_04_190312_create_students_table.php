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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->index()->constrained()->cascadeOnDelete();
            $table->foreignId('family_id')->nullable()->constrained();
            $table->unsignedInteger('student_number');
            $table->string('uid')->unique();
            $table->timestamps();

            $table->unique(['person_id'], 'unique_name_location');
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
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['person_id']);
            $table->dropUnique('unique_name_location');
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('students');
    }
};
