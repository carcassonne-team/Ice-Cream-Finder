<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIceCreamShopsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("ice_cream_shops", function (Blueprint $table): void {
            $table->id();
            $table->string("name");
            $table->string("city");
            $table->string("street_name");
            $table->string("street_number");
            $table->string("image")->nullable();
            $table->unsignedBigInteger("location_id");
            $table->foreign("location_id")->references("id")->on("locations")
                ->onDelete("cascade");
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")
                ->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("ice_cream_shops");
    }
}
