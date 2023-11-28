create database jds_database;
use jds_database;

create table usuario(
id_user int auto_increment primary key,
name_user varchar(20) not null,
lastname_user varchar (40) not null,
email_user varchar(40) unique,
password_user varchar(20),
role_user enum('Empleado','Cliente'),
state_user enum('activo','inactivo')
);

select * from usuario;

insert into usuario( email_user, password_user, role_user, state_user) Values("nico@gmail.com", "123", 1,1);

create table maquinas(
id_machine int primary key,
make_machine varchar (30) not null,
type_machine varchar(30) not null
);

create table empleado(
id_emple int primary key,
post_emple varchar (10) not null,
idUserFK int,
foreign key (idUserFK) references usuario(id_user)
);

create table notificacion_maqui(
id_notify int primary key,
time_notify datetime not null,
idMachineFK int,
idEmpleFK int,
foreign key (idMachineFK) references maquinas(id_machine),
foreign key (idEmpleFK) references empleado(id_emple)
);

create table cliente(
id_client int primary key,
phone_clie varchar(11),
email_clie varchar(40) not null unique,
idUserFk int,
foreign key (idUserFK) references usuario(id_user)
);


create table servicio(
id_servi int primary key,
price_servi double not null,
type_servi varchar(30) not null,
descrip_servi varchar(50) not null
);


create table cita(
id_cita int primary key,
date_meet datetime not null,
idServiFK int,
idClieFK Int,
foreign key(idServiFK) references servicio(id_servi),
foreign key(idClieFK) references cliente(id_client)
);

create table resultados(
id_obser int primary key,
observa_obser varchar(120),
idCitaFK int,      
foreign key (idCitaFK) references cita(id_cita)
);