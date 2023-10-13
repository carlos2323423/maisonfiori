<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('nivels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('niveles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('factoresdesempeno', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('competenciaslaborales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('campos_de_evaluacions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('escala_calificacions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('graphics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('competencias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('competency_levels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('employee_skills', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('ejes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('datos_grafico', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('descripcion_grafico', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('contrataciones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('contexto_contratacion', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });        

        Schema::create('jornadas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('indicadores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('indicadores_empleado', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('indicadores_hotel', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('indicadores_area', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('cuestionarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('asignaciones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('registros_entrada', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('registros_salida', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('evaluaciones_desempenio', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('evaluaciones_competencias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('evaluaciones_360', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('objetivos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('empleados_modelos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        // Agregar más tablas según sea necesario.

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('hotels');
        Schema::dropIfExists('nivels');
        Schema::dropIfExists('niveles');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('empleados');
        Schema::dropIfExists('factoresdesempeno');
        Schema::dropIfExists('competenciaslaborales');
        Schema::dropIfExists('preguntas');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('campos_de_evaluacions');
        Schema::dropIfExists('escala_calificacions');        
        Schema::dropIfExists('graphics');
        Schema::dropIfExists('competencias');
        Schema::dropIfExists('competency_levels');
        Schema::dropIfExists('employee_skills');
        Schema::dropIfExists('ejes');
        Schema::dropIfExists('datos_grafico');
        Schema::dropIfExists('descripcion_grafico');
        Schema::dropIfExists('calificaciones');
        Schema::dropIfExists('cargos');
        Schema::dropIfExists('contrataciones');
        Schema::dropIfExists('contexto_contratacion');
        Schema::dropIfExists('jornadas');
        Schema::dropIfExists('indicadores');
        Schema::dropIfExists('indicadores_empleado');
        Schema::dropIfExists('indicadores_hotel');
        Schema::dropIfExists('indicadores_area');
        Schema::dropIfExists('cuestionarios');        
        Schema::dropIfExists('tareas');
        Schema::dropIfExists('asignaciones');
        Schema::dropIfExists('registros_entrada');
        Schema::dropIfExists('registros_salida');
        Schema::dropIfExists('evaluaciones_desempenio');
        Schema::dropIfExists('evaluaciones_competencias');
        Schema::dropIfExists('evaluaciones_360');
        Schema::dropIfExists('objetivos');
        Schema::dropIfExists('empleados_modelos');
        // Agregar eliminaciones de más tablas según sea necesario.
    }
}

