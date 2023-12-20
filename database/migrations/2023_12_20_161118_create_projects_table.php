<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fyp_group_id');
            $table->string('title');
            $table->json('keywords');
            // Add other project-related columns as needed
            $table->timestamps();

            // Foreign key relationship
            $table->foreign('fyp_group_id')->references('id')->on('fyp_groups')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
