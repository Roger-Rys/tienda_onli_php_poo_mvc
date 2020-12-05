CREATE DATABASE tienda_master;
use tienda_master;

/*TABLA USUARIOS*/
CREATE TABLE usuarios(
    id       int(255) auto_increment not null,
    nombre   varchar(100) not null,
    apellido varchar(200) not null,
    email    varchar(100) not null,
    password varchar(255) not null,
    rol      varchar(20),
    image    varchar(255),
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(null,'admin','admin','admin@admin.com','admin','admin');

/*TABLA DE CATEGORIAS*/
CREATE TABLE categorias(
    id      int(255) auto_incremente not null,
    nombre  varchar(100) not null,
    CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO categorias VALUES(NULL,'Manga corta');
INSERT INTO categorias VALUES(NULL,'Tirantes');
INSERT INTO categorias VALUES(NULL,'Manga larga');
INSERT INTO categorias VALUES(NULL,'Sudadera');

/*TABLA DE PRODUCTOS*/
CREATE TABLE productos(
    id              int(255) auto_increment not null,
    categoria_id    int(255) not null,
    nombre          varchar(100) not null,
    descripcion     TEXT,
    precio          float(100,2) not null,
    stock           varchar(100),
    oferta          varchar(2),
    fecha           date not null,
    imagen          varchar(255),
    CONSTRAINT pk_productos PRIMARY KEY(id),
    CONSTRAINT fk_categoria_id FOREIGN KEY (categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;

/*TABLA DE PEDIDOS*/
CREATE TABLE pedidos(
    id          int(255) auto_increment not null,
    usuario_id  int(255) not null,
    provincia   varchar(100) not null,
    localidad   varchar(100) not null,
    direccion   varchar(255) not null,
    coste       float(200,2) not null,
    estado      varchar(20) not null,
    fecha       date,
    hora        time,
    CONSTRAINT pk_pedidos PRIMARY KEY(id),
    CONSTRAINT fk_pedidos_usuario_id FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDb;

/*TABLA DE LINEAS_PEDIDO*/
CREATE TABLE lineas_pedido(
    id          int(255) auto_increment not null,
    pedido_id   int(255) not null,
    producto_id int(255) not null,
    unidades    int(255) not null,
    CONSTRAINT pk_lineas_pedido PRIMARY KEY(id),
    CONSTRAINT fk_lineas_pedido_id FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    CONSTRAINT fk_lineas_producto_id FOREIGN KEY (producto_id) REFERENCES productos(id)
)ENGINE=InnoDb;
/*AGREGAR unidades EN TABLA lineas_pedido*/
ALTER TABLE lineas_pedido ADD unidades int(255) not null AFTER "producto_id";

