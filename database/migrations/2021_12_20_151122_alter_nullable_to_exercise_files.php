<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNullableToExerciseFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exercise_files', function (Blueprint $table) {
            $table->string('exercise_name')->nullable()->change();
            $table->string('exercise_path')->nullable()->change();
            $table->string('discussion_name')->nullable()->change();
            $table->string('discussion_path')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exercise_files', function (Blueprint $table) {
            $table->string('exercise_name')->change();
            $table->string('exercise_path')->change();
            $table->string('discussion_name')->change();
            $table->string('discussion_path')->change();
        });
    }
}
