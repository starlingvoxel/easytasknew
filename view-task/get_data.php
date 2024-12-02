<?php
// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "root";
$database = "tareas";

$conexion = new mysqli($host, $user, $password, $database);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta de datos
$sql = "SELECT 
    t.tarea_id AS tarea_id,  
    d.descripcion AS departamento, -- Obtenemos la descripción del departamento
    t.descripcion AS descripcion, 
    CASE 
        WHEN t.prioridad = 1 THEN 'Baja' 
        WHEN t.prioridad = 2 THEN 'Media' 
        WHEN t.prioridad = 3 THEN 'Alta' 
        ELSE 'Sin Prioridad' 
    END AS prioridad, -- Convertimos la prioridad en texto
    CASE 
        WHEN t.estatus = 0 THEN 'Retenido' 
        WHEN t.estatus = 1 THEN 'En proceso' 
        WHEN t.estatus = 2 THEN 'Listo' 
        WHEN t.estatus = 3 THEN 'No iniciado' 
        ELSE 'Sin Prioridad' 
    END AS estatus, -- Convertimos el estatus en texto
    CASE 
        WHEN t.tipo_caso = 1 THEN 'PC' 
        WHEN t.tipo_caso = 2 THEN 'Impresora' 
        WHEN t.tipo_caso = 3 THEN 'Internet' 
        WHEN t.tipo_caso = 4 THEN 'Telefono'
        WHEN t.tipo_caso = 5 THEN 'Software'
        WHEN t.tipo_caso = 6 THEN 'Otros'
        ELSE 'Sin Tipo' 
    END AS tipo_caso, -- Convertimos el tipo de caso en texto
    t.estatus AS estado, 
    GROUP_CONCAT(tec.nombre SEPARATOR '-') AS tecnicos_asignados
FROM 
    task t
JOIN 
    tarea_tecnico_asignado tt ON t.tarea_id = tt.id_tarea
JOIN 
    usuarios tec ON tt.id_tecnico = tec.id
JOIN 
    departamento d ON t.tarea_departamento_id = d.departamento_id -- JOIN para obtener la descripción del departamento
WHERE 
     t.estatus != 2 -- Excluimos las tareas con estatus 'Listo'
GROUP BY 
    t.tarea_id
ORDER BY 
    CASE 
        WHEN t.estatus = 3 THEN 1 -- No iniciado
        WHEN t.estatus = 1 THEN 2 -- En proceso
        WHEN t.estatus = 0 THEN 3 -- Retenido
        ELSE 4 -- Cualquier otro valor que no sea 'Listo'
    END";

$resultado = $conexion->query($sql);

$data = array();

while ($fila = $resultado->fetch_assoc()) {
    
    $data[] = $fila;
}

// Formato JSON para DataTables
echo json_encode(array("data" => $data));

// Cerrar la conexión
$conexion->close();
?>
