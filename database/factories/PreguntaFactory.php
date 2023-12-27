<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pregunta;
use Illuminate\Support\Str;
use App\Models\Competencia;
use App\Models\FactoresDesempeno;
class PreguntaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['FACTORES DE DESEMPEÑO', 'COMPETENCIAS LABORALES']);
        
        $areasDeEvaluacionOptions = $type === 'FACTORES DE DESEMPEÑO' ? [
            'Control de Actividades en Áreas Específicas',
            'Controlar Personal del Restaurante',
            'Controlar Procesos',
            'Dirigir en el Mercado Actual',
            'Distribuir Funciones',
            'FactoresDesempeno 1',
            'FactoresDesempeno 10',
            'FactoresDesempeno 2',
            'FactoresDesempeno 3',
            'FactoresDesempeno 4',
            'FactoresDesempeno 5',
            'FactoresDesempeno 6',
            'FactoresDesempeno 7',
            'FactoresDesempeno 8',
            'FactoresDesempeno 9',
            'Integrar y Coordinar Personal',
            'Llevar Reporte Mensual',
            'Responsable de Decisiones Políticas y Estrategias',
        ] : [
            'Analítico', 
            'Competencia 1', 
            'Competencia 10', 
            'Competencia 2', 
            'Competencia 3', 
            'Competencia 4', 
            'Competencia 5', 
            'Competencia 6', 
            'Competencia 7', 
            'Competencia 8', 
            'Competencia 9', 
            'Dinámico', 
            'Liderazgo', 
            'Orientación al logro', 
            'Proactivo', 
            'Otros'
        ];
        $valorOptions = $type === 'FACTORES DE DESEMPEÑO' ? [
            '¿Cómo describirías la comunicación interna dentro del equipo?', 
            '¿Puedes proporcionar ejemplos de situaciones en las que colaboraste eficientemente con tus compañeros?', 
            '¿Cómo te organizas para cumplir con tus responsabilidades diarias?', 
            '¿Qué medidas tomas para asegurarte de completar tus tareas de manera eficiente?', 
            '¿Cómo manejas los cambios inesperados en tus responsabilidades diarias?', 
            '¿Puedes mencionar alguna situación en la que tuviste que adaptarte a un cambio repentino y cómo lo abordaste?', 
            '¿En qué medida tomas la iniciativa para abordar nuevas tareas o resolver problemas sin ser dirigido específicamente?', 
            '¿Cómo equilibras la necesidad de buscar orientación con la autonomía en tu trabajo diario?', 
            '¿Cómo priorizas y organizas tus tareas para cumplir con los plazos?', 
            '¿Has tenido alguna experiencia en la que enfrentaste presión de tiempo, y cómo la manejaste?',
        ] : [
            '¿Cómo te aseguras de proporcionar un excelente servicio al cliente?', 
            '¿Puedes compartir una experiencia en la que manejaste una situación desafiante con un cliente?', 
            '¿Cómo contribuyes al trabajo en equipo y al ambiente colaborativo del hotel?', 
            '¿Cómo abordas los desacuerdos o conflictos dentro del equipo?', 
            '¿Cómo aseguras que tu conducta sea ética y profesional en el entorno laboral?', 
            '¿Has enfrentado alguna vez una situación ética complicada en el trabajo y cómo la manejaste?', 
            '¿Cómo motivas a tus compañeros de trabajo y fomentas un ambiente positivo?', 
            '¿Has asumido algún rol de liderazgo en proyectos o situaciones específicas?', 
            '¿Cómo buscas mejorar continuamente tus habilidades y conocimientos relacionados con tu trabajo?', 
            '¿Qué oportunidades de desarrollo profesional te gustaría ver implementadas en el hotel?', 
        ];
        $valor = $this->faker->randomElement($valorOptions);
        $areas_de_evaluacion = $this->faker->randomElement($areasDeEvaluacionOptions);
        $areaModel = $type === 'FACTORES DE DESEMPEÑO' ? FactoresDesempeno::class : Competencia::class;
        $areasDeEvaluacion = $areaModel::factory()->create();

        return [
            'type' => $type,
            'valor' => $valor,
            // 'areas_de_evaluacion' => $areas_de_evaluacion,
            'areas_de_evaluacion_id' => $areasDeEvaluacion->id,
            'areas_de_evaluacion_type' => $areaModel,
            // Otros campos del modelo Pregunta, si los hubiera
        ];
    }    
}