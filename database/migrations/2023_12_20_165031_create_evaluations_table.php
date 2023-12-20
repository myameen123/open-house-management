<?php

// database/migrations/xxxx_xx_xx_create_evaluations_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evaluator_id');
            $table->unsignedBigInteger('project_id');
            $table->integer('rating');
            // Add other evaluation-related columns as needed
            $table->timestamps();

            // Foreign key relationships
            $table->foreign('evaluator_id')->references('id')->on('evaluators')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
}
