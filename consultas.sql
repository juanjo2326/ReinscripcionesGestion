select * from alumnos;
select * from areas;
select * from carreras;
select * from carga;
select * from cargatem;
select * from docentes;
select * from horarios;
select * from dias;
delete from dias where idHorario between 2 and 100;
delete from horarios where idHorario between 2 and 100;
select * from kardex;
select * from materias order by idMateria;
select * from pago;
select * from reinscripcion;
select * from usuarios;

select * from horarios h join dias d join carreras c on d.idHorario=h.idHorario and h.idCarrera= c.idCarrera where año=2020 and periodo="enero-junio" and semestre="8vo" and turno="v" and h.idCarrera=1;

select * from usuarios u join alumnos a join carreras c on u.noControl=a.noControl and a.idCarrera=c.idCarrera where usuario = "jesus" and contra="1234";
select * from kardex k join materias m join alumnos a on k.noControl=a.noControl and k.idMateria=m.idMateria where k.noControl =16640100 order by m.semestre;

select * from pago p join alumnos a on p.noControl=a.noControl where p.noControl=16640100;
select * from reinscripcion r join pago p join alumnos a on r.idPago=p.idPago and r.noControl=a.noControl where r.noControl=16640100;

select idHorario from horarios order by idHorario desc limit 1 ;