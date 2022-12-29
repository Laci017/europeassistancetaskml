<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeingKeysToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
           $table->foreign('priority_id', 'tasks_fk_1')->references('id')->on('priorities')->onUpdate('CASCADE')->onDelete('SET NULL');
           $table->foreign('status_id', 'tasks_fk_2')->references('id')->on('statuses')->onUpdate('CASCADE')->onDelete('SET NULL');
           $table->foreign('created_by', 'tasks_fk_3')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
           $table->foreign('updated_by', 'tasks_fk_4')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_fk_1');
            $table->dropForeign('tasks_fk_2');
            $table->dropForeign('tasks_fk_3');
            $table->dropForeign('tasks_fk_4');
        });
    }
}
