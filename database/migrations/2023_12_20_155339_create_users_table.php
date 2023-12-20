<?php

// database/migrations/xxxx_xx_xx_create_evaluators_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluatorsTable extends Migration
{
    public function up()
    {
        Schema::create('evaluators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->json('preferences')->nullable();
            // Add other evaluator-related columns as needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluators');
    }
}
