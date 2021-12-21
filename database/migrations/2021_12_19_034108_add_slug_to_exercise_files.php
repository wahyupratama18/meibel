<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToExerciseFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exercise_files', function (Blueprint $table) {
            $table->string('exercise_slug')->after('exercise_name')->unique();
            $table->string('discussion_slug')->after('discussion_name')->unique();
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
            $table->dropColumn(['exercise_slug', 'discussion_slug']);
        });
    }
}
