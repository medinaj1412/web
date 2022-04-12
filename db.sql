/*CATEGORIA PRODUCTO*/

create database bioancestro
create table catpro(
	codcatpro int not null AUTO_INCREMENT,
	nomcatpro varchar(60) not null,
	descatpro varchar(350) ,
	estado int not null,
	PRIMARY KEY (codcatpro)
)ENGINE InnoDB
CHARACTER SET latin1 COLLATE latin1_spanish_ci;

INSERT INTO catpro
(codcatpro,nomcatpro,descatpro,estado)
VALUES
(1,'ESPECIES Y CONDIMENTOS','Nuestras especias y condimentos provienen de los mejores y más antiguos proveedores de Perú,, Irán, China, Siria, Turquía, Brasil, Indonesia, Ecuador, India, Madagascar y otros países de Asia principalmente.
Muchos de ellos tienen más de 10 generaciones en el rubro.',1),
(2,'FRUTOS SECOS','Nuestros frutos secos provienen de los mejores y más antiguos proveedores de Perú, Brasil, Indonesia, Ecuador, India, Madagascar y otros países de Asia principalmente.
Muchos de ellos tienen más de 15 generaciones en el rubro.',1),
(3,'HIERVAS MEDICINALES','Nuestras hiervas medicinales y aromáticas  provienen de la costa sierra y selva  de lo más antiguos proveedores de Perú, Brasil, Ecuador.',1),
(4,'CERELAES , MENESTRAS Y SEMILLAS','Nuestros granos y menestras son seleccionados por nuestros socios estratégicos en sus plantas de proceso. La característica principal buscada es su rápida cocción y buen sabor.
Nuestras semillas  son seleccionadas en base al contenido nutricional y alimenticio.
Nuestras féculas contienen un alto grado de viscosidad y buen color.',1),
(5,'HARINAS DE CEREALES Y SEMILLAS','Nuestras harinas de cerelaes y semillas son pulverisados nuestros socios estratégicos en sus plantas de proceso.',1),
(6,'HARINA DE TUBERCULOS  Y FRUTAS','Nuestras harinas de tuberculos y frutas  son pulverisados nuestros socios estratégicos en sus plantas de proceso.',1),
(7,'HARINA DE HIERVAS MEDICINALES Y AROMATICAS','Nuestras harinas dehiervas medicinales y aromaticas   son pulverisados nuestros socios estratégicos en sus plantas de proceso.',1),
(8,'HOJUELAS Y POPS','Nuestrashojuelas y pops   son procesados por  nuestros socios estratégicos en sus plantas de proceso.',1);

/*EMPAQUE*/
create table empaque(
	codemp int not null AUTO_INCREMENT,
	nomemp varchar(60) not null,
	estado int not null,
	PRIMARY KEY (codemp)
)ENGINE InnoDB
CHARACTER SET latin1 COLLATE latin1_spanish_ci;

INSERT INTO empaque
(codemp,nomemp,estado)
VALUES
(1,'BOLSA',1),
(2,'CAJA',1);

create table producto(
	codpro int not null AUTO_INCREMENT,
	nompro varchar(50) not null,
	prepro numeric(6,2) not null,
	codcatpro int not null,
	codemp int not null,
	nomimapro varchar(100),
	esppro int,
	PRIMARY KEY (codpro),
	FOREIGN KEY (codcatpro)
		REFERENCES catpro(codcatpro),
	FOREIGN KEY (codemp)
		REFERENCES empaque(codemp)
)ENGINE InnoDB
CHARACTER SET latin1 COLLATE latin1_spanish_ci;

INSERT INTO producto
(nompro,prepro,codcatpro,codemp,nomimapro,esppro)
VALUES
('Achiote',10,1,1,'achiote.jpg',1),
('Camaron chino',23,1,1,'camaron-chino.jpg',0),
('Canela ',60,1,2,'canela.jpg',1),
('Clavo de olor ',18,1,1,'clavo-de-olor.jpg',0),
('Hongos ',20,1,1,'hongos.jpg',0),
('Pimienta',20,1,1,'pimienta.jpg',0),
('Almendras',45,2,2,'almendras.jpg',0),
('Castañas ',40,2,1,'castanas.jpg',0),
('Pecanas peladas',45,2,1,'pecanas-peladas.jpg',1),
('Damascos',34,2,1,'damascos.jpg',0),
('Pistachos',25,2,1,'pistachos.jpg',0),
('Nueces',36,2,1,'nueces.jpg',1),
('Higos secos',23,2,1,'higos-secos.jpg',0),
('Guindones o ciruelas ',23,2,1,'guindones-o-ciruelas.jpg',1),
('Pasas ',10,2,1,'pasas.jpg',0),
('Pasas rubias',12,2,1,'pasas-rubias.jpg',1),
('Anis',16,3,1,'anis.jpg',1),
('Boldo',14,3,1,'boldo.jpg',0),
('Oregano',12,3,1,'oregano.jpg',0),
('Anis estrella',32,3,1,'anis-estrella.jpg',0),
('Romero',21,3,1,'romero.jpg',0),
('Tilo flor',23,3,1,'tilo-flor.jpg',0),
('Tomillo',23,3,1,'tomillo.jpg',0),
('Arverja verde ',5,4,1,'arverja-verde.jpg',0),
('Alpiste ',5,4,1,'alpiste.jpg',0),
('Arverja entera ',5,4,1,'arverja-entera.jpg',0),
('Quinua ',10,4,1,'quinua.jpg',0),
('Avena ',5,4,1,'avena.jpg',0),
('Chia',9,4,1,'.jpg',0),
('Lenteja',6,4,1,'lenteja.jpg',0),
('Kiwicha',10,4,1,'kiwicha.jpg',0),
('Cañihua',12,4,1,'canihua.jpg',0),
('Semillas de girasol',12,4,1,'semillas-de-girasol.jpg',0),
('Linaza ',10,4,1,'linaza.jpg',0),
('Ajonjoli',9,4,1,'ajonjoli.jpg',0),
('Garvanzo',10,4,1,'garvanzo.jpg',0),
('Harina de garvanzo',10,5,1,'harina-de-garvanzo.jpg',0),
('Harina de algarrobo',5,5,1,'harina-de-algarrobo.jpg',0),
('Harina de cañihua',12,5,1,'harina-de-canihua.jpg',0),
('Harina de quinua',10,5,1,'harina-de-quinua.jpg',0),
('Harina de kiwicha',10,5,1,'harina-de-kiwicha.jpg',0),
('Harina de alpiste',6,5,1,'harina-de-alpiste.jpg',0),
('Harina de crema de arverja',4,5,1,'harina-de-crema-de-arverja.jpg',0),
('Harina de habas',4,5,1,'harina-de-habas.jpg',0),
('Harina de soya',4,5,1,'harina-de-soya.jpg',0),
('Harina de yuca',5,5,1,'harina-de-yuca.jpg',0),
('Harina de maiz morado',10,5,1,'harina-de-maiz-morado.jpg',0),
('Harina de trigo integral',4,5,1,'harina-de-trigo-integral.jpg',0),
('Harina de ajonjoli',9,5,1,'harina-de-ajonjoli.jpg',0),
('Harina de linaza ',5,5,1,'harina-de-linaza.jpg',0),
('Harina de chia ',10,5,1,'harina-de-chia .jpg',0),
('Harina de sacha inchi',20,5,1,'harina-de-sacha-inchi.jpg',0),
('Harina de centeno',5,5,1,'harina-de-centeno.jpg',0),
('Harina de maca ',12,6,1,'harina-de-maca.jpg',0),
('Harina de camote amarillo',11,6,1,'harina-de-camote-amarillo.jpg',0),
('Harina de platano',5,6,1,'harina-de-platano.jpg',0),
('Harina de yuca ',5,6,1,'harina-de-yuca.jpg',0),
('Harina de maca negra',18,6,1,'harina-de-maca-negra.jpg',0),
('Harina de maca roja',14,6,1,'harina-de-maca-roja.jpg',0),
('Harina de mashua negra ',25,6,1,'harina-de-mashua-negra.jpg',0),
('Harina de mashua',16,6,1,'harina-de-mashua.jpg',0),
('Harina de noni ',15,6,1,'harina-de-noni.jpg',0),
('Harina de camu camu',17,6,1,'harina-de-camu-camu.jpg',0),
('Harina  curcuma',16,6,1,'harina-curcuma.jpg',0),
('Harina de alcachofa ',12,6,1,'harina-de-alcachofa.jpg',0),
('Harina de canela',45,6,1,'harina-de-canela.jpg',0),
('Harina de lucuma',25,6,1,'harina-de-lucuma.jpg',0),
('Harina de kion',10,6,1,'harina-de-kion.jpg',0),
('Harina de aguaje',20,6,1,'harina-de-aguaje.jpg',0),
('Harina de tocosh',12,6,1,'harina-de-tocosh.jpg',0),
('Harina de coca ',25,7,1,'harina-de-coca.jpg',0),
('Harina de sen',12,7,1,'harina-de-sen.jpg',0),
('Harina de boldo',14,7,1,'harina-de-boldo.jpg',0),
('Harina de tomillo',15,7,1,'harina-de-tomillo.jpg',0),
('Harina de ortiga',15,7,1,'harina-de-ortiga.jpg',0),
('Harina de algas marinas ',20,7,1,'harina-de-algas-marinas.jpg',0),
('Harina de alfalfa',10,7,1,'harina-de-alfalfa.jpg',0),
('Harina de moringa',25,7,1,'harina-de-moringa.jpg',0),
('Harina de stevia',25,7,1,'harina-de-stevia.jpg',0),
('Harina de achiote',13,7,1,'harina-de-achiote.jpg',0),
('Harina de anis',16,7,1,'harina-de-anis.jpg',0),
('Harina de borraja',13,7,1,'harina-de-borraja.jpg',0),
('Harina de uña de gato',17,7,1,'harina-de-una-de-gato.jpg',0),
('Harina de canchalagua',18,7,1,'harina-de-canchalagua.jpg',0),
('Harina de carqueja',12,7,1,'harina-de-carqueja.jpg',0),
('Harina de cedron',15,7,1,'harina-de-cedron.jpg',0),
('Harina de chanca piedra',16,7,1,'harina-de-chanca-piedra.jpg',0),
('Harina de chuchuhuasi',18,7,1,'harina-de-chuchuhuasi.jpg',0),
('Harina de cola de caballo',16,7,1,'harina-de-cola-de-caballo.jpg',0),
('Harina de cuti cuti ',16,7,1,'harina-de-cuti-cuti.jpg',0),
('Harina de diente de leon',17,7,1,'harina-de-diente-de-leon.jpg',0),
('Harina de eucalipto',25,7,1,'harina-de-eucalipto.jpg',0),
('Harina flor de arena',13,7,1,'harina-flor-de-arena.jpg',0),
('Harina de hojas de guanabana',15,7,1,'harina-de-hojas-de-guanabana.jpg',0),
('Harina de hercampuri',16,7,1,'harina-de-hercampuri.jpg',0),
('Harina de hierba buena ',15,7,1,'harina-de-hierba-buena.jpg',0),
('Harina de huamanpinta ',16,7,1,'harina-de-huamanpinta.jpg',0),
('Harina de llanten ',17,7,1,'harina-de-llanten.jpg',0),
('Harina de malva',16,7,1,'harina-de-malva.jpg',0),
('Harina de manayupa ',15,7,1,'harina-de-manayupa.jpg',0),
('Harina de manzanilla',25,7,1,'harina-de-manzanilla.jpg',0),
('Harina de matico ',14,7,1,'harina-de-matico.jpg',0),
('Harina de muña ',12,7,1,'harina-de-muna.jpg',0),
('Harina de pasuchaca',16,7,1,'harina-de-pasuchaca.jpg',0),
('Harina de romero',15,7,1,'harina-de-romero.jpg',0),
('Harina de salvia',16,7,1,'harina-de-salvia.jpg',0),
('Harina de te verde',25,7,1,'harina-de-te-verde.jpg',0),
('Harina de toronjil',12,7,1,'harina-de-toronjil.jpg',0),
('Harina de valeriana ',17,7,1,'harina-de-valeriana.jpg',0),
('Harina de zarzaparrila ',14,7,1,'harina-de-zarzaparrila.jpg',0),
('Hojuela de avena',5,8,1,'hojuela-de-avena.jpg',0),
('Hojuela de quinua',12,8,1,'hojuela-de-quinua.jpg',0),
('Hojuela de kiwicha',11,8,1,'hojuela-de-kiwicha.jpg',0),
('Hojuela de cañihua',12,8,1,'hojuela-de-canihua.jpg',0),
('Hojuela de cebada',5,8,1,'hojuela-de-cebada.jpg',0);

/*AÑADIDO EL 19-07-2020*/
create table usuario(
	codusu int not null AUTO_INCREMENT,
	nomusu varchar(50),
	apeusu varchar(50),
	corusu varchar(50) not null,
	pasusu varchar(60) not null,
	dniusu varchar(12) not null,
	celusu varchar(12),
	dirusu varchar(50),
	estado int not null,
	PRIMARY KEY (codusu)
)ENGINE InnoDB
CHARACTER SET latin1 COLLATE latin1_spanish_ci;

/*Solamente debe pedir el correo, la contraseña
y su dni en la creacion de usuario (estado=1)*/
insert into usuario
(corusu,pasusu,dniusu,estado)
values
('a@a.com','a','88888888',1);

/*22-07-2020*/
alter table producto add estado int not null default 1;

/*24-07-2020*/
/*Modifica la tabla anterior (borrala y crea esta nueva)*/
create table carrito(
	codcar int not null AUTO_INCREMENT,
	codusu int not null,
	codpro int not null,
	feccrecar datetime not null,
	canpro int not null,
	prepro numeric(6,2) not null,
	PRIMARY KEY (codcar),
	FOREIGN KEY (codusu)
		REFERENCES usuario (codusu),
	FOREIGN KEY (codpro)
		REFERENCES producto (codpro)
)ENGINE InnoDB
CHARACTER SET latin1 COLLATE latin1_spanish_ci;

create table pedido(
	codped int not null AUTO_INCREMENT,
	codusu int not null,
	feccreped datetime not null,
	fecpagped datetime null,
	estado int not null ,
	PRIMARY KEY (codped),
	FOREIGN KEY (codusu)
		REFERENCES usuario (codusu)
)ENGINE InnoDB
CHARACTER SET latin1 COLLATE latin1_spanish_ci;

/*
candetped es canpro del carrito
predetped es prepro del carrito
*/
create table detped(
	coddetped int not null AUTO_INCREMENT,
	codped int not null,
	codpro int not null,
	candetped int not null,
	predetped numeric(6,2) not null,
	PRIMARY KEY (coddetped),
	FOREIGN KEY (codped)
		REFERENCES pedido (codped),
	FOREIGN KEY (codpro)
		REFERENCES producto (codpro)
)ENGINE InnoDB
CHARACTER SET latin1 COLLATE latin1_spanish_ci;

/*Añadido 30-07-2020*/
alter table carrito modify canpro decimal (6,2);
alter table detped modify candetped decimal (6,2);