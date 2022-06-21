create database CreaTecAlgabo;

use CreaTecAlgabo;

create table Empleado(
dni int unique,
apellido varchar(30) not null,
nombre varchar(30) not null,
puesto varchar(30) not null,
id_tarjeta int unique auto_increment,
usuario varchar(30) not null unique,
pass varchar(30) not null,
primary key (id_tarjeta)
);

create table Producto(
codigo int unique,
nom_prod varchar(50) not null,
primary key (codigo)
);

create table lecturasRFID(
id_registro int unique auto_increment,
uid int ,
idlector int unique,
fecha date,
hora time not null,
primary key(id_registro)
);

create table accesoPersonal(
id_personal int unique auto_increment,
uid int ,
idmolinete int unique,
sentido varchar(30) not null,
fecha date,
hora time not null,
primary key(id_personal)
);

create table MateriaPrima(
id_ingreso int unique auto_increment,
id_empleado int,
proveedor varchar(50) not null,
fecha date,
hora time not null,
nom_mat varchar(50) not null,
cod_mat int,
cant int,
primary key (id_ingreso),
foreign key (id_empleado) references Empleado (id_tarjeta)
);

create table egreso(
id_expedicion int unique auto_increment,
id_empleado int,
id_producto int,
fecha date,
hora time not null,
primary key (id_expedicion),
foreign key (id_empleado) references Empleado (id_tarjeta),
foreign key (id_producto) references Producto (codigo)
);

select * from empleado;
select * from producto;
select * from egreso;