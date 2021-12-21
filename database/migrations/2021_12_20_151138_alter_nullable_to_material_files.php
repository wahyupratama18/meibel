<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNullableToMaterialFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('material_files', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('material_path')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('material_files', function (Blueprint $table) {
            $table->string('name')->change();
            $table->string('material_path')->change();
        });
    }
}
