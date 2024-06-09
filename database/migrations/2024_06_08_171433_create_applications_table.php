<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

#return new class extends Migration
#{
    /**
     * Run the migrations.
     */
#    public function up(): void
#    {
#        Schema::create('applications', function (Blueprint $table) {
#            $table->id();
#            $table->timestamps();
#        });
#    }

    /**
     * Reverse the migrations.
     */
#    public function down(): void
#    {
#        Schema::dropIfExists('applications');
#    }
#};
class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
    */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('job_id');
            $table->text('cover_letter')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}