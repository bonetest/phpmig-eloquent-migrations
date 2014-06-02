<?php

use Phpmig\Migration\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $this->get('schema')->create('users', function ($table)
        {
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });

    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $this->get('schema')->drop('users');

    }
}
