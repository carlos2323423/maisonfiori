<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FillContentTablesController extends Controller
{
    public function filled($tipo_tabla) {
        // dd($tipo_tabla);
        $original_string = $tipo_tabla;
        $table = str_replace('fill_', '', $original_string);        
        // dd($table);
        switch ($tipo_tabla) {
            case 'fill_areas':
                DB::beginTransaction();
                try {
                    $idExists = DB::table($table)->where('id', 1)->exists();
                    if (!$idExists) {
                        $consulta1 = "
                            INSERT INTO " . $table . " (id, ah_nombre, ah_descripcion, ah_ah_activo, hotel_id, created_at, updated_at)
                            VALUES
                            (1, 'Nombre1', 'Descripción1', 'Activo1', 1, NOW(), NOW());                    
                        ";                    
                        DB::statement($consulta1);
                    } 

                    $consulta = "
                        INSERT INTO areas (ah_nombre, ah_descripcion, ah_ah_activo, hotel_id, created_at, updated_at)
                        VALUES
                        ('Nombre2', 'Descripción2', 'Activo2', 1, NOW(), NOW()),
                        ('Nombre3', 'Descripción3', 'Activo3', 1, NOW(), NOW()),
                        ('Nombre4', 'Descripción4', 'Activo4', 1, NOW(), NOW()),
                        ('Nombre5', 'Descripción5', 'Activo5', 1, NOW(), NOW()),
                        ('Nombre6', 'Descripción6', 'Activo6', 1, NOW(), NOW()),
                        ('Nombre7', 'Descripción7', 'Activo7', 1, NOW(), NOW()),
                        ('Nombre8', 'Descripción8', 'Activo8', 1, NOW(), NOW()),
                        ('Nombre9', 'Descripción9', 'Activo9', 1, NOW(), NOW()),
                        ('Nombre10', 'Descripción10', 'Activo10', 1, NOW(), NOW());
                    ";                    
                    DB::statement($consulta);

                    DB::commit();

                    return "Consultas ejecutadas correctamente";
                } catch (\Exception $e) {
                    DB::rollback();
                    return "Error: " . $e->getMessage();
                }
                break;
            case 'fill_competencias':
                $consulta = "
                    INSERT INTO competencias (created_at, updated_at, name, state, descripcion)
                    VALUES 
                    (NOW(), NOW(), 'Competencia 1', 1, 'Descripción de la competencia 1'),
                    (NOW(), NOW(), 'Competencia 2', 1, 'Descripción de la competencia 2'),
                    (NOW(), NOW(), 'Competencia 3', 1, 'Descripción de la competencia 3'),
                    (NOW(), NOW(), 'Competencia 4', 1, 'Descripción de la competencia 4'),
                    (NOW(), NOW(), 'Competencia 5', 1, 'Descripción de la competencia 5'),
                    (NOW(), NOW(), 'Competencia 6', 1, 'Descripción de la competencia 6'),
                    (NOW(), NOW(), 'Competencia 7', 1, 'Descripción de la competencia 7'),
                    (NOW(), NOW(), 'Competencia 8', 1, 'Descripción de la competencia 8'),
                    (NOW(), NOW(), 'Competencia 9', 1, 'Descripción de la competencia 9'),
                    (NOW(), NOW(), 'Competencia 10', 1, 'Descripción de la competencia 10');
                ";
                DB::statement($consulta);
                dd("Consulta ejecutada correctamente");
                return "Consulta ejecutada correctamente";
                break;
            case 'fill_niveles':
                $consulta = "
                    INSERT INTO niveles (created_at, updated_at, nombre, descripcion, puntos_requeridos, state) 
                    VALUES
                    (NOW(), NOW(), 'Nivel 1', 'Descripción del Nivel 1', 100, 'Activo'),
                    (NOW(), NOW(), 'Nivel 2', 'Descripción del Nivel 2', 200, 'Activo'),
                    (NOW(), NOW(), 'Nivel 3', 'Descripción del Nivel 3', 300, 'Activo'),
                    (NOW(), NOW(), 'Nivel 4', 'Descripción del Nivel 4', 400, 'Activo'),
                    (NOW(), NOW(), 'Nivel 5', 'Descripción del Nivel 5', 500, 'Activo'),
                    (NOW(), NOW(), 'Nivel 6', 'Descripción del Nivel 6', 600, 'Activo'),
                    (NOW(), NOW(), 'Nivel 7', 'Descripción del Nivel 7', 700, 'Activo'),
                    (NOW(), NOW(), 'Nivel 8', 'Descripción del Nivel 8', 800, 'Activo'),
                    (NOW(), NOW(), 'Nivel 9', 'Descripción del Nivel 9', 900, 'Activo'),
                    (NOW(), NOW(), 'Nivel 10', 'Descripción del Nivel 10', 1000, 'Activo');
                ";
                DB::statement($consulta);
                dd("Consulta ejecutada correctamente");
                return "Consulta ejecutada correctamente";
                break;
            case 'fill_scaleniveles':
                $consulta = "                    
                    INSERT INTO scaleniveles (empleado, Deficiente, Mejorable, Aceptable, Bueno, Excelente, created_at, updated_at)
                    VALUES 
                    ('1', '1', '2', '3', '4', '5', NOW(), NOW()),
                    ('1', '6', '7', '8', '9', '2', NOW(), NOW()),
                    ('1', '1', '2', '3', '4', '5', NOW(), NOW()),
                    ('1', '6', '7', '8', '9', '2', NOW(), NOW()),
                    ('1', '2', '2', '3', '4', '2', NOW(), NOW()),
                    ('1', '6', '7', '8', '9', '3', NOW(), NOW()),
                    ('1', '3', '3', '3', '3', '3', NOW(), NOW()),
                    ('1', '3', '3', '8', '9', '4', NOW(), NOW()),
                    ('1', '4', '2', '4', '4', '5', NOW(), NOW()),
                    ('1', '6', '7', '8', '9', '5', NOW(), NOW());                    
                ";
                DB::statement($consulta);
                dd("Consulta ejecutada correctamente");
                return "Consulta ejecutada correctamente";
                break;
            case 'fill_cargos':
                DB::beginTransaction();
                try {
                    $idExists = DB::table($table)->where('id', 1)->exists();
                    if (!$idExists) {
                        $consulta1 = "
                            INSERT INTO " . $table . " (id, created_at, updated_at, nombre, descripcion, salario, area_id, hotel_id)
                            VALUES                                    
                            (1, NOW(), NOW(), 'Cargo 1', 'Descripción del Cargo 1', 5000.00, 1, 1);
                        ";                    
                        DB::statement($consulta1);
                    } 
                    $consulta = "
                        INSERT INTO cargos (created_at, updated_at, nombre, descripcion, salario, area_id, hotel_id) 
                        VALUES                        
                        (NOW(), NOW(), 'Cargo 2', 'Descripción del Cargo 2', 6000.00, 1, 1),
                        (NOW(), NOW(), 'Cargo 3', 'Descripción del Cargo 3', 5500.00, 1, 2),
                        (NOW(), NOW(), 'Cargo 4', 'Descripción del Cargo 4', 7000.00, 1, 2),
                        (NOW(), NOW(), 'Cargo 5', 'Descripción del Cargo 5', 4800.00, 1, 3),
                        (NOW(), NOW(), 'Cargo 6', 'Descripción del Cargo 6', 5200.00, 1, 3),
                        (NOW(), NOW(), 'Cargo 7', 'Descripción del Cargo 7', 5800.00, 1, 4),
                        (NOW(), NOW(), 'Cargo 8', 'Descripción del Cargo 8', 6500.00, 1, 4),
                        (NOW(), NOW(), 'Cargo 9', 'Descripción del Cargo 9', 5300.00, 1, 5),
                        (NOW(), NOW(), 'Cargo 10', 'Descripción del Cargo 10', 6000.00, 1, 5);
                    ";
                    DB::statement($consulta);                
                    DB::commit();
                    return "Consulta ejecutada correctamente";

                } catch (\Exception $e) {
                    DB::rollback();
                    return "Error: " . $e->getMessage();
                }
                break;
            case 'fill_contrataciones':
                DB::beginTransaction();
                try {
                    $idExists = DB::table($table)->where('id', 1)->exists();
                    if (!$idExists) {
                        $consulta1 = "
                            INSERT INTO " . $table . " (id, created_at, updated_at, fecha_contratacion, contexto_id)
                            VALUES                            
                            (1, NOW(), NOW(), '2023-01-01', 1);
                        ";                    
                        DB::statement($consulta1);
                    } 
                    $consulta = "
                        INSERT INTO contrataciones (created_at, updated_at, fecha_contratacion, contexto_id) 
                        VALUES                        
                        (NOW(), NOW(), '2023-02-05', 1),
                        (NOW(), NOW(), '2023-03-10', 1),
                        (NOW(), NOW(), '2023-04-15', 1),
                        (NOW(), NOW(), '2023-05-20', 1),
                        (NOW(), NOW(), '2023-06-25', 1),
                        (NOW(), NOW(), '2023-07-30', 1),
                        (NOW(), NOW(), '2023-08-05', 1),
                        (NOW(), NOW(), '2023-09-10', 1),
                        (NOW(), NOW(), '2023-10-15', 1);
                    ";                  
                    DB::statement($consulta);                
                    DB::commit();
                    return "Consulta ejecutada correctamente";

                } catch (\Exception $e) {
                    DB::rollback();
                    return "Error: " . $e->getMessage();
                }                
                break;
            case 'fill_contexto_contratacion':
                DB::beginTransaction();
                try {
                    $idExists = DB::table($table)->where('id', 1)->exists();
                    if (!$idExists) {
                        $consulta1 = '
                            INSERT INTO ' . $table . ' (id, created_at, updated_at, contexto, cualidades_positivas) 
                            VALUES                                                        
                            (1, NOW(), NOW(), "Contexto 1", \'["Cualidad 1", "Cualidad 2", "Cualidad 3"]\');
                        ';

                        DB::statement($consulta1);
                    } 
                    $consulta = '
                        INSERT INTO contexto_contratacion (created_at, updated_at, contexto, cualidades_positivas) 
                        VALUES                        
                        (NOW(), NOW(), "Contexto 2", \'["Otra Cualidad 1", "Otra Cualidad 2", "Otra Cualidad 3"]\'),
                        (NOW(), NOW(), "Contexto 3", \'["Más Cualidades 1", "Más Cualidades 2", "Más Cualidades 3"]\'),
                        (NOW(), NOW(), "Contexto 4", \'["Diferente Cualidad 1", "Diferente Cualidad 2", "Diferente Cualidad 3"]\'),
                        (NOW(), NOW(), "Contexto 5", \'["Otra vez Cualidad 1", "Otra vez Cualidad 2", "Otra vez Cualidad 3"]\'),
                        (NOW(), NOW(), "Contexto 6", \'["Nueva Cualidad 1", "Nueva Cualidad 2", "Nueva Cualidad 3"]\'),
                        (NOW(), NOW(), "Contexto 7", \'["Última Cualidad 1", "Última Cualidad 2", "Última Cualidad 3"]\'),
                        (NOW(), NOW(), "Contexto 8", \'["Cualidad Adicional 1", "Cualidad Adicional 2", "Cualidad Adicional 3"]\'),
                        (NOW(), NOW(), "Contexto 9", \'["Otra Cualidad Extra 1", "Otra Cualidad Extra 2", "Otra Cualidad Extra 3"]\'),
                        (NOW(), NOW(), "Contexto 10", \'["Nueva Cualidad Extra 1", "Nueva Cualidad Extra 2", "Nueva Cualidad Extra 3"]\');
                    ';
                    DB::statement($consulta);                
                    DB::commit();
                    return "Consulta ejecutada correctamente";

                } catch (\Exception $e) {
                    DB::rollback();
                    return "Error: " . $e->getMessage();
                }     
                break;
            case 'fill_empleados':
                DB::beginTransaction();
                try {
                    $idExists = DB::table($table)->where('id', 1)->exists();
                    if (!$idExists) {                        
                        $consulta1 = "
                            INSERT INTO " . $table . " (id, created_at, updated_at, lastname, firstname, hotel_id, nivel_id, cargo_id, foto, ci, email, celular, contratacion_id, genero, password)
                            VALUES                                                        
                            (1, NOW(), NOW(), 'Apellido1', 'Nombre1', 1, 1, 1, 'foto1.jpg', 1234567, 'correo1@example.com', 1234567890, 1, 'M', 'password1');
                        ";                    

                        DB::statement($consulta1);
                    } 
                    $consulta = "
                        INSERT INTO empleados (created_at, updated_at, lastname, firstname, hotel_id, nivel_id, cargo_id, foto, ci, email, celular, contratacion_id, genero, password)
                        VALUES                        
                        (NOW(), NOW(), 'Apellido3', 'Nombre3', 1, 1, 1, 'foto3.jpg', 3456789, 'correo3@example.com', 1234567892, 1, 'M', 'password3'),
                        (NOW(), NOW(), 'Apellido2', 'Nombre2', 1, 1, 1, 'foto2.jpg', 2345678, 'correo2@example.com', 1234567891, 1, 'F', 'password2'),
                        (NOW(), NOW(), 'Apellido4', 'Nombre4', 1, 1, 1, 'foto4.jpg', 4567890, 'correo4@example.com', 1234567893, 1, 'F', 'password4'),
                        (NOW(), NOW(), 'Apellido5', 'Nombre5', 1, 1, 1, 'foto5.jpg', 5678901, 'correo5@example.com', 1234567894, 1, 'M', 'password5'),
                        (NOW(), NOW(), 'Apellido6', 'Nombre6', 1, 1, 1, 'foto6.jpg', 6789012, 'correo6@example.com', 1234567895, 1, 'F', 'password6'),
                        (NOW(), NOW(), 'Apellido7', 'Nombre7', 1, 1, 1, 'foto7.jpg', 7890123, 'correo7@example.com', 1234567896, 1, 'M', 'password7'),
                        (NOW(), NOW(), 'Apellido8', 'Nombre8', 1, 1, 1, 'foto8.jpg', 8901234, 'correo8@example.com', 1234567897, 1, 'F', 'password8'),
                        (NOW(), NOW(), 'Apellido9', 'Nombre9', 1, 1, 1, 'foto9.jpg', 9012345, 'correo9@example.com', 1234567898, 1, 'M', 'password9'),
                        (NOW(), NOW(), 'Apellido10', 'Nombre10', 1, 1, 1, 'foto10.jpg', 1234567, 'correo10@example.com', 1234567899, 1, 'F', 'password10'),
                        (NOW(), NOW(), 'Apellido11', 'Nombre11', 1, 1, 1, 'foto11.jpg', 2345678, 'correo11@example.com', 1234567800, 1, 'M', 'password11'),
                        (NOW(), NOW(), 'Apellido12', 'Nombre12', 1, 1, 1, 'foto12.jpg', 3456789, 'correo12@example.com', 1234567801, 1, 'F', 'password12'),
                        (NOW(), NOW(), 'Apellido13', 'Nombre13', 1, 1, 1, 'foto13.jpg', 4567890, 'correo13@example.com', 1234567802, 1, 'M', 'password13'),
                        (NOW(), NOW(), 'Apellido14', 'Nombre14', 1, 1, 1, 'foto14.jpg', 5678901, 'correo14@example.com', 1234567803, 1, 'F', 'password14'),
                        (NOW(), NOW(), 'Apellido15', 'Nombre15', 1, 1, 1, 'foto15.jpg', 6789012, 'correo15@example.com', 1234567804, 1, 'M', 'password15'),
                        (NOW(), NOW(), 'Apellido16', 'Nombre16', 1, 1, 1, 'foto16.jpg', 7890123, 'correo16@example.com', 1234567805, 1, 'F', 'password16'),
                        (NOW(), NOW(), 'Apellido17', 'Nombre17', 1, 1, 1, 'foto17.jpg', 8901234, 'correo17@example.com', 1234567806, 1, 'M', 'password17'),
                        (NOW(), NOW(), 'Apellido18', 'Nombre18', 1, 1, 1, 'foto18.jpg', 9012345, 'correo18@example.com', 1234567807, 1, 'F', 'password18'),
                        (NOW(), NOW(), 'Apellido19', 'Nombre19', 1, 1, 1, 'foto19.jpg', 1234567, 'correo19@example.com', 1234567808, 1, 'M', 'password19'),
                        (NOW(), NOW(), 'Apellido20', 'Nombre20', 1, 1, 1, 'foto20.jpg', 2345678, 'correo20@example.com', 1234567809, 1, 'F', 'password20');
                    ";
                    DB::statement($consulta);                
                    DB::commit();
                    return "Consulta ejecutada correctamente";

                } catch (\Exception $e) {
                    DB::rollback();
                    return "Error: " . $e->getMessage();
                }     










                $consulta = "
                    INSERT INTO empleados (created_at, updated_at, lastname, firstname, hotel_id, nivel_id, cargo_id, foto, ci, email, celular, contratacion_id, genero, password)
                    VALUES
                    (NOW(), NOW(), 'Apellido1', 'Nombre1', 1, 1, 1, 'foto1.jpg', 1234567, 'correo1@example.com', 1234567890, 1, 'M', 'password1'),
                    (NOW(), NOW(), 'Apellido3', 'Nombre3', 1, 1, 1, 'foto3.jpg', 3456789, 'correo3@example.com', 1234567892, 1, 'M', 'password3'),
                    (NOW(), NOW(), 'Apellido2', 'Nombre2', 1, 1, 1, 'foto2.jpg', 2345678, 'correo2@example.com', 1234567891, 1, 'F', 'password2'),
                    (NOW(), NOW(), 'Apellido4', 'Nombre4', 1, 1, 1, 'foto4.jpg', 4567890, 'correo4@example.com', 1234567893, 1, 'F', 'password4'),
                    (NOW(), NOW(), 'Apellido5', 'Nombre5', 1, 1, 1, 'foto5.jpg', 5678901, 'correo5@example.com', 1234567894, 1, 'M', 'password5'),
                    (NOW(), NOW(), 'Apellido6', 'Nombre6', 1, 1, 1, 'foto6.jpg', 6789012, 'correo6@example.com', 1234567895, 1, 'F', 'password6'),
                    (NOW(), NOW(), 'Apellido7', 'Nombre7', 1, 1, 1, 'foto7.jpg', 7890123, 'correo7@example.com', 1234567896, 1, 'M', 'password7'),
                    (NOW(), NOW(), 'Apellido8', 'Nombre8', 1, 1, 1, 'foto8.jpg', 8901234, 'correo8@example.com', 1234567897, 1, 'F', 'password8'),
                    (NOW(), NOW(), 'Apellido9', 'Nombre9', 1, 1, 1, 'foto9.jpg', 9012345, 'correo9@example.com', 1234567898, 1, 'M', 'password9'),
                    (NOW(), NOW(), 'Apellido10', 'Nombre10', 1, 1, 1, 'foto10.jpg', 1234567, 'correo10@example.com', 1234567899, 1, 'F', 'password10'),
                    (NOW(), NOW(), 'Apellido11', 'Nombre11', 1, 1, 1, 'foto11.jpg', 2345678, 'correo11@example.com', 1234567800, 1, 'M', 'password11'),
                    (NOW(), NOW(), 'Apellido12', 'Nombre12', 1, 1, 1, 'foto12.jpg', 3456789, 'correo12@example.com', 1234567801, 1, 'F', 'password12'),
                    (NOW(), NOW(), 'Apellido13', 'Nombre13', 1, 1, 1, 'foto13.jpg', 4567890, 'correo13@example.com', 1234567802, 1, 'M', 'password13'),
                    (NOW(), NOW(), 'Apellido14', 'Nombre14', 1, 1, 1, 'foto14.jpg', 5678901, 'correo14@example.com', 1234567803, 1, 'F', 'password14'),
                    (NOW(), NOW(), 'Apellido15', 'Nombre15', 1, 1, 1, 'foto15.jpg', 6789012, 'correo15@example.com', 1234567804, 1, 'M', 'password15'),
                    (NOW(), NOW(), 'Apellido16', 'Nombre16', 1, 1, 1, 'foto16.jpg', 7890123, 'correo16@example.com', 1234567805, 1, 'F', 'password16'),
                    (NOW(), NOW(), 'Apellido17', 'Nombre17', 1, 1, 1, 'foto17.jpg', 8901234, 'correo17@example.com', 1234567806, 1, 'M', 'password17'),
                    (NOW(), NOW(), 'Apellido18', 'Nombre18', 1, 1, 1, 'foto18.jpg', 9012345, 'correo18@example.com', 1234567807, 1, 'F', 'password18'),
                    (NOW(), NOW(), 'Apellido19', 'Nombre19', 1, 1, 1, 'foto19.jpg', 1234567, 'correo19@example.com', 1234567808, 1, 'M', 'password19'),
                    (NOW(), NOW(), 'Apellido20', 'Nombre20', 1, 1, 1, 'foto20.jpg', 2345678, 'correo20@example.com', 1234567809, 1, 'F', 'password20');
                ";
            
                DB::statement($consulta);
                dd("Consulta ejecutada correctamente");
                return "Consulta ejecutada correctamente";
                break;
                case 'fill_hotels':
                    $consulta = "
                    INSERT INTO hotels (name, direccion, telefono, activo, created_at, updated_at) VALUES
                    ('Hotel A', 'Dirección A', 1234567890, 1, NOW(), NOW()),
                    ('Hotel B', 'Dirección B', 9876543210, 0, NOW(), NOW()),
                    ('Hotel C', 'Dirección C', 5555555555, 1, NOW(), NOW()),
                    ('Hotel D', 'Dirección D', 1111111111, 0, NOW(), NOW()),
                    ('Hotel E', 'Dirección E', 9999999999, 1, NOW(), NOW()),
                    ('Hotel F', 'Dirección F', 2222222222, 0, NOW(), NOW()),
                    ('Hotel G', 'Dirección G', 4444444444, 1, NOW(), NOW()),
                    ('Hotel H', 'Dirección H', 6666666666, 0, NOW(), NOW()),
                    ('Hotel I', 'Dirección I', 7777777777, 1, NOW(), NOW()),
                    ('Hotel J', 'Dirección J', 8888888888, 0, NOW(), NOW());
                    ";
                    DB::statement($consulta);
                    dd("Consulta ejecutada correctamente");
                    return "Consulta ejecutada correctamente";
                    break;
                case 'fill_graphics':
                    $consulta = "
                    INSERT INTO graphics (nombre_grafico, graphical_representation, competencies, competency_levels, employee_skills, representacion_grafica, descripcion)
                    VALUES
                    ('Gráfico 1', 'Representación 1', 'Competencia 1', 'Nivel 1', 'Habilidades 1', 'Descripción 1', 'Descripción de Gráfico 1'),
                    ('Gráfico 2', 'Representación 2', 'Competencia 2', 'Nivel 2', 'Habilidades 2', 'Descripción 2', 'Descripción de Gráfico 2'),
                    ('Gráfico 3', 'Representación 3', 'Competencia 3', 'Nivel 3', 'Habilidades 3', 'Descripción 3', 'Descripción de Gráfico 3'),
                    ('Gráfico 4', 'Representación 4', 'Competencia 4', 'Nivel 4', 'Habilidades 4', 'Descripción 4', 'Descripción de Gráfico 4'),
                    ('Gráfico 5', 'Representación 5', 'Competencia 5', 'Nivel 5', 'Habilidades 5', 'Descripción 5', 'Descripción de Gráfico 5'),
                    ('Gráfico 6', 'Representación 6', 'Competencia 6', 'Nivel 6', 'Habilidades 6', 'Descripción 6', 'Descripción de Gráfico 6'),
                    ('Gráfico 7', 'Representación 7', 'Competencia 7', 'Nivel 7', 'Habilidades 7', 'Descripción 7', 'Descripción de Gráfico 7'),
                    ('Gráfico 8', 'Representación 8', 'Competencia 8', 'Nivel 8', 'Habilidades 8', 'Descripción 8', 'Descripción de Gráfico 8'),
                    ('Gráfico 9', 'Representación 9', 'Competencia 9', 'Nivel 9', 'Habilidades 9', 'Descripción 9', 'Descripción de Gráfico 9'),
                    ('Gráfico 10', 'Representación 10', 'Competencia 10', 'Nivel 10', 'Habilidades 10', 'Descripción 10', 'Descripción de Gráfico 10');
                    ";
                    DB::statement($consulta);
                    dd("Consulta ejecutada correctamente");
                    return "Consulta ejecutada correctamente";
                    break;                    
                case 'fill_qrcode':
                    $consulta = "
                    INSERT INTO qr_codes (id, created_at, updated_at, name, qr_code_data)
                    VALUES
                        (1, NOW(), NOW(), 'Dato 1', 'Datos ficticios 1'),
                        (2, NOW(), NOW(), 'Dato 2', 'Datos ficticios 2'),
                        (3, NOW(), NOW(), 'Dato 3', 'Datos ficticios 3'),
                        (4, NOW(), NOW(), 'Dato 4', 'Datos ficticios 4'),
                        (5, NOW(), NOW(), 'Dato 5', 'Datos ficticios 5'),
                        (6, NOW(), NOW(), 'Dato 6', 'Datos ficticios 6'),
                        (7, NOW(), NOW(), 'Dato 7', 'Datos ficticios 7'),
                        (8, NOW(), NOW(), 'Dato 8', 'Datos ficticios 8'),
                        (9, NOW(), NOW(), 'Dato 9', 'Datos ficticios 9'),
                        (10, NOW(), NOW(), 'Dato 10', 'Datos ficticios 10');
                    ";                    
                    DB::statement($consulta);
                    dd("Consulta ejecutada correctamente");
                    return "Consulta ejecutada correctamente";
                    break;
                case 'fill_cargos':
                    $consulta = "
                    INSERT INTO cargos (nombre, descripcion, salario, area_id, hotel_id) VALUES
                        ('Cargo 1', 'Descripción 1', 1500.00, 1, 1),
                        ('Cargo 2', 'Descripción 2', 1800.00, 1, 2),
                        ('Cargo 3', 'Descripción 3', 2000.00, 2, 2),
                        ('Cargo 4', 'Descripción 4', 1700.00, 2, 1),
                        ('Cargo 5', 'Descripción 5', 1600.00, 1, 1),
                        ('Cargo 6', 'Descripción 6', 1900.00, 1, 2),
                        ('Cargo 7', 'Descripción 7', 2200.00, 2, 2),
                        ('Cargo 8', 'Descripción 8', 1750.00, 2, 1),
                        ('Cargo 9', 'Descripción 9', 1650.00, 1, 1),
                        ('Cargo 10', 'Descripción 10', 1950.00, 1, 2);                                        
                    ";                    
                    DB::statement($consulta);
                    dd("Consulta ejecutada correctamente");
                    return "Consulta ejecutada correctamente";                    
                    break;
            default:
                # code...
                dd('NO SE ENCONTRO TABLA PARA EL FILLED');
                break;
        }
    }
    public function mostrarVista()
    {
        return view('tables');
    }

    public function Filled_Empleados()
    {
        $consulta = "
            INSERT INTO empleados (lastname, firstname, hotel_id, nivel_id, cargo_id, area_id, foto, ci, email, celular, contratacion_id, genero, password, created_at, updated_at)
            VALUES
            ('Apellido1', 'Nombre1', 1, 1, 1, 1, 'foto1.jpg', 1234567, 'correo1@example.com', 1234567890, 1, 'M', 'password1', NOW(), NOW()),
            ('Apellido2', 'Nombre2', 1, 1, 1, 1, 'foto2.jpg', 2345678, 'correo2@example.com', 1234567891, 1, 'F', 'password2', NOW(), NOW()),
            ('Apellido3', 'Nombre3', 1, 1, 1, 1, 'foto3.jpg', 3456789, 'correo3@example.com', 1234567892, 1, 'M', 'password3', NOW(), NOW()),
            ('Apellido4', 'Nombre4', 1, 1, 1, 1, 'foto4.jpg', 4567890, 'correo4@example.com', 1234567893, 1, 'F', 'password4', NOW(), NOW()),
            ('Apellido5', 'Nombre5', 1, 1, 1, 1, 'foto5.jpg', 5678901, 'correo5@example.com', 1234567894, 1, 'M', 'password5', NOW(), NOW()),
            ('Apellido6', 'Nombre6', 1, 1, 1, 1, 'foto6.jpg', 6789012, 'correo6@example.com', 1234567895, 1, 'F', 'password6', NOW(), NOW()),
            ('Apellido7', 'Nombre7', 1, 1, 1, 1, 'foto7.jpg', 7890123, 'correo7@example.com', 1234567896, 1, 'M', 'password7', NOW(), NOW()),
            ('Apellido8', 'Nombre8', 1, 1, 1, 1, 'foto8.jpg', 8901234, 'correo8@example.com', 1234567897, 1, 'F', 'password8', NOW(), NOW()),
            ('Apellido9', 'Nombre9', 1, 1, 1, 1, 'foto9.jpg', 9012345, 'correo9@example.com', 1234567898, 1, 'M', 'password9', NOW(), NOW()),
            ('Apellido10', 'Nombre10', 1, 1, 1, 1, 'foto10.jpg', 1234567, 'correo10@example.com', 1234567899, 1, 'F', 'password10', NOW(), NOW()),
            ('Apellido11', 'Nombre11', 1, 1, 1, 1, 'foto11.jpg', 2345678, 'correo11@example.com', 1234567800, 1, 'M', 'password11', NOW(), NOW()),
            ('Apellido12', 'Nombre12', 1, 1, 1, 1, 'foto12.jpg', 3456789, 'correo12@example.com', 1234567801, 1, 'F', 'password12', NOW(), NOW()),
            ('Apellido13', 'Nombre13', 1, 1, 1, 1, 'foto13.jpg', 4567890, 'correo13@example.com', 1234567802, 1, 'M', 'password13', NOW(), NOW()),
            ('Apellido14', 'Nombre14', 1, 1, 1, 1, 'foto14.jpg', 5678901, 'correo14@example.com', 1234567803, 1, 'F', 'password14', NOW(), NOW()),
            ('Apellido15', 'Nombre15', 1, 1, 1, 1, 'foto15.jpg', 6789012, 'correo15@example.com', 1234567804, 1, 'M', 'password15', NOW(), NOW()),
            ('Apellido16', 'Nombre16', 1, 1, 1, 1, 'foto16.jpg', 7890123, 'correo16@example.com', 1234567805, 1, 'F', 'password16', NOW(), NOW()),
            ('Apellido17', 'Nombre17', 1, 1, 1, 1, 'foto17.jpg', 8901234, 'correo17@example.com', 1234567806, 1, 'M', 'password17', NOW(), NOW()),
            ('Apellido18', 'Nombre18', 1, 1, 1, 1, 'foto18.jpg', 9012345, 'correo18@example.com', 1234567807, 1, 'F', 'password18', NOW(), NOW()),
            ('Apellido19', 'Nombre19', 1, 1, 1, 1, 'foto19.jpg', 1234567, 'correo19@example.com', 1234567808, 1, 'M', 'password19', NOW(), NOW()),
            ('Apellido20', 'Nombre20', 1, 1, 1, 1, 'foto20.jpg', 2345678, 'correo20@example.com', 1234567809, 1, 'F', 'password20', NOW(), NOW())
        ";
    
        DB::statement($consulta);
    
        return "Consulta ejecutada correctamente";
    }

    public function ejecutarConsulta2()
    {
        $resultado = DB::select('SELECT * FROM tabla2');
        // Realizar acciones adicionales con el resultado si es necesario
        return response()->json($resultado);
    }

    public function ejecutarConsulta3()
    {
        $resultado = DB::select('SELECT * FROM tabla3');
        // Realizar acciones adicionales con el resultado si es necesario
        return response()->json($resultado);
    }
}