<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FillContentTablesController extends Controller
{
    public function filled($tipo_tabla) {
        // dd($tipo_tabla);
        switch ($tipo_tabla) {
            case 'fill_areas':
                $consulta = "
                    INSERT INTO areas (ah_nombre, ah_descripcion, ah_ah_activo, hotel_id, created_at, updated_at)
                    VALUES
                    ('Nombre1', 'Descripción1', 'Activo1', 1, NOW(), NOW()),
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
                dd("Consulta ejecutada correctamente");
                return "Consulta ejecutada correctamente";
                break;
            case 'fill_nivels':
                $consulta = "
                    INSERT INTO nivels (name, Deficiente, Mejorable, Aceptable, Bueno, Excelente, created_at, updated_at)
                    VALUES
                    ('Nivel 1', 'Deficiente 1', 'Mejorable 1', 'Aceptable 1', 'Bueno 1', 'Excelente 1', NOW(), NOW()),
                    ('Nivel 2', 'Deficiente 2', 'Mejorable 2', 'Aceptable 2', 'Bueno 2', 'Excelente 2', NOW(), NOW()),
                    ('Nivel 3', 'Deficiente 3', 'Mejorable 3', 'Aceptable 3', 'Bueno 3', 'Excelente 3', NOW(), NOW()),
                    ('Nivel 4', 'Deficiente 4', 'Mejorable 4', 'Aceptable 4', 'Bueno 4', 'Excelente 4', NOW(), NOW()),
                    ('Nivel 5', 'Deficiente 5', 'Mejorable 5', 'Aceptable 5', 'Bueno 5', 'Excelente 5', NOW(), NOW()),
                    ('Nivel 6', 'Deficiente 6', 'Mejorable 6', 'Aceptable 6', 'Bueno 6', 'Excelente 6', NOW(), NOW()),
                    ('Nivel 7', 'Deficiente 7', 'Mejorable 7', 'Aceptable 7', 'Bueno 7', 'Excelente 7', NOW(), NOW()),
                    ('Nivel 8', 'Deficiente 8', 'Mejorable 8', 'Aceptable 8', 'Bueno 8', 'Excelente 8', NOW(), NOW()),
                    ('Nivel 9', 'Deficiente 9', 'Mejorable 9', 'Aceptable 9', 'Bueno 9', 'Excelente 9', NOW(), NOW()),
                    ('Nivel 10', 'Deficiente 10', 'Mejorable 10', 'Aceptable 10', 'Bueno 10', 'Excelente 10', NOW(), NOW());
                ";
                DB::statement($consulta);
                dd("Consulta ejecutada correctamente");
                return "Consulta ejecutada correctamente";
                break;
            case 'fill_empleados':
                $consulta = "
                    INSERT INTO empleados (id, created_at, updated_at, lastname, firstname, hotel_id, nivel_id, cargo_id, foto, ci, email, celular, contratacion_id, genero, password)
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
                    // $consulta = "
                    // INSERT INTO qr_codes (id, created_at, updated_at, name, qr_code_data)
                    // VALUES
                    // (NOW(), NOW(), 'Dato 1', 'O:24:\'Endroid\\QrCode\\QrCode\':7:{s:4:\'data\';s:18:\'https://www.ejemplo.com\';s:8:\'encoding\';O:24:\'Endroid\\QrCode\\Encoding\\Encoding\':0:{}s:23:\'errorCorrectionLevel\';O:24:\'Endroid\\QrCode\\ErrorCorrectionLevel\':2:{s:4:\'name\';s:3:\'Low\';s:5:\'value\';s:3:\'low\';}s:4:\'size\';i:300;s:6:\'margin\';i:10;s:20:\'roundBlockSizeMode\';O:24:\'Endroid\\QrCode\\RoundBlockSizeMode\':2:{s:4:\'name\';s:6:\'Margin\';s:5:\'value\';s:6:\'margin\';}s:15:\'foregroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:0;s:5:\'green\';i:0;s:4:\'blue\';i:0;s:5\:'alpha\';i:0;}s:16:\'backgroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:255;s:5:\'green\';i:255;s:4:\'blue\';i:255;s:5:\'alpha\';i:0;}\''),
                    // (NOW(), NOW(), 'Dato 2', 'O:24:\'Endroid\\QrCode\\QrCode\':7:{s:4:\'data\';s:18:\'https://www.ejemplo.com\';s:8:\'encoding\';O:24:\'Endroid\\QrCode\\Encoding\\Encoding\':0:{}s:23:\'errorCorrectionLevel\';O:24:\'Endroid\\QrCode\\ErrorCorrectionLevel\':2:{s:4:\'name\';s:3:\'Low\';s:5:\'value\';s:3:\'low\';}s:4:\'size\';i:300;s:6:\'margin\';i:10;s:20:\'roundBlockSizeMode\';O:24:\'Endroid\\QrCode\\RoundBlockSizeMode\':2:{s:4:\'name\';s:6:\'Margin\';s:5:\'value\';s:6:\'margin\';}s:15:\'foregroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:0;s:5:\'green\';i:0;s:4:\'blue\';i:0;s:5\:'alpha\';i:0;}s:16:\'backgroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:255;s:5:\'green\';i:255;s:4:\'blue\';i:255;s:5:\'alpha\';i:0;}\''),
                    // (NOW(), NOW(), 'Dato 3', 'O:24:\'Endroid\\QrCode\\QrCode\':7:{s:4:\'data\';s:18:\'https://www.ejemplo.com\';s:8:\'encoding\';O:24:\'Endroid\\QrCode\\Encoding\\Encoding\':0:{}s:23:\'errorCorrectionLevel\';O:24:\'Endroid\\QrCode\\ErrorCorrectionLevel\':2:{s:4:\'name\';s:3:\'Low\';s:5:\'value\';s:3:\'low\';}s:4:\'size\';i:300;s:6:\'margin\';i:10;s:20:\'roundBlockSizeMode\';O:24:\'Endroid\\QrCode\\RoundBlockSizeMode\':2:{s:4:\'name\';s:6:\'Margin\';s:5:\'value\';s:6:\'margin\';}s:15:\'foregroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:0;s:5:\'green\';i:0;s:4:\'blue\';i:0;s:5\:'alpha\';i:0;}s:16:\'backgroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:255;s:5:\'green\';i:255;s:4:\'blue\';i:255;s:5:\'alpha\';i:0;}\''),
                    // (NOW(), NOW(), 'Dato 4', 'O:24:\'Endroid\\QrCode\\QrCode\':7:{s:4:\'data\';s:18:\'https://www.ejemplo.com\';s:8:\'encoding\';O:24:\'Endroid\\QrCode\\Encoding\\Encoding\':0:{}s:23:\'errorCorrectionLevel\';O:24:\'Endroid\\QrCode\\ErrorCorrectionLevel\':2:{s:4:\'name\';s:3:\'Low\';s:5:\'value\';s:3:\'low\';}s:4:\'size\';i:300;s:6:\'margin\';i:10;s:20:\'roundBlockSizeMode\';O:24:\'Endroid\\QrCode\\RoundBlockSizeMode\':2:{s:4:\'name\';s:6:\'Margin\';s:5:\'value\';s:6:\'margin\';}s:15:\'foregroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:0;s:5:\'green\';i:0;s:4:\'blue\';i:0;s:5\:'alpha\';i:0;}s:16:\'backgroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:255;s:5:\'green\';i:255;s:4:\'blue\';i:255;s:5:\'alpha\';i:0;}\''),
                    // (NOW(), NOW(), 'Dato 5', 'O:24:\'Endroid\\QrCode\\QrCode\':7:{s:4:\'data\';s:18:\'https://www.ejemplo.com\';s:8:\'encoding\';O:24:\'Endroid\\QrCode\\Encoding\\Encoding\':0:{}s:23:\'errorCorrectionLevel\';O:24:\'Endroid\\QrCode\\ErrorCorrectionLevel\':2:{s:4:\'name\';s:3:\'Low\';s:5:\'value\';s:3:\'low\';}s:4:\'size\';i:300;s:6:\'margin\';i:10;s:20:\'roundBlockSizeMode\';O:24:\'Endroid\\QrCode\\RoundBlockSizeMode\':2:{s:4:\'name\';s:6:\'Margin\';s:5:\'value\';s:6:\'margin\';}s:15:\'foregroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:0;s:5:\'green\';i:0;s:4:\'blue\';i:0;s:5\:'alpha\';i:0;}s:16:\'backgroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:255;s:5:\'green\';i:255;s:4:\'blue\';i:255;s:5\:'alpha\';i:0;}\''),                        
                    // (NOW(), NOW(), 'Dato 1', 'O:24:\'Endroid\\QrCode\\QrCode\':7:{s:4:\'data\';s:18:\'https://www.ejemplo.com\';s:8:\'encoding\';O:24:\'Endroid\\QrCode\\Encoding\\Encoding\':0:{}s:23:\'errorCorrectionLevel\';O:24:\'Endroid\\QrCode\\ErrorCorrectionLevel\':2:{s:4:\'name\';s:3:\'Low\';s:5:\'value\';s:3:\'low\';}s:4:\'size\';i:300;s:6:\'margin\';i:10;s:20:\'roundBlockSizeMode\';O:24:\'Endroid\\QrCode\\RoundBlockSizeMode\':2:{s:4:\'name\';s:6:\'Margin\';s:5:\'value\';s:6:\'margin\';}s:15:\'foregroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:0;s:5:\'green\';i:0;s:4:\'blue\';i:0;s:5:\'alpha\';i:0;}s:16:\'backgroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:255;s:5:\'green\';i:255;s:4:\'blue\';i:255;s:5:\'alpha\';i:0;}\''),
                    // (NOW(), NOW(), 'Dato 2', 'O:24:\'Endroid\\QrCode\\QrCode\':7:{s:4:\'data\';s:18:\'https://www.ejemplo.com\';s:8:\'encoding\';O:24:\'Endroid\\QrCode\\Encoding\\Encoding\':0:{}s:23:\'errorCorrectionLevel\';O:24:\'Endroid\\QrCode\\ErrorCorrectionLevel\':2:{s:4:\'name\';s:3:\'Low\';s:5:\'value\';s:3:\'low\';}s:4:\'size\';i:300;s:6:\'margin\';i:10;s:20:\'roundBlockSizeMode\';O:24:\'Endroid\\QrCode\\RoundBlockSizeMode\':2:{s:4:\'name\';s:6:\'Margin\';s:5:\'value\';s:6:\'margin\';}s:15:\'foregroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:0;s:5:\'green\';i:0;s:4:\'blue\';i:0;s:5:\'alpha\';i:0;}s:16:\'backgroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:255;s:5:\'green\';i:255;s:4:\'blue\';i:255;s:5:\'alpha\';i:0;}\''),
                    // (NOW(), NOW(), 'Dato 3', 'O:24:\'Endroid\\QrCode\\QrCode\':7:{s:4:\'data\';s:18:\'https://www.ejemplo.com\';s:8:\'encoding\';O:24:\'Endroid\\QrCode\\Encoding\\Encoding\':0:{}s:23:\'errorCorrectionLevel\';O:24:\'Endroid\\QrCode\\ErrorCorrectionLevel\':2:{s:4:\'name\';s:3:\'Low\';s:5:\'value\';s:3:\'low\';}s:4:\'size\';i:300;s:6:\'margin\';i:10;s:20:\'roundBlockSizeMode\';O:24:\'Endroid\\QrCode\\RoundBlockSizeMode\':2:{s:4:\'name\';s:6:\'Margin\';s:5:\'value\';s:6:\'margin\';}s:15:\'foregroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:0;s:5:\'green\';i:0;s:4:\'blue\';i:0;s:5:\'alpha\';i:0;}s:16:\'backgroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:255;s:5:\'green\';i:255;s:4:\'blue\';i:255;s:5:\'alpha\';i:0;}\''),
                    // (NOW(), NOW(), 'Dato 4', 'O:24:\'Endroid\\QrCode\\QrCode\':7:{s:4:\'data\';s:18:\'https://www.ejemplo.com\';s:8:\'encoding\';O:24:\'Endroid\\QrCode\\Encoding\\Encoding\':0:{}s:23:\'errorCorrectionLevel\';O:24:\'Endroid\\QrCode\\ErrorCorrectionLevel\':2:{s:4:\'name\';s:3:\'Low\';s:5:\'value\';s:3:\'low\';}s:4:\'size\';i:300;s:6:\'margin\';i:10;s:20:\'roundBlockSizeMode\';O:24:\'Endroid\\QrCode\\RoundBlockSizeMode\':2:{s:4:\'name\';s:6:\'Margin\';s:5:\'value\';s:6:\'margin\';}s:15:\'foregroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:0;s:5:\'green\';i:0;s:4:\'blue\';i:0;s:5\:'alpha\';i:0;}s:16:\'backgroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:255;s:5:\'green\';i:255;s:4:\'blue\';i:255;s:5:\'alpha\';i:0;}\''),
                    // (NOW(), NOW(), 'Dato 5', 'O:24:\'Endroid\\QrCode\\QrCode\':7:{s:4:\'data\';s:18:\'https://www.ejemplo.com\';s:8:\'encoding\';O:24:\'Endroid\\QrCode\\Encoding\\Encoding\':0:{}s:23:\'errorCorrectionLevel\';O:24:\'Endroid\\QrCode\\ErrorCorrectionLevel\':2:{s:4:\'name\';s:3:\'Low\';s:5:\'value\';s:3:\'low\';}s:4:\'size\';i:300;s:6:\'margin\';i:10;s:20:\'roundBlockSizeMode\';O:24:\'Endroid\\QrCode\\RoundBlockSizeMode\':2:{s:4:\'name\';s:6:\'Margin\';s:5:\'value\';s:6:\'margin\';}s:15:\'foregroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:0;s:5:\'green\';i:0;s:4:\'blue\';i:0;s:5:\'alpha\';i:0;}s:16:\'backgroundColor\';O:24:\'Endroid\\QrCode\\Color\\Color\':4:{s:3:\'red\';i:255;s:5\:'green\';i:255;s:4:\'blue\';i:255;s:5:\'alpha\';i:0;}\'');                    
                    // ";
                    DB::statement($consulta);
                    dd("Consulta ejecutada correctamente");
                    return "Consulta ejecutada correctamente";
                    break;
            default:
                # code...
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