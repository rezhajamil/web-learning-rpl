<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSubjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->foreign('lesson_id')->references('id')->on('lessons')->nullOnDelete();
            $table->foreign('example_id')->references('id')->on('examples')->nullOnDelete();
            $table->foreign('quiz_id')->references('id')->on('quizzes')->nullOnDelete();
            $table->foreign('other_id')->references('id')->on('others')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign(['lesson_id']);
            $table->dropForeign(['example_id']);
            $table->dropForeign(['quiz_id']);
            $table->dropForeign(['other_id']);
        });
    }
}
