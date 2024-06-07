<?php

use App\Enum\TypeRoom;
use App\Enum\RoomStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('title')->nullable();
            $table->double('price_selling')->nullable();
            $table->double('total_price')->nullable();
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('set null');
            $table->tinyInteger('status')->default(RoomStatus::Available->value);
            $table->date('start_rent')->nullable();
            $table->date('end_rent')->nullable();
            $table->integer('floor')->nullable();
            $table->tinyInteger('type')->nullable()->default(TypeRoom::Normal->value);
            $table->decimal('area')->nullable();
            $table->text('desc')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign(['discount_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('rooms');
    }
};
