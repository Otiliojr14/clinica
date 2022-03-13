<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('cl_personal_id_nurse')->unsigned();
            $table->integer('cl_personal_id_medical')->unsigned()->nullable();
            $table->integer('unv_personal_id')->unsigned();
            $table->boolean('sintomas_respiratorios');
            $table->decimal('peso')->unsigned();
            $table->decimal('talla')->unsigned();
            $table->decimal('circunferencia')->unsigned();
            $table->mediumInteger('arterial_diastolica');
            $table->mediumInteger('arterial_sistolica');
            $table->mediumInteger('frecuencia_cardiaca');
            $table->mediumInteger('frecuencia_respiratoria');
            $table->decimal('temperatura')->unsigned()->nullable()->default(0);
            $table->decimal('saturacion_oxigeno')->nullable();
            $table->decimal('glucosa_ayuno');
            $table->boolean('tb_sintomas');
            $table->decimal('imc')->nullable();
            $table->text('discapacidad')->nullable();
            $table->text('diagnostico')->nullable();
            $table->boolean('enfermedad_cronica')->nullable();
            $table->boolean('consulta_integral')->nullable();
            $table->boolean('resistencia_insulina')->nullable();
            $table->boolean('nutricion')->nullable();
            $table->boolean('act_fisica')->nullable();
            $table->boolean('psicologia')->nullable();
            $table->date('ultimos_lab')->nullable();
            $table->boolean('medicina_interna')->nullable();
            $table->integer('specialty_id')->nullable();
            $table->boolean('nino_sano')->nullable();
            $table->boolean('adulto_mayor')->nullable();
            $table->tinyInteger('trimestre')->nullable();
            $table->tinyInteger('consulta_prenatal')->nullable();
            $table->boolean('riesgo')->nullable();
            $table->date('fecha')->nullable();
            $table->string('labs')->nullable();
            $table->string('estudios')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_histories');
    }
};
