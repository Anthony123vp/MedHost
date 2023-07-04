<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServicioMedHost;
use Illuminate\Support\Facades\DB;

class ServicioMedHostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::select("CREATE OR REPLACE VIEW cita_pendiente as
        SELECT a.id_reserva,a.id_paciente,a.id_medico_horario,h.id_medico,f.nombre AS especialidad,serv.nombre as servicio,c.nombre as serv_exacto,concat(h.nombres,' ',h.ape_paterno)AS medico,
        concat(paci.nombres,' ',paci.ape_paterno)AS paciente,
        horario.fecha,horario.hora_inicio,horario.hora_final,cons.cod_habitacion
        FROM cita_medica a
                INNER JOIN serviciosmedhost c ON a.id_servicio_medhost = c.id_servicio_medhost
                INNER JOIN servicios_especialidades e ON c.id_servicio_especialidad=e.id_servicio_especialidad
                INNER JOIN especialidades f ON e.id_especialidad=f.id_especialidad
                INNER JOIN servicios serv ON e.id_servicio=serv.id_servicio
                
                INNER JOIN medico_horarios g ON a.id_medico_horario=g.id_medico_horario
                INNER JOIN horarios horario ON g.id_horario = horario.id_horario
                
                
                INNER JOIN paciente paci on a.id_paciente = paci.id_paciente
                INNER JOIN medicos h ON g.id_medico = h.id_medico 
                INNER JOIN consultorios cons on h.id_consultorio=cons.id_consultorio

                
                where a.estado=1;");


        DB::select("CREATE OR REPLACE VIEW CITA_MEDICA_RECEPCIONISTA AS ( 
            SELECT a.id_reserva,a.modalidad,pac.dni,f.nombre AS especialidad,serv.nombre AS servicio ,concat(h.nombres,' ',h.ape_paterno)AS medico,cons.cod_habitacion,horario.fecha,horario.hora_inicio,
                    a.estado
            
                    FROM cita_medica a
                    
                    INNER JOIN serviciosmedhost c ON a.id_servicio_medhost = c.id_servicio_medhost
                    INNER JOIN servicios_especialidades e ON c.id_servicio_especialidad=e.id_servicio_especialidad
                    INNER JOIN especialidades f ON e.id_especialidad=f.id_especialidad
                    INNER JOIN servicios serv ON e.id_servicio=serv.id_servicio
                    
                    INNER JOIN medico_horarios g ON a.id_medico_horario=g.id_medico_horario
                    INNER JOIN horarios horario ON g.id_horario = horario.id_horario
                    INNER JOIN medicos h ON g.id_medico = h.id_medico
                    INNER JOIN consultorios cons on h.id_consultorio=cons.id_consultorio
                   
                    INNER JOIN paciente pac ON a.id_paciente=pac.id_paciente);");

        DB::select("CREATE OR REPLACE VIEW HORARIO_MEDICO AS (
            select a.id_medico_horario,m.id_medico,m.nombres,b.fecha,b.hora_inicio,b.hora_final,a.estado from medico_horarios a 
            inner join horarios b on a.id_horario=b.id_horario 
            inner join medicos m on a.id_medico=m.id_medico)");
            
        DB::select("CREATE OR REPLACE VIEW SERVICIOMEDHOST AS (SELECT b.id_servicio,c.id_especialidad,servicio.id_servicio_medhost,servicio.nombre,servicio.precio FROM serviciosmedhost servicio  
        INNER JOIN servicios_especialidades a ON servicio.id_servicio_especialidad=a.id_servicio_especialidad
        INNER JOIN servicios b ON a.id_servicio=b.id_servicio
        INNER JOIN especialidades  c ON a.id_especialidad=c.id_especialidad);");

        // DB::statement("CREATE OR REPLACE PROCEDURE `generadorInforme`()
        
        // BEGIN
        //     INSERT INTO  MedHostHistorial.reserva(id_reserva,id_paciente,paciente,medico,especialidad,servicio,serv_exacto,fecha,hora_inicio,hora_final,cod_habitacion,created_at) 
            
        //     SELECT a.id_reserva,a.id_paciente,concat(paci.nombres,' ',paci.ape_paterno,' ',paci.ape_materno) AS paciente,
        //     concat(h.nombres,' ',h.ape_paterno,' ',h.ape_materno) AS Medico,f.nombre AS especialidad,serv.nombre as servicio,
        //     c.nombre as serv_exacto,horario.fecha,horario.hora_inicio,horario.hora_final,cons.cod_habitacion,SYSDATE()
        //     FROM cita_medica a
        //             INNER JOIN serviciosmedhost c ON a.id_servicio_medhost = c.id_servicio_medhost
        //             INNER JOIN servicios_especialidades e ON c.id_servicio_especialidad=e.id_servicio_especialidad
        //             INNER JOIN especialidades f ON e.id_especialidad=f.id_especialidad
        //             INNER JOIN servicios serv ON e.id_servicio=serv.id_servicio
                    
        //             INNER JOIN medico_horarios g ON a.id_medico_horario=g.id_medico_horario
        //             INNER JOIN horarios horario ON g.id_horario = horario.id_horario
                
                    
        //             INNER JOIN paciente paci on a.id_paciente = paci.id_paciente
        //             INNER JOIN medicos h ON g.id_medico = h.id_medico
        //             INNER JOIN consultorios cons on cons.id_consultorio=h.id_consultorio
        //             where a.estado='0';

            
        //     INSERT INTO MedHostHistorial.examen_resultado(id_examen,id_reserva,resultados,observacion,created_at)
        //     SELECT id_examen,id_reserva,resultados,observacion,SYSDATE() FROM examen_resultado;
        //     SET FOREIGN_KEY_CHECKS=0;
        //     SET SQL_SAFE_UPDATES = 0;
        //     DELETE FROM examen_resultado;
        //     DELETE FROM cita_medica WHERE estado='0';
        //     SET SQL_SAFE_UPDATES = 1;
        //     SET FOREIGN_KEY_CHECKS=1;
        // END;
        
        // ");

        // DB::statement("CREATE PROCEDURE `hora_create`(
        //     IN `fecha` date,
        //     IN `hora_inicio` time,
        //     IN `hora_final` time,
        //     OUT `totalhorarios` int
        // )
        // BEGIN
        
        //     declare start_time TIME;
        //     declare end_time TIME;
        //     declare contador INT;
        //     declare id_hora int;
        //     set contador=1;
        //     insert into horarios (fecha,hora_inicio,hora_final,created_at,updated_at) VALUES(fecha,hora_inicio,ADDTIME(hora_inicio,'00:30:00'),sysdate(),sysdate());
        //     while hora_inicio<hora_final DO
        //         set start_time=ADDTIME(hora_inicio,'00:30:00');
        //         set end_time=ADDTIME(start_time,'00:30:00');
        //         insert into horarios (fecha,hora_inicio,hora_final,created_at,updated_at) VALUES(fecha,start_time,end_time,sysdate(),sysdate());
        //         set hora_inicio=end_time;
        //         set contador=contador+1;
        //     END WHILE; 
        //     set totalhorarios=contador;
        // END;");

        // DB::statement("CREATE DEFINER=`root`@`localhost` PROCEDURE `registro_total`(
        //     IN `medico` int
        // )
        
        // BEGIN
        //     declare contador int;
        //     select @horas into contador;
        //     insert into medico_horarios(id_medico,id_horario,created_at,updated_at)
        //     select medico,id_horario,sysdate(),sysdate() from horarios order by created_at desc limit contador;
        // END;");

    }
}
