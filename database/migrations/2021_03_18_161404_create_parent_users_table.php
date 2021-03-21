<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateParentUsersTable
 */
class CreateParentUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_users', function (Blueprint $table) {
            $table->id();
            $table->string('dataSource');
            $table->string('identificationId');
            $table->integer('balance');
            $table->string('currency')->nullable()->default('USD');
            $table->string('status');
            $table->string('email');
            $table->date('joinedDate')->nullable()->default(NOW());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parent_users');
    }
}
