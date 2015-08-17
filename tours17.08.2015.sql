/*
SQLyog Community Edition- MySQL GUI v8.05 
MySQL - 5.0.51b-community-nt-log : Database - tours
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`tours` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `tours`;

/*Table structure for table `archivos` */

DROP TABLE IF EXISTS `archivos`;

CREATE TABLE `archivos` (
  `id_archivos` int(11) NOT NULL auto_increment,
  `categoria_archivos` int(11) default NULL,
  `tipo_archivos` varchar(11) default NULL,
  `id_tipo_archivos` int(11) default NULL,
  `nombre_archivos` varchar(255) default NULL,
  `archivo_archivos` varchar(255) default NULL,
  `extension_archivos` varchar(255) default NULL,
  `portada_archivos` int(11) default NULL,
  `fecha_archivos` datetime default NULL,
  PRIMARY KEY  (`id_archivos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `archivos` */

LOCK TABLES `archivos` WRITE;

UNLOCK TABLES;

/*Table structure for table `banner` */

DROP TABLE IF EXISTS `banner`;

CREATE TABLE `banner` (
  `idPaquete` int(8) NOT NULL auto_increment,
  `imagen` text,
  PRIMARY KEY  (`idPaquete`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `banner` */

LOCK TABLES `banner` WRITE;

insert  into `banner`(`idPaquete`,`imagen`) values (1,'machupicchu.jpg'),(2,'choquequirao.jpg'),(3,'ausangate.jpg'),(4,'machupicchu.jpg'),(5,'choquequirao.jpg'),(6,'ausangate.jpg');

UNLOCK TABLES;

/*Table structure for table `blog` */

DROP TABLE IF EXISTS `blog`;

CREATE TABLE `blog` (
  `id` int(8) NOT NULL,
  `email` char(50) default NULL,
  `comentario` text,
  `fecha` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `blog` */

LOCK TABLES `blog` WRITE;

UNLOCK TABLES;

/*Table structure for table `categoriafotos` */

DROP TABLE IF EXISTS `categoriafotos`;

CREATE TABLE `categoriafotos` (
  `idCategoriaFoto` int(8) default NULL,
  `nombreCategoria` char(100) default NULL,
  `eliminar` int(1) default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `categoriafotos` */

LOCK TABLES `categoriafotos` WRITE;

insert  into `categoriafotos`(`idCategoriaFoto`,`nombreCategoria`,`eliminar`) values (1,'CAMINO INCA',1),(2,'CHOQUEQUIRAO',1),(3,'CUSCO',1),(4,'LARES',0),(5,'MACHUPICCHU',0),(6,'PAUCARTAMBO',0),(7,'SALKANTAY',0),(8,'VALLE SAGRADO',0),(9,'VALLE SUR',0);

UNLOCK TABLES;

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `cat_id_cat` int(3) NOT NULL auto_increment,
  `tipo_cat` varchar(11) default '1',
  `nivel_cat` int(11) default '1',
  `parent_id_cat` int(10) default '0',
  `name_cat` varchar(255) character set latin1 default '',
  `desc_cat` text character set latin1,
  `status_cat` int(11) default '1',
  `image_cat` varchar(255) character set latin1 default NULL,
  `imagen_activa_cat` int(11) default '1',
  `orden_cat` int(11) default NULL,
  `default_cat` int(11) default NULL,
  `fecha_cat` datetime default NULL,
  `fecha_edit_cat` datetime default NULL,
  `usu_cat` varchar(255) character set latin1 default NULL,
  `usu_edit_cat` varchar(255) character set latin1 default NULL,
  PRIMARY KEY  (`cat_id_cat`),
  UNIQUE KEY `key1` (`name_cat`,`parent_id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

/*Data for the table `categorias` */

LOCK TABLES `categorias` WRITE;

insert  into `categorias`(`cat_id_cat`,`tipo_cat`,`nivel_cat`,`parent_id_cat`,`name_cat`,`desc_cat`,`status_cat`,`image_cat`,`imagen_activa_cat`,`orden_cat`,`default_cat`,`fecha_cat`,`fecha_edit_cat`,`usu_cat`,`usu_edit_cat`) values (45,'5',1,0,'imagenes',NULL,1,NULL,1,NULL,NULL,'2013-07-29 01:04:15',NULL,NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `email` char(50) NOT NULL,
  `pass` text,
  `nombre` char(100) default NULL,
  PRIMARY KEY  (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `clientes` */

LOCK TABLES `clientes` WRITE;

insert  into `clientes`(`email`,`pass`,`nombre`) values ('carlos@gmail.com','clara','Clared');

UNLOCK TABLES;

/*Table structure for table `destinos` */

DROP TABLE IF EXISTS `destinos`;

CREATE TABLE `destinos` (
  `idDestino` int(5) NOT NULL,
  `imagenDestino` char(200) default NULL,
  `nombreDestino` varchar(200) default NULL,
  `descripcion` text,
  `eliminar` int(1) default '0',
  `idioma` int(1) default '0',
  PRIMARY KEY  (`idDestino`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `destinos` */

LOCK TABLES `destinos` WRITE;

insert  into `destinos`(`idDestino`,`imagenDestino`,`nombreDestino`,`descripcion`,`eliminar`,`idioma`) values (1,'aguascalientes.JPG','Aguas Calientes','<p>Aguas Calientes tambi&eacute;n llamada la ciudad de Machu Picchu, es una ciudad del Per&uacute; en el departamento de Cusco, provincia de Urubamba, distrito de Machu Picchu. Esta ciudad se encuentra en medio de una exuberante vegetaci&oacute;n y una cadena de monta&ntilde;as que forman un valle.</p>\r\n<p>Su origen se remonta a 1901 cuando el ferrocarril que unir&iacute;a las ciudades de Cusco y Santa Ana lleg&oacute; a la zona del campamento Maquinachayoq unos 110 km de la ciudad de Cusco. Ese lugar se convirti&oacute; en el centro de operaciones de maquinaria y equipo pesado del proyecto, de la que los trabajadores del ferrocarril se asentaron. Se encuentra a una altitud de 2.040 metros.</p>\r\n<p>Gracias a su ubicaci&oacute;n, a s&oacute;lo 30 minutos en autob&uacute;s a Machu Picchu, es el lugar para los turistas que visitan la ciudad sagrada de Machu Picchu. Aguas Calientes es la &uacute;ltima estaci&oacute;n del tren de Cusco, propiedad de la British PeruRail.</p>\r\n<p>El pueblo ha desarrollado una infraestructura tur&iacute;stica en todos los niveles, desde lo simple a hoteles muy exclusivos.</p>\r\n<p>Entre sus m&aacute;s importantes atractivos tur&iacute;sticos son las aguas termales ubicadas a 800 metros de la aldea, que se atribuyen propiedades medicinales y que dan nombre al lugar. Tambi&eacute;n de inter&eacute;s para los turistas el acceso a Machu Picchu.</p>',0,0);
insert  into `destinos`(`idDestino`,`imagenDestino`,`nombreDestino`,`descripcion`,`eliminar`,`idioma`) values (2,'ollantaytambo.jpg','ollantaytambo','<p>Ollantaytambo (quechua: Ullantay Tanpu) es un poblado y sitio arqueol&oacute;gico incaico, capital del Distrito de Ollantaytambo (Provincia de Urubamba), situado al sur del Per&uacute;, a unos 90 km al noroeste de la ciudad del Cuzco.</p>\r\n<p style=\"text-align: justify;\">Durante el incanato, Pachac&uacute;tec conquist&oacute; la regi&oacute;n y construy&oacute; el pueblo y un centro ceremonial. En la &eacute;poca de la conquista sirvi&oacute; como fuerte de Manco Inca Yupanqui, l&iacute;der de la resistencia inca. Es la &uacute;nica ciudad del incanato en el Per&uacute; que a&uacute;n es habitada. En Ollantaytambo hay andenes de resistencia (para evitar deslizamientos), no agr&iacute;colas como en los dem&aacute;s sitios arqueol&oacute;gicos del Cuzco. En la actualidad es una importante atracci&oacute;n tur&iacute;stica debido a sus construcciones incas y por ser uno de los puntos de partida m&aacute;s comunes del camino inca hacia Machu Picchu.</p>',0,0),(3,'moray.JPG','Maras moray','<p>Este sitio se encuentra cerca del Cusco, en el Per&uacute;. A primera vista pareciera una especie de anfiteatro, conformado de varios andenes circulares, situado a 3.500 msnm.<br />Los restos arqueol&oacute;gicos de Moray se encuentran ubicados a 7 kil&oacute;metros de Maras, en el Valle Sagrado de los Incas, a 38 km al noroeste del Cusco. Es posible de llegar a Moray a trav&eacute;s del camino que parte del pueblo o directamente desde un desv&iacute;o de la carretera principal. Moray es palabra quechua y nombra a un sector ocupado por las comunidades campesinas de Misminay y kaccllarakay.</p>\r\n<p>La palabra Moray tuvo algo que ver con la cosecha de ma&iacute;z que se llamaba Aymoray, o con el mes de mayo, que tambi&eacute;n se llama Aymoray, e igualmente con la papa deshidratada que es la Moraya o Moray.</p>\r\n<p>La palabra moray es sitio arqueol&oacute;gico.</p>',0,0);
insert  into `destinos`(`idDestino`,`imagenDestino`,`nombreDestino`,`descripcion`,`eliminar`,`idioma`) values (4,'sanpedrodecachora.jpg','San Pedro de Cachora','<p>El Distrito de San Pedro de Cachora es uno de los nueve distritos de la Provincia de Abancay ubicada en el departamento de Apur&iacute;mac, bajo la administraci&oacute;n del Gobierno regional de Apur&iacute;mac, en el sur del Per&uacute;.1</p>\r\n<p>Desde el punto de vista jer&aacute;rquico de la Iglesia Cat&oacute;lica forma parte de la Di&oacute;cesis de Abancay la cual, a su vez, pertenece a la Arquidi&oacute;cesis de Cusco</p>',0,0),(5,'chiquisca.jpg','chiquisca','<p>Despu&eacute;s de un desayuno temprano pasamos medio d&iacute;a explorando la m&iacute;stica Inca de Choquequirao permanece rodeado de espectaculares paisajes de monta&ntilde;a en medio del bosque nuboso. Despu&eacute;s del almuerzo, volvemos sobre nuestros pasos a trav&eacute;s del bosque de niebla y hasta el incre&iacute;ble ca&ntilde;&oacute;n del Apur&iacute;mac-r&iacute;o, y soportamos hasta Chiquisca para establecer nuestro campamento.</p>',0,0),(6,'sibinacocha.jpg','Sibinacocha','<p>Ubicado al pie de la cordillera de Vilcanota, en las coordenadas 13&deg;51&prime;24.17&Prime;S 71&deg;01&prime;29.70&Prime;OCoordenadas: 13&deg;51&prime;24.17&Prime;S 71&deg;01&prime;29.70&Prime;O, altitud promedio de 4869 msnm y superficie de 30 km&sup2; siendo uno de los lagos grandes de mayor altura. Es alimentado por los glaciares de los picos Chumpe y Tres de la cordillera mencionado anteriormente.</p>',0,0);
insert  into `destinos`(`idDestino`,`imagenDestino`,`nombreDestino`,`descripcion`,`eliminar`,`idioma`) values (7,'aguascalientes.JPG','Aguas Calientes I','<p>Aguas Calientes also called Machu Picchu town, is a Peruvian town in the department of Cusco, province of Urubamba, district of Machu Picchu. This town is in the midst of lush vegetation and a chain of mountains that form a valley.</p>\r\n<p>It dates back to 1901 when the railway that would link the towns of Cusco and Santa Ana reached the camp area Maquinachayoq about 110 km from the city of Cusco. That place became the center of operations of machinery and heavy equipment of the project, about which railroad workers settled. It is located at an altitude of 2040 meters.</p>\r\n<p>Thanks to its location, just 30 minutes by bus to Machu Picchu, is the place to get tourists visiting the sacred Inca city of Machu Picchu. Aguas Calientes is the last station the train from Cusco, owned by the British PeruRail.</p>\r\n<p>The village has developed a tourist infrastructure at all levels, from the simple to highly exclusive hotels.</p>\r\n<p>Among its most important tourist attractions are the hot springs located 800 m from the village, which are attributed medicinal properties and that give the place its name. Also of interest to tourists access to Machu Picchu.</p>',0,1),(8,'chiquisca.jpg','Chiquisca I','<p>After an early breakfast spent half a day exploring the mystical Inca Choquequirao remains surrounded by spectacular mountain scenery in the middle of the cloud forest. After lunch, we retrace our steps through the cloud forest and to the amazing Apurimac canyon-river, and endure to Chiquisca to establish our camp.</p>',0,1);
insert  into `destinos`(`idDestino`,`imagenDestino`,`nombreDestino`,`descripcion`,`eliminar`,`idioma`) values (9,'moray.JPG','Maras moray I','<p>This site is located near Cusco, Peru. At first glance it seems a kind of amphitheater, consisting of several circular terraces, located 3,500 meters.<br />The archaeological remains of Moray located 7 km from Maras in the Sacred Valley of the Incas, 38 km northwest of Cusco. It is possible to reach Moray through the road of the village or directly from a turnoff from the main road. Moray is a Quechua word and names occupied by rural communities and kaccllarakay Misminay sector.</p>\r\n<p>The word Moray had something to do with the corn crop was called Aymoray, or May, which is also called Aymoray, and also with dehydrated potato is the Moraya or Moray.</p>\r\n<p>The word moray\'s archaeological site.</p>',0,1),(10,'ollantaytambo.jpg','Ollantaytambo I','<p>Ollantaytambo (Quechua Ullantay Tanpu) is a town and Inca archaeological site, the capital of the District of Ollantaytambo (Urubamba Province), located south of Peru, about 90 km northwest of the city of Cuzco.</p>\r\n<p>During Inca Pachacutec conquered the region, he built the town and a ceremonial center. At the time of the conquest it served as a stronghold for Manco Inca Yupanqui, leader of the Inca resistance. It is the only city of the Incas in Peru, which is still inhabited. Ollantaytambo no platforms of resistance (to prevent slipping), non-farm and in other archaeological sites of Cuzco. Today it is a major tourist attraction because of its Inca buildings and for being one of the most common starting points of the Inca Trail to Machu Picchu.</p>',0,1);
insert  into `destinos`(`idDestino`,`imagenDestino`,`nombreDestino`,`descripcion`,`eliminar`,`idioma`) values (11,'sanpedrodecachora.jpg','San Pedro de Cachora I','<p>The District of San Pedro de Cachora is one of nine districts of the province Abancay located in the department of Apurimac, under the administration of the regional government of Apurimac in southern Peru.1</p>\r\n<p>From the hierarchical point of view of the Catholic Church it is part of the Diocese of Abancay which, in turn, belongs to the Archdiocese of Cusco</p>',0,1),(12,'sibinacocha.jpg','Sibinacocha I','<p>Located at the foot of the Cordillera Vilcanota, at coordinates 13 &deg; 51\'24.17 \"S 71 &deg; 01\'29.70\" OCoordenadas: 13 &deg; 51\'24.17 \"S 71 &deg; 01\'29.70\" O, average altitude of 4869 m and surface 30 km&sup2; is one of the largest lakes of greater height. It is fed by the glaciers of the Chumpe and Three peaks of the range mentioned above.</p>',0,1);

UNLOCK TABLES;

/*Table structure for table `destinosporpaquete` */

DROP TABLE IF EXISTS `destinosporpaquete`;

CREATE TABLE `destinosporpaquete` (
  `idPaquete` int(5) NOT NULL,
  `idDestino` int(5) NOT NULL,
  PRIMARY KEY  (`idPaquete`,`idDestino`),
  KEY `idDestino` (`idDestino`),
  CONSTRAINT `destinosporpaquete_ibfk_1` FOREIGN KEY (`idPaquete`) REFERENCES `paquetes` (`idPaquete`),
  CONSTRAINT `destinosporpaquete_ibfk_2` FOREIGN KEY (`idDestino`) REFERENCES `destinos` (`idDestino`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `destinosporpaquete` */

LOCK TABLES `destinosporpaquete` WRITE;

insert  into `destinosporpaquete`(`idPaquete`,`idDestino`) values (1,1),(1,2),(1,3),(2,4),(2,5),(3,6),(4,7),(5,8),(4,9),(4,10),(5,11),(6,12);

UNLOCK TABLES;

/*Table structure for table `eventos` */

DROP TABLE IF EXISTS `eventos`;

CREATE TABLE `eventos` (
  `id` int(5) default NULL,
  `nombre` varchar(200) NOT NULL,
  `linkeventos` text,
  `imagen` varchar(200) default NULL,
  `descripcion` text,
  `fecha` date default NULL,
  `eliminar` int(1) default '0',
  `idioma` int(1) default '0',
  PRIMARY KEY  (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `eventos` */

LOCK TABLES `eventos` WRITE;

insert  into `eventos`(`id`,`nombre`,`linkeventos`,`imagen`,`descripcion`,`fecha`,`eliminar`,`idioma`) values (1,'Pachamama Raymi','http://peru21.pe/actualidad/machu-picchu-restriccion-acceso-buses-ciudadela-no-afecta-visitas-2165977','pachamama.jpg','<p>Todo el departamento de Cusco.<br />En este d&iacute;a, los siguientes festivales toman lugar en: Pachamama raymi en el distrito de Ccatca, Wataqallariy en el distrito de Maras, y Kinturaymi en Huasao en el distrito de Oropesa. Este es un ritual andino que adora y rinde tributo a la Pachamama (Madre Tierra) en una ceremonia especial denominada \"pago a la tierra\" con ofrendas de hojas de coca, chicha de jora y semillas de huayruro (semillas de la selva m&iacute;stica). El rito marca el comienzo del A&ntilde;o Nuevo Andino.</p>','2015-08-01',0,0);
insert  into `eventos`(`id`,`nombre`,`linkeventos`,`imagen`,`descripcion`,`fecha`,`eliminar`,`idioma`) values (2,'Fiesta Quillabamba','http://peru21.pe/actualidad/machu-picchu-restriccion-acceso-buses-ciudadela-no-afecta-visitas-2165977','quillabamba.jpg','<p>Provincia de La Convenci&oacute;n, Distrito de Santa Ana Cusco<br />Esta es la celebraci&oacute;n del aniversario de la provincia de La Convenci&oacute;n cuya capital es&nbsp; Quillabamba. Cada a&ntilde;o, una Reina del Caf&eacute; &oacute; &ldquo;Miss Quillabamba&rdquo; es elegida. Tambi&eacute;n hay pelea de gallos, torneos, competiciones de motocross, y la Feria de Cocla, que cuenta con un festival de m&uacute;sica con artistas nacionales e internacionales.</p>','2015-07-25',0,0);
insert  into `eventos`(`id`,`nombre`,`linkeventos`,`imagen`,`descripcion`,`fecha`,`eliminar`,`idioma`) values (3,'Paucartambo','http://peru21.pe/actualidad/machu-picchu-restriccion-acceso-buses-ciudadela-no-afecta-visitas-2165977','paucartambo.jpg','<p>A cuatro horas del Cusco, en la localidad dePaucartambo, miles de creyentes veneran en sendas fiestas a la Virgen del Carmen, llamada localmente Mamacha Carmen, patrona de los mestizos. La reuni&oacute;n que da inicio a estos d&iacute;as de fiesta se realiza en la Plaza Mayor, donde las bandas de m&uacute;sicos tocan sus instrumentos, mientras que coros ricamente ataviados cantan en quechua, dando inicio a ingeniosas coreograf&iacute;as que representan pasajes de la historia del Per&uacute;. Durante cinco d&iacute;as se presentan comparsas de distintos disfraces (Doctorcitos, Waca Waca, Sarjas) que desfilan en procesi&oacute;n acompa&ntilde;ando a la &laquo;Mamacha&raquo; durante todo su recorrido por la Plaza de Armas, el atrio del templo y las calles del pueblo. El d&iacute;a central la Virgen es conducida en procesi&oacute;n para bendecir a los asistentes y alejar a los demonios. Los danzantes realizan gimn&aacute;sticas y arriesgadas pruebas sobre los techos de las casas, mostrando sus atuendos de modas incaicas y coloniales. Al finalizar la procesi&oacute;n se realiza una guerra contra los demonios, de la cual los fieles salen triunfantes. Finalmente la comitiva termina su trayecto en el cementerio para rendirle un homenaje a \"las almas\".</p>','2015-07-15',0,0);

UNLOCK TABLES;

/*Table structure for table `fotos` */

DROP TABLE IF EXISTS `fotos`;

CREATE TABLE `fotos` (
  `nombreFoto` char(200) NOT NULL,
  `idCategoriafoto` int(8) default NULL,
  PRIMARY KEY  (`nombreFoto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fotos` */

LOCK TABLES `fotos` WRITE;

insert  into `fotos`(`nombreFoto`,`idCategoriafoto`) values ('DSC00683.JPG',1),('DSC00098.JPG',1),('DSC00075.JPG',1),('DSC00043.JPG',1),('DSC00034.JPG',1),('DSC03388.JPG',1),('FOTOS CASA 001.JPG',1),('FOTOS CASA 002.JPG',1),('FOTOS CASA 003.JPG',1),('FOTOS CASA 010.JPG',1),('FOTOS CASA 012.JPG',1),('FOTOS CASA 431.JPG',1),('FOTOS CASA 434.JPG',1),('DSC02892.JPG',2),('DSC02897.JPG',2),('DSC02901.JPG',2),('DSC02902.JPG',2),('DSC02903.JPG',2),('DSC02904.JPG',2),('DSC02906.JPG',2),('DSC02907.JPG',2),('DSC02908.JPG',2),('DSC02909.JPG',2),('DSC02914.JPG',2),('DSC02915.JPG',2),('DSC02919.JPG',2),('DSC02920.JPG',2),('DSC02923.JPG',2),('DSC02926.JPG',2),('DSC02928.JPG',2),('DSC02929.JPG',2),('DSC02930.JPG',2),('DSC02953.JPG',2),('DSC02995.JPG',2),('DSC03001.JPG',2),('DSC00658.JPG',3),('DSC03498.JPG',3),('DSC03509.JPG',3),('DSC03530.JPG',3),('DSC03534.JPG',3),('DSC03542.JPG',3),('FOTOS CASA 273.JPG',3),('FOTOS CASA 274.JPG',3),('FOTOS CASA 276.JPG',3),('FOTOS CASA 278.JPG',3),('FOTOS CASA 279.JPG',3),('FOTOS CASA 280.JPG',3),('FOTOS CASA 281.JPG',3),('FOTOS CASA 282.JPG',3),('FOTOS CASA 283.JPG',3),('FOTOS CASA 284.JPG',3),('FOTOS CASA 285.JPG',3),('FOTOS CASA 293.JPG',3),('FOTOS CASA 294.JPG',3),('FOTOS CASA 305.JPG',3);
insert  into `fotos`(`nombreFoto`,`idCategoriafoto`) values ('FOTOS CASA 324.JPG',3),('FOTOS CASA 350.JPG',3),('FOTOS CASA 390.JPG',3),('DSC00705.JPG',4),('DSC00707.JPG',4),('DSC00708.JPG',4),('DSC00709.JPG',4),('DSC00710.JPG',4),('DSC00711.JPG',4),('DSC00713.JPG',4),('DSC00714.JPG',4),('DSC00716.JPG',4),('DSC00718.JPG',4),('DSC00719.JPG',4),('FOTOS CASA 032.JPG',4),('FOTOS CASA 033.JPG',4),('FOTOS CASA 034.JPG',4),('FOTOS CASA 036.JPG',4),('FOTOS CASA 038.JPG',4),('FOTOS CASA 040.JPG',4),('FOTOS CASA 041.JPG',4),('FOTOS CASA 042.JPG',4),('FOTOS CASA 045.JPG',4),('FOTOS CASA 046.JPG',4),('FOTOS CASA 047.JPG',4),('FOTOS CASA 051.JPG',4),('FOTOS CASA 052.JPG',4),('FOTOS CASA 053.JPG',4),('DSC00559.JPG',5),('DSC00563.JPG',5),('DSC00566.JPG',5),('DSC00567.JPG',5),('DSC00570.JPG',5),('DSC00571.JPG',5),('DSC00572.JPG',5),('DSC00575.JPG',5),('DSC00576.JPG',5),('DSC00577.JPG',5),('DSC00578.JPG',5),('DSC00579.JPG',5),('DSC00582.JPG',5),('DSC01323.JPG',6),('DSC01327.JPG',6),('DSC01334.JPG',6),('DSC01337.JPG',6),('DSC01338.JPG',6),('DSC01347.JPG',7),('DSC01349.JPG',7),('DSC01351.JPG',7),('DSC01354.JPG',7),('DSC01357.JPG',7),('DSC01358.JPG',7),('DSC01360.JPG',7),('DSC01361.JPG',7),('DSC01363.JPG',7),('DSC01366.JPG',7),('DSC01367.JPG',7),('DSC01369.JPG',7);
insert  into `fotos`(`nombreFoto`,`idCategoriafoto`) values ('DSC01372.JPG',7),('DSC01373.JPG',7),('DSC00586.JPG',8),('DSC00612.JPG',8),('DSC00625.JPG',8),('DSC00626.JPG',8),('DSC00632.JPG',8),('DSC00634.JPG',8),('DSC00640.JPG',8),('DSC01147.JPG',8),('DSC01148.JPG',8),('DSC01149.JPG',8),('DSC01151.JPG',8),('DSC01158.JPG',8),('Andahuaylilla (3).JPG',9),('DSC00647.JPG',9),('DSC00651.JPG',9),('DSC00656.JPG',9),('DSC02826.JPG',9),('DSC02827.JPG',9);

UNLOCK TABLES;

/*Table structure for table `noticias` */

DROP TABLE IF EXISTS `noticias`;

CREATE TABLE `noticias` (
  `id` int(5) default NULL,
  `nombre` varchar(200) NOT NULL,
  `linkear` text,
  `imagen` varchar(200) default NULL,
  `descripcion` text,
  `eliminar` int(1) default '0',
  `idioma` int(1) default '0',
  PRIMARY KEY  (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `noticias` */

LOCK TABLES `noticias` WRITE;

insert  into `noticias`(`id`,`nombre`,`linkear`,`imagen`,`descripcion`,`eliminar`,`idioma`) values (1,'Turismo en Cusco inicio con pie derecho el aÃ±o y estarÃ¡ imparable este 2014','http://cusconoticias.pe/25-01-2014/turismo-en-cusco-inicio-con-pie-derecho-ano-estara-imparable-este-2014','cuco2014.jpg','<p>Estamos a pocos d&iacute;as de entrar al mes de febrero y CuscoNoticias quer&iacute;a recordarte cuantos pasajeros visitaron nuestra ciudad durante las fiestas de A&ntilde;o Nuevo y mostrar las razones m&aacute;s resaltantes por las que la gente se anima a visitar la ciudad imperial.<br /><br />La gran cultura, el misticismo y la vida nocturna que se vive en Cusco, son algunas de las razones preferidas por los viajeros. A inicios del 2014, nada mejor que pasar A&ntilde;o Nuevo en una ciudad as&iacute;, por eso 300 mil turistas nos acompa&ntilde;aron en un ambiente de alegr&iacute;a y buenas vibras.<br /><br />Hoy tambi&eacute;n puede ser un buen d&iacute;a para planear tu viaje y comenzar cada mes visitando un rinc&oacute;n del Per&uacute;. &iquest;Te animas a vivir esta experiencia? Per&uacute; te espera para sorprenderte.<br /><br /><span style=\"color: #ff0000;\">Fuente: Cusco Noticias.</span></p>',0,0);
insert  into `noticias`(`id`,`nombre`,`linkear`,`imagen`,`descripcion`,`eliminar`,`idioma`) values (2,'Cusco entre los sitios mÃ¡s fotografiados del mundo segÃºn Google','http://elcomercio.pe/vamos/google/cusco-entre-sitios-mas-fotografiados-mundo-segun-google-noticia-1703161','base_image.jpg','<p>Cusco aparece en el puesto 81 de los 100 lugares m&aacute;s fotografiados del planeta de Sightsmap, una herramienta virtual que muestra mediante un mapa de \"zonas calientes\" los sitios m&aacute;s retratados por los usuarios, bas&aacute;ndose en los datos de la plataforma Panoramio y Google Maps, ambas subsidiarias del famoso buscador de Internet.</p>\r\n<p>Sightsmap determina la ubicaci&oacute;n de las im&aacute;genes a trav&eacute;s de un GPS para luego procesar esta informaci&oacute;n y mostrarla en un mapamundi online en el que las zonas m&aacute;s populares aparecen de color amarillo y las menos, en negro.</p>\r\n<p>Entre los sitios m&aacute;s populares, Nueva York se llev&oacute; el primer lugar, seguido por Roma, Barcelona, Par&iacute;s y Estambul. La &uacute;nica ciudad latinoamericana que se col&oacute; entre las 10 primeras es Buenos Aires, en noveno puesto.</p>\r\n<p>Adem&aacute;s de Cusco, los otros sitios de inter&eacute;s nacionales que aparecen en el mapa virtual son Machu Picchu (106), Lima (331) y Arequipa (374). Mucho m&aacute;s alejados en el ranking est&aacute;n el distrito lime&ntilde;o de Miraflores (418), Ollantaytambo (674) y Puno (1706)</p>',0,0);

UNLOCK TABLES;

/*Table structure for table `paquetes` */

DROP TABLE IF EXISTS `paquetes`;

CREATE TABLE `paquetes` (
  `idPaquete` int(5) NOT NULL,
  `nombrePaquete` varchar(200) default NULL,
  `imagen` varchar(200) default NULL,
  `fechaPublicacion` datetime default NULL,
  `descripcion` text,
  `eliminar` int(1) default '0',
  `idioma` int(1) default '0',
  `costo` float default '0',
  `banner` int(1) default '0',
  PRIMARY KEY  (`idPaquete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `paquetes` */

LOCK TABLES `paquetes` WRITE;

insert  into `paquetes`(`idPaquete`,`nombrePaquete`,`imagen`,`fechaPublicacion`,`descripcion`,`eliminar`,`idioma`,`costo`,`banner`) values (1,'Valle Sagrado','machupicchu1.jpg','2015-08-10 16:36:57','<p>&iquest;Quieres conocer m&aacute;s sobre el gran Imperio Inca? Este paquete de viajes te permite conocer a profundidad la gran hist&oacute;ria de los Incas, los principales attractivos localizados en la capital del Imperio del Tahuantinsuyo como son: los mejores atractivos de la ciuldad del Cusco, el f&eacute;rtil Valle Sagrado de los Incas, Maras y Moray, y porsupuesto, una de las 7 Maravillas del Mundo Moderno, Machu Picchu. Este paquete tur&iacute;stico es recomendable para personas de todas las edades: parejas, familias con hijos, amigos, estudiantes, asi como para viajeros solitarios; ademas ofrecemos salidas diarias los 365 dias del a&ntilde;o; as&iacute; que no hay escusa para dejar de viajar este a&ntilde;o, 2014. Ent&eacute;rate m&aacute;s sobre el Paquete de Viajes al Centro del Imperio Inca y disfrutalo con todos los tuyos.</p>\r\n<p>NOTA: El presente itinerario es solo una muestra de los tours que puedes hacer con nuestra agencia de viajes; &eacute;ste puede ser personalizado de acuerdo a tus preferencias.</p>\r\n<p>Vea los testimonios de clientes viajeros para la inspiraci&oacute;n de sus pr&oacute;ximas vacaciones.</p>\r\n<p>Viaje al Imperio Inca y Machu Picchu 5 d&iacute;as / 4 noches</p>\r\n<p>Dia 1 : Traslado del aeropuerto al hotel en Cusco.</p>\r\n<p>City Tour de Cusco.</p>\r\n<p>Noche de hotel en Cusco.</p>\r\n<p>Dia 2 : Tour de Maras y Moray.</p>\r\n<p>Noche de hotel en Cusco.</p>\r\n<p>Dia 3 : Tour del Valle Sagrado de los Incas.</p>\r\n<p>Viaje en tren de Ollantaytambo a Aguas Calientes.</p>\r\n<p>Noche de hotel en Aguas Calientes.</p>\r\n<p>Dia 4 : Gran Tour de Machu Picchu, Maravilla del Mundo.</p>\r\n<p>Noche de hotel en Cusco.</p>\r\n<p>Dia 5 : Traslado del hotel al aeropuerto de Cusco.</p>',0,0,350,1);
insert  into `paquetes`(`idPaquete`,`nombrePaquete`,`imagen`,`fechaPublicacion`,`descripcion`,`eliminar`,`idioma`,`costo`,`banner`) values (2,'Choquequirao','choquequirao1.jpg','2015-08-10 16:43:46','<h1>&nbsp;</h1>\r\n<h2>&nbsp;</h2>\r\n<p><span style=\"font-size: medium;\"><strong>CHOQUEQUIRAW 4 DIAS / 2 NOCHES</strong></span></p>\r\n<p><span style=\"font-size: medium;\"><strong>PRIMER DIA: CUSCO / SAN PEDRO DE CACHORA / CHIQUISCA</strong></span></p>\r\n<p><img src=\"http://www.inkascusco.com/images/cusco.cachora.jpg\" alt=\"Cachora - Cusco\" width=\"150\" height=\"200\" align=\"right\" hspace=\"10\" vspace=\"10\" /></p>\r\n<p>Muy temprano salimos con direcci&oacute;n noreste, con destino a la comunidad de San Pedro de Cachora a donde llegaremos despu&eacute;s de dos horas y media de viaje.<br />En presencia del majestuoso nevado del Padrayoc ubicado a 5570 m.s.n.m nos encontraremos con todas las personas que har&aacute;n posibles que esta aventura sea de cierta forma confortable, considerando la altura y los diversos lugares que recorreremos<br />Despu&eacute;s de inspeccionar todo el equipo tanto de campamento como las mulas y caballos que apoyar&aacute;n la expedici&oacute;n, iniciaremos la caminata, en todo el recorrido no dejaremos de maravillarnos de la gran gama de vida silvestre que la naturaleza nos ofrece adem&aacute;s de estar en breve contacto con pobladores de los pueblito como La Colmena y La Aguada, llegaremos al mirador de la ruta Capuliyoc desde donde apreciaremos todo el valle del Apurimac, con esta impresionante vista almorzaremos para continuar hacia los caser&iacute;os de Huayhuacalle, Tinajayoc, Cocamasana, Torwisqana, siempre rodeado de pintorescos paisajes, finalmente llegaremos a Chiquisca donde pasaremos la noche.</p>\r\n<h2>&nbsp;</h2>\r\n<p><span style=\"font-size: medium;\"><strong>SEGUNDO DIA: CHIQUISCA / ROSALINA / CHOQUEQUIRAW</strong></span></p>\r\n<p><img src=\"http://www.inkascusco.com/images/cusco.choquequirao.ruina.jpg\" alt=\"camino a Choquequirao - Cusco\" width=\"150\" height=\"200\" align=\"left\" hspace=\"10\" vspace=\"10\" /></p>\r\n<p><br />Nuevamente nos levantamos muy temprano, para que despu&eacute;s del desayuno iniciaremos la caminata hacia nuestro gran objetivo Choquequiraw.<br />Ascenderemos hacia la orilla del r&iacute;o Apurimac denominado playa Rosalina descansaremos brevemente y tomaremos provisiones de agua fresca y cristalina que baja de los nevados de la zona, continuamos y observaremos el impresionante ca&ntilde;&oacute;n del Apurimac su profundidad, su forma, el cause del r&iacute;o, iniciamos el ascenso para llegar a Marampata desde donde tendremos una vista impresionante del complejo arqueol&oacute;gico de Choquekiraw,<br />despu&eacute;s del almuerzo observaremos, el vuelo de los C&oacute;ndores que a eso de las 3:00 de la tarde hacen su aparici&oacute;n en el cielo de Choquequiraw mientras vuelan camino a zonas mas altas.<br />Acamparemos y pasaremos la noche.</p>\r\n<h2>&nbsp;</h2>\r\n<p><strong><strong>TECER DIA: CHOQUEQUIRAW/ SAN IGNACION/ CARMEN</strong></strong></p>\r\n<p>Desayuno.<br />Despu&eacute;s de observar el amanecer en Choquekiraw haremos nuestro ingreso a la zona Arqueol&oacute;gica recorreremos palmo a palmo todo el complejo maravill&aacute;ndonos cent&iacute;metro a cent&iacute;metro de la gran maestr&iacute;a e inteligencia que tuvieron los hombre que construyeron&nbsp;<br />este vestigio que hoy nos hace volver la mirada hacia aquella &eacute;poca gloriosa del imperio incaico. Extasiados de tanta belleza, con mil ideas en la cabeza y con algo de nostalgia tenemos que iniciar nuestra descenso con la m&aacute;gica presencia de los C&oacute;ndores sobre volando la zona .<br />Con una vista panor&aacute;mica del Ca&ntilde;&oacute;n del Apurimac llegaremos a playa San Ignacio, siempre rodeado de flora y fauna de la zona, despu&eacute;s del almuerzo continuaremos a Carmen huerto denominado as&iacute; por la paradis&iacute;aca geograf&iacute;a del lugar.<br />Acamparemos y pasaremos la noche.</p>\r\n<h2>&nbsp;</h2>\r\n<p><strong><strong>CUARTO DIA: EL CARMEN / TAMBO BAMBA/ HUANIPACA / CUSCO</strong></strong></p>\r\n<p><img src=\"http://www.inkascusco.com/images/choquequirao.ruina.jpg\" alt=\"Runias de Choquequirao - Cusco\" width=\"150\" height=\"200\" align=\"right\" hspace=\"10\" vspace=\"10\" /></p>\r\n<p><br />Despu&eacute;s del desayuno, iniciamos la caminata hacia la hacienda Tambo bamba, vestigio que recuerda la &eacute;poca colonial y el duro trabajo bajo presi&oacute;n de los campesinos, ahora esta zona es muy rica en agricultura y ganader&iacute;a, continuando visitaremos la comunidad de Pacobamba, luego ingresaremos a Huanipaca desde donde apreciaremos en todo su esplendor la cadena de glaciares Sacsarayoc, ubicado en la regi&oacute;n del Vilcanota, despu&eacute;s de esta impresionante vista, tomaremos el bus que nos llevar&aacute; de retorno a la ciudad de Cusco.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>',0,0,400,1);
insert  into `paquetes`(`idPaquete`,`nombrePaquete`,`imagen`,`fechaPublicacion`,`descripcion`,`eliminar`,`idioma`,`costo`,`banner`) values (3,'Ausangate','aunsangate1.jpg','2015-08-10 16:50:12','<h2><strong>&nbsp;</strong></h2>\r\n<div class=\"break\"><span style=\"font-size: medium;\"><strong>Caminata al Ausangate&nbsp;</strong></span></div>\r\n<p>Ausangate es una monta&ntilde;a situada a unos 100 kil&oacute;metros al sudeste de la ciudad del Cusco su altitud m&aacute;xima es de 6.384 msnm.<br /><br />En la mitolog&iacute;a inca de esta monta&ntilde;a y de los lagos cercanos -entre los que destaca Sibinacocha- nace la energ&iacute;a masculina que fertiliza a la madre tierra Pachamama; luego de un largo discurrir, las aguas se pierden en la tierras ignotas del Amazonas para retornar, a llenar los lagos y los glaciares cada noche convertida en el r&iacute;o de estrellas o Willkamayu conocida en occidente como la V&iacute;a L&aacute;ctea La Comunidad de Chillca constituida por pastores de llamas y alpacas es conocida como la guardiana de estos pr&iacute;stinos parajes, desde donde se puede hacer caminatas de monta&ntilde;a en un trekking denominado \"Camino del Apu Ausangate\"<br /><br />Ausangate es la monta&ntilde;a representativa de los Andes Cusque&ntilde;os. Se sit&uacute;a en la cordillera del Vilcanota con lagunas grandes con un color verde/azul luminoso. Caminar por la monta&ntilde;a del Ausangate es una aventura indescriptible, y es imposible no ser impresionado por la enorme belleza de la eterna nieve. La ruta del Ausangate es uno de los atractivos del Cusco.<br /><br />Cada a&ntilde;o al lado norte del Ausangate se celebra la fiesta de Quyllur Rit\'i (quechua: \"nieve de estrella\") antes de la fiesta del Corpus Christi, durante la cual miles de quechuas peregrinan al Se&ntilde;or de Quyllur Rit\'i en la iglesia de Sinakara.<br /><br />Para realizar la excursi&oacute;n deber&aacute; contactar con una agencia especializada de turismo.</p>\r\n<p><span style=\"font-size: medium;\"><strong>TOURS SUGERIDOS PARA CAMINATA AL AUSANGATE</strong></span></p>\r\n<ul>\r\n<li>Ausangate 5 d&iacute;as / 4 noches.</li>\r\n<li>Caminata al Ausangate 6 d&iacute;as / 5 noches.</li>\r\n<li>Nevado del Ausangate 7 d&iacute;as / 6 noches.</li>\r\n</ul>',0,0,350,1);
insert  into `paquetes`(`idPaquete`,`nombrePaquete`,`imagen`,`fechaPublicacion`,`descripcion`,`eliminar`,`idioma`,`costo`,`banner`) values (4,'Valle Sagrado','machupicchu1.jpg','2015-08-10 16:53:16','<p>Want to know more about the great Inca Empire? This travel package allows you to know in depth the great history of the Incas, the main attractivos located in the capital of the Tahuantinsuyo empire, such as: the best attractions in the ciuldad of Cusco, the fertile Sacred Valley of the Incas, Maras and Moray and ofcourse, one of the 7 Wonders of the World, Machu Picchu. This package is recommended for people of all ages, couples, families with children, friends, students, as well as for individual travelers; furthermore we offer daily departures, 365 days a year; so there is no excuse to stop traveling this year, 2014. Learn more about the Travel Package to the Inca Empire Center and enjoy it with all your own.</p>\r\n<p>NOTE: This itinerary is just a sample of the tours you can do with our travel agency; it can be customized according to your preferences.</p>\r\n<p>See traveler testimonials for inspiration for your next vacation clients.</p>\r\n<p>Travel to Machu Picchu Inca Empire and 5 days / 4 nights</p>\r\n<p>Day 1: Transfer from airport to hotel in Cusco.</p>\r\n<p>City Tour of Cusco.</p>\r\n<p>Night hotel in Cusco.</p>\r\n<p>Day 2: Tour of Maras and Moray.</p>\r\n<p>Night hotel in Cusco.</p>\r\n<p>Day 3: Tour of the Sacred Valley of the Incas.</p>\r\n<p>Travel by train from Ollantaytambo to Aguas Calientes.</p>\r\n<p>Night hotel in Aguas Calientes.</p>\r\n<p>Day 4: Grand Tour of Machu Picchu, Wonder of the World.</p>\r\n<p>Night hotel in Cusco.</p>\r\n<p>Day 5: Transfer to Cusco airport hotel.</p>',0,1,350,1);
insert  into `paquetes`(`idPaquete`,`nombrePaquete`,`imagen`,`fechaPublicacion`,`descripcion`,`eliminar`,`idioma`,`costo`,`banner`) values (5,'Choquequirao','choquequirao1.jpg','2015-08-10 16:55:27','<p>CHOQUEQUIRAW 4 DAYS / 3 NIGHTS</p>\r\n<p>FIRST DAY: CUSCO / SAN PEDRO DE CACHORA / CHIQUISCA</p>\r\n<p>Cachora - Cusco</p>\r\n<p>Very early we go to northeast direction, heading to the community of San Pedro de Cachora where we arrive after two and a half hours away.<br />In the presence of the majestic snow Padrayoc located 5570 meters we find all the people who made this adventure possible that certain comfortably, considering the height and the various places that will travel<br />After inspecting all equipment both camp as the mules and horses that will support the expedition, start walking, all the way we will certainly marvel at the vast array of wildlife that nature offers us besides being in brief contact with residents of the town like La Colmena and La Aguada, get the viewpoint of the Capuliyoc route from where we will see the whole valley of the Apurimac, with this awesome lunch view to continue towards the villages of Huayhuacalle, Tinajayoc, Cocamasana, Torwisqana, always surrounded by picturesque landscapes, Chiquisca finally get to spend the night.</p>\r\n<p>SECOND DAY: CHIQUISCA / ROSALINA / CHOQUEQUIRAW</p>\r\n<p>Choquequirao way - Cusco</p>\r\n<p><br />Again we got up early, so after breakfast start walking towards our vision Choquequiraw.<br />Climb to the edge of the Apurimac river called Playa Rosalina rest briefly and take supplies of fresh and clear water coming down from the peaks of the region, continue and observe the impressive canyon of the Apurimac its depth, its form, cause the river, began the Marampata rise to reach where we will have a breathtaking view of the archaeological complex of Choquequirao,<br />after lunch we observe the flight of the Condors that at about 3:00 pm make their appearance in the sky as they fly Choquequiraw way to higher areas.<br />Camp and spend the night.</p>\r\n<p>THIRD DAY: CHOQUEQUIRAW / SAN IGNACIO / CARMEN</p>\r\n<p>Breakfast.<br />After watching the sunrise at Choquekiraw do our income will visit the archaeological site every inch of the entire resort inched marvel of great skill and intelligence that had the man who built<br />This vestige today makes us look back to that glorious time of the Inca Empire. Enraptured by so much beauty, a thousand ideas in my head and with some nostalgia we have to start our descent to the magical presence of the condors flying over the area.<br />With a panoramic view of the Apurimac Canyon we reach San Ignacio Beach, always surrounded by flora and fauna, after lunch continue to Carmen orchard paradise named for the geography.<br />Camp and spend the night.</p>\r\n<p>FOURTH DAY: THE CARMEN / TAMBO BAMBA / Huanipaca / CUSCO.</p>\r\n<p>Runias Choquequirao - Cusco</p>\r\n<p><br />After breakfast, we begin the trek to the ranch Tambo Bamba, vestiges reminiscent of colonial times and work hard under pressure from farmers, now this area is rich in agriculture, continuing Pacobamba visit the community, then we will enter Huanipaca from where we will appreciate in all its splendor Sacsarayoc glaciers chain located in the region of the Vilcanota, after this breathtaking view, take the bus to take us back to Cusco.</p>',0,1,350,1);
insert  into `paquetes`(`idPaquete`,`nombrePaquete`,`imagen`,`fechaPublicacion`,`descripcion`,`eliminar`,`idioma`,`costo`,`banner`) values (6,'Aunsangate','aunsangate1.jpg','2015-08-10 16:56:32','<p>Trek to Ausangate</p>\r\n<p>&nbsp;<br />Ausangate is a mountain located about 100 kilometers southeast of Cusco its maximum altitude is 6,384 meters.</p>\r\n<p>In Inca mythology of the mountain and nearby lakes, among which stands Sibinacocha- energy born male fertilizes Mother Earth Pachamama; after a long discourse, the waters are lost in the unknown lands of the Amazon to return to fill the lakes and glaciers every night turned into the river of stars or Willkamayu known in the West as the Milky Way\'s Community Chillca constituted by shepherds llamas and alpacas is known as the guardian of these pristine places, where you can hike on a mountain trail called \"Camino del Apu Ausangate\"</p>\r\n<p>Ausangate is the mountain most representative for the Cusque&ntilde;os Andes. It is situated in the Cordillera Vilcanota with large gaps with a green / blue light. Walking through the mountain of Ausangate is an indescribable adventure, and it is impossible not to be impressed by the enormous beauty of the eternal snow. The route of Ausangate is one of the attractions of Cusco.</p>\r\n<p>Each year the north side of Ausangate party Quyllur Rit\'i (Quechua: \"snow star\") is celebrated before the feast of Corpus Christi, during which thousands of Quechua pilgrims to the Lord of the church Rit\'i Quyllur of Sinakara.</p>\r\n<p>To make the tour should contact a specialized travel agency.</p>\r\n<p>SUGGESTED TOURS HIKE TO AUSANGATE</p>\r\n<p>Ausangate 5 days / 4 nights.<br />Trek to Ausangate 6 days / 5 nights.<br />Ausangate 7 days / 6 nights.</p>',0,1,350,1);

UNLOCK TABLES;

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `id` int(4) default NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(200) character set utf8 collate utf8_spanish_ci NOT NULL,
  `cargo` varchar(100) character set utf8 collate utf8_spanish_ci default NULL,
  `telefono` varchar(100) character set utf8 collate utf8_spanish_ci default NULL,
  `correo` varchar(150) character set utf8 collate utf8_spanish_ci default NULL,
  `foto` text character set utf8 collate utf8_spanish_ci,
  `perfilDes` text character set utf8 collate utf8_spanish_ci,
  `curriculum` text character set utf8 collate utf8_spanish_ci,
  `eliminar` int(1) default '0',
  PRIMARY KEY  (`nombres`,`apellidos`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `perfil` */

LOCK TABLES `perfil` WRITE;

insert  into `perfil`(`id`,`nombres`,`apellidos`,`cargo`,`telefono`,`correo`,`foto`,`perfilDes`,`curriculum`,`eliminar`) values (1,'Dina','Ramos Huillca','Administadora','974760862','gimena778@hotmail.com','FOTOS CASA 513.JPG','<p>Nac&iacute; en la provincia de la convenci&oacute;n (Ocobamba - Cusco).Tengo 27 a&ntilde;os y soy Gu&iacute;a Oficial de Turismo, egresada del Instituto Superior Tecnol&oacute;gico Antonio Lorena de Cusco. Durante el tiempo de trabajo que tuve en la diferentes empresas tur&iacute;sticas como Operadora y administradora tuve mucha experiencia y viaje tambi&eacute;n diferentes lugares tur&iacute;sticos del Per&uacute; y es por eso tuve ese objetivo de crear mi propia empresa y los cuales me dio esa noci&oacute;n de crear un paquete tur&iacute;stico a la medida de cada cliente seg&uacute;n su requerimiento.</p>','gen0001582844167015676205494 (1).pdf',0);
insert  into `perfil`(`id`,`nombres`,`apellidos`,`cargo`,`telefono`,`correo`,`foto`,`perfilDes`,`curriculum`,`eliminar`) values (2,'Edy','Huaman Tumpay','Gerente General','953766078','edy@huaynapicchucusco.com','PERFIL.jpg','<p>Nac&iacute; en la provincia de Anta (Huarocondo &ndash; Cusco). Tengo 28 A&ntilde;os y soy gu&iacute;a Oficial de Turismo, egresado del Instituto Superior Tecnol&oacute;gico Antonio Lorena de Cusco. Como gu&iacute;a oficial de turismo me especializo en lo que es: aventuras, trekkins, turismo cl&aacute;sico y vivencial y durante el tiempo de mi trabajo tuve mucha experiencia en la calidad de servicio en los diferentes lugares del Per&uacute;.<br />Seg&uacute;n nuestro prop&oacute;sito en el a&ntilde;o de 2008 empesamos con el proyecto de Huaynapicchu travel, con algunas investigaciones y nuestra familia tambi&eacute;n ha ido creciendo y ahora tenemos una hermosa hija Emily Maricel que tiene 3 a&ntilde;os.</p>','gen0001583152433293444540174.pdf',0);

UNLOCK TABLES;

/*Table structure for table `publicidad` */

DROP TABLE IF EXISTS `publicidad`;

CREATE TABLE `publicidad` (
  `id` int(5) default NULL,
  `nombre` varchar(200) NOT NULL,
  `imagen` varchar(200) default NULL,
  `eliminar` int(1) default '0',
  `enlace` text NOT NULL,
  PRIMARY KEY  (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `publicidad` */

LOCK TABLES `publicidad` WRITE;

UNLOCK TABLES;

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(5) default NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidoP` varchar(100) NOT NULL,
  `apellidoM` varchar(100) NOT NULL,
  `nicke` varchar(200) default NULL,
  `pass` varchar(200) default NULL,
  `tipo` int(2) default '0',
  `correo` varchar(200) default NULL,
  `telefono` varchar(50) default NULL,
  `eliminar` int(1) default '0',
  PRIMARY KEY  (`nombres`,`apellidoP`,`apellidoM`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

LOCK TABLES `usuarios` WRITE;

insert  into `usuarios`(`id`,`nombres`,`apellidoP`,`apellidoM`,`nicke`,`pass`,`tipo`,`correo`,`telefono`,`eliminar`) values (1,'Edgard','Rayme','Quispe','edgard','1234',1,'RAYEDGARD@GMAIL.COM','1236444',0);

UNLOCK TABLES;

/*Table structure for table `video` */

DROP TABLE IF EXISTS `video`;

CREATE TABLE `video` (
  `id` int(5) default NULL,
  `nombre` varchar(200) NOT NULL,
  `linkvideo` text,
  `eliminar` int(1) default '0',
  PRIMARY KEY  (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `video` */

LOCK TABLES `video` WRITE;

insert  into `video`(`id`,`nombre`,`linkvideo`,`eliminar`) values (2,'Turismo en CUSCO','skuQBlw2y-Y',0),(1,'Turismo Vivencial en CUSCO','-euutYB29Lk',0),(3,'Origen del CUSCO Ombligo del Mundo','xhPzlMrBTII',0);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
