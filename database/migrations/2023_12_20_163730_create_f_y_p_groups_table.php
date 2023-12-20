<?php

// database/migrations/xxxx_xx_xx_create_fyp_groups_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFYPGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('fyp_groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_name');
            // Add other FYP group-related columns as needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fyp_groups');
    }
}
