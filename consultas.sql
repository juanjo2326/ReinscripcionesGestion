select * from alumnos;
select * from areas;
select * from carreras;
select * from carga;
select * from cargatem;
select * from dias;
select * from docentes;
select * from horarios;
select * from kardex;
select * from materias order by idMateria;
select * from pago;
select * from reinscripcion;
select * from usuarios;

select * 
from kardex k 
join materias m 
join alumnos a 
on k.alumnos_matricula=a.matricula
and k.materias_idMateria=m.idMateria
where k.alumnos_matricula ="16640100" order by m.semestre;

select * from usuarios u join alumnos a join carreras c on u.noControl=a.matricula and a.idCarrera=c.idCarrera;

select * from horarios;
select * from dias;

select * from horarios h join dias d on h.idHorario=d.horarios_idHorario;

select * from carga c join cargatem ct join materias m on c.idCarga= ct.carga_idCarga and ct.materias_idMateria=m.idMateria  where alumnos_matricula=16640100 and periodo="enero-junio" and año="2020";

