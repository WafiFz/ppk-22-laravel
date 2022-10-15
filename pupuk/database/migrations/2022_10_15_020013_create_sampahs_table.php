<?php

use App\Enums\SampahCategoryEnum;
use App\Enums\SampahStatusEnum;
use App\Enums\SchedulePickupEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSampahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sampahs', function (Blueprint $table) {
            $table->string('id', 32)->primary();
            $table->string('name');
            $table->string('phone_number');
            $table->text('address');
            $table->text('address_notes');
            $table->enum('sampah_category', ['Organik' => SampahCategoryEnum::ORGANIK, 'Anorganik' => SampahCategoryEnum::ANORGANIK, 'Campuran' => SampahCategoryEnum::CAMPURAN]);
            $table->enum('status', ['PENJEMPUTAN_BARU' => SampahStatusEnum::BARU, 'PROSES' => SampahStatusEnum::PROSES, 'SELESAI' => SampahStatusEnum::SELESAI, 'TERKENDALA' => SampahStatusEnum::TERKENDALA, 'BATAL' => SampahStatusEnum::BATAL]);
            $table->enum('schedule_pickup', ['SENIN' => SchedulePickupEnum::SENIN, 'SELASA' => SchedulePickupEnum::SELASA, 'RABU' => SchedulePickupEnum::RABU, 'KAMIS' => SchedulePickupEnum::KAMIS, 'JUMAT' => SchedulePickupEnum::JUMAT, 'SABTU' => SchedulePickupEnum::SABTU, 'MINGGU' => SchedulePickupEnum::MINGGU]);
            // $table->string('sampah_category');  // enum harusnya
            // $table->string('schedule_pickup');  // enum harusnya
            // $table->string('status');           // enum harusnya
            $table->string('status_description')->nullable();

            // FK
            $table->string('user_id', 32);
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
        Schema::dropIfExists('sampahs');
    }
}