<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeingKeysToResponsiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('responsibles', function (Blueprint $table) {
            $table->foreign('task_id', 'responsibles_fk_1')->references('id')->on('tasks')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign('user_id', 'responsibles_fk_2')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('responsibles', function (Blueprint $table) {
            $table->dropForeign('responsibles_fk_1');
            $table->dropForeign('responsibles_fk_2');
        });
    }
}
