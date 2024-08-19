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
        \Illuminate\Support\Facades\DB::unprepared(file_get_contents(__DIR__.'/legau-court-decisions.sql'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('court_decisions_tags_to_court_decisions');
        Schema::dropIfExists('court_decisions_court_decisions');
        Schema::dropIfExists('court_decisions_courts');
        Schema::dropIfExists('court_decisions_tags');
    }
};
