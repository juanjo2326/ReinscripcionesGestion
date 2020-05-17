select * from alumnos;
select * from areas;
select * from carreras;
select * from carga;
select * from cargatem;
select * from docentes;
select * from horarios;
select * from dias;
select * from kardex;
select * from materias order by idMateria;
select * from pago;
select * from reinscripcion;
select * from usuarios;

select * from horarios h join dias d on h.idHorario= d.idHorario;
select * from dias;

insert into horarios(idHorario, semestre, carrera, turno, año, periodo, idCarrera) 
values (1, "8vo", 1, "v", 2020, "enero-junio", 1);
insert into dias(idD, hora, lunes, martes, miercoles, jueves, viernes, idHorario)
values(1,"7-8", "1","2","3","4","5",1);

select * from horarios h join dias d join carreras c on h.idHorario=d.idHorario and h.idCarrera=c.idCarrera where   año=2020 and periodo="enero-junio" and semestre="8vo" and turno="v";
