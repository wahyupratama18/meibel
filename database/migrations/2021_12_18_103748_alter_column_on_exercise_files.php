<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnOnExerciseFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exercise_files', function (Blueprint $table) {
            $table->renameColumn('name', 'exercise_name');
            $table->string('discussion_name')->after('exercise_path');
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
            $table->dropColumn('discussion_name');
            $table->renameColumn('exercise_name', 'name');
        });
    }
}
