drop database if exists autoservicios;

create database autoservicios;
use autoservicios;

create table if not exists alumnos (
    matricula varchar(9) not null primary key,
    ap_paterno varchar(50) not null,
    ap_materno varchar(50) not null,
    nombres varchar(60) not null,
    semestre int(2) not null,
    foto varchar(50)
);

create table if not exists materias (
    id_materia varchar(7) not null primary key,
    nombre_materia varchar(50) not null
);

create table if not exists cursadas (
    matricula varchar(9) not null,
    id_materia varchar(7) not null,
    calificacion int(2) not null,

    foreign key (matricula) references alumnos(matricula),
    foreign key (id_materia) references materias(id_materia),
    primary key (matricula, id_materia)
);

create view alumnos_con_promedio as
select a.matricula, a.ap_paterno, a.ap_materno, a.nombres, a.semestre, prom.promedio, ap.aprobadas, n.no_aprobadas
from alumnos as a
left join (
    select matricula, avg(calificacion) as promedio
    from cursadas
    group by matricula
) as prom
on a.matricula = prom.matricula
left join (
    select matricula, count(calificacion) as aprobadas
    from cursadas
    where calificacion >= 6
    group by matricula
) as ap
on a.matricula = ap.matricula
left join (
    select matricula, count(calificacion) as no_aprobadas
    from cursadas
    where calificacion < 6
    group by matricula
) as n
on a.matricula = n.matricula;

insert into alumnos (matricula, ap_paterno, ap_materno, nombres, semestre) values
("201734576", "Coria", "Rios", "Marco Antonio", 9),
("201831186", "Reyes", "Morales", "Arturo", 7),
("201754197", "Corona", "Flores", "Andrea", 8);

insert into materias (id_materia, nombre_materia) values
("ICCS001", "Matemáticas"),
("CCOS003", "Álgebra Superior"),
("CCOS013", "Estructuras de Datos"),
("FGUS001", "Formación Humana y Social"),
("FGUS002", "DHPC"),
("ICCS006", "Ecuaciones Diferenciales"),
("CCOS261", "Graficación"),
("CCOS252", "Sistemas Operativos I"),
("ISCC201", "Arquitectura de Computadoras"),
("ICCS257", "Minería de Datos");

insert into cursadas (matricula, id_materia, calificacion) values
("201734576", "ICCS257", 9),
("201734576", "ISCC201", 8),
("201734576", "FGUS002", 6),
("201734576", "CCOS013", 10),
("201734576", "CCOS261", 9),
("201831186", "ICCS001", 7),
("201831186", "FGUS001", 10),
("201831186", "FGUS002", 10),
("201831186", "CCOS013", 5),
("201831186", "CCOS261", 6),
("201754197", "FGUS002", 10),
("201754197", "CCOS013", 10),
("201754197", "ICCS006", 5),
("201754197", "CCOS252", 5),
("201754197", "ICCS257", 7);