<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->min(5);
            $table->string('contact', 9)->unique();
            $table->string('email')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
