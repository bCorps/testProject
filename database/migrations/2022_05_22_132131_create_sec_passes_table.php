<?php

use App\Traits\Uuid;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecPassesTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sec_passes', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36);
            $table->char('secPass', 10);
            $table->unsignedBigInteger('userID');
            $table->timestamps();
        });

        Schema::table('sec_passes', function($table) {
            $table->foreign('userID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sec_passes');
    }
}
