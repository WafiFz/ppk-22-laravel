<?php

use App\Enums\PupupStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePupuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pupuks', function (Blueprint $table) {
            $table->string('id', 32)->primary();
            $table->string('name');
            $table->string('phone_number');
            $table->text('address');
            $table->decimal('quantity');
            $table->string('total_price');
            // $table->string('status');       // Harusnya Enum
            $table->enum('status', ['Pesanan Baru' => PupupStatusEnum::BARU, 'Proses' => PupupStatusEnum::PROSES, 'Selesai' => PupupStatusEnum::SELESAI, 'Terkendala' => PupupStatusEnum::TERKENDALA, 'Batal' => PupupStatusEnum::BATAL])->default(PupupStatusEnum::BARU);
            $table->string('status_description')->nullable();
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
        Schema::dropIfExists('pupuks');
    }
}
