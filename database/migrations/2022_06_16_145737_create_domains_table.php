<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string('domain_id')->unique();
            $table->string('name')->unique();
            $table->string('description');
            $table->string('url')->unique();
            $table->string('server_name');
            $table->string('organization_name');
            $table->string('email_organization');
            $table->string('phone_organization');
            $table->unsignedBigInteger('category_id');
            $table->date('expiration_date');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('domains');
    }
}
