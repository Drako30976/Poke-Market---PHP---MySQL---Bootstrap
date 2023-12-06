-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2023 a las 22:34:51
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pokedex_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generaciones`
--

CREATE TABLE `generaciones` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nombre` char(50) NOT NULL,
  `juego` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generaciones`
--

INSERT INTO `generaciones` (`id`, `nombre`, `juego`) VALUES
(1, 'Primera', 'Rojo, Azul, Amarillo, Rojo Fuego y Verde Hoja'),
(2, 'Segunda', 'Oro, Plata, Cristal, Oro HeartGold y Plata SoulSilver'),
(3, 'Tercera', 'Esmeralda, Rubí, Zafiro, Rubí Omega y Zafiro Alfa'),
(4, 'Cuarta', 'Diamante, Perla, Platino, Diamante Brillante y Perla Reluciente'),
(5, 'Quinta', 'Negro, Blanco, Negro 2 y Blanco 2'),
(6, 'Sexta', 'X y Y'),
(7, 'Séptima', 'Sol, Luna, Ultrasol y Ultraluna'),
(8, 'Octava', 'Leyendas: Arceus, Espada y Escudo'),
(9, 'Novena', 'Escarlata y Púrpura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidades`
--

CREATE TABLE `habilidades` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nombre` char(20) NOT NULL,
  `descipcion` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habilidades`
--

INSERT INTO `habilidades` (`id`, `nombre`, `descipcion`) VALUES
(1, 'Mar de Llamas', 'Mar llamas aumenta la potencia de los movimientos de tipo fuego del poseedor en un 50% cuando sus PS estén igual o por debajo de 1/3 de sus PS máximos.\r\n'),
(2, 'Torrente', 'Torrente aumenta la potencia de los movimientos de tipo agua del poseedor en un 50% cuando su salud esté igual o por debajo de 1/3 de sus PS máximos\r\n'),
(3, 'Espesura', 'Espesura aumenta la potencia de los movimientos de tipo planta del poseedor en un 50% cuando su salud esté igual o por debajo de 1/3 de sus PS máximos.\r\n'),
(4, 'Levitacion', 'Levitación proporciona al Pokémon poseedor inmunidad a todos los ataques de tipo tierra, excepto a ataque arena.'),
(5, 'Absorbe fuego', 'Absorbe fuego hace al poseedor inmune a los movimientos de tipo fuego, y potencia en un 50% sus ataques de tipo fuego hasta que sea cambiado o finalice el combate\r\n'),
(6, 'Robustez', 'Además del efecto anterior, robustez ahora tiene el mismo efecto que la banda focus, haciendo que el Pokémon sobreviva con 1 PS a ataques de daño directo que vayan a debilitarlo de un único golpe si sus PS estaban al máximo\r\n'),
(7, 'Cuerpo Puro', 'Cuerpo puro evita que bajen las estadísticas a causa de un movimiento del oponente\r\n'),
(8, 'Polvo escudo', 'Polvo escudo anula los efectos secundarios que pueden provocar al poseedor los ataques de los oponentes al poseedor de la habilidad, como la parálisis que puede causar golpe cuerpo.'),
(9, 'Mudar', 'Mudar tiene una probabilidad del 30% de curar los estados de dormido, paralizado, quemado, envenenado, gravemente envenenado o congelado al final de cada turno. La cura se produce antes de que las quemaduras o el veneno puedan causar daño.'),
(10, 'Ojo compuesto', 'Ojo compuesto aumenta en un 30% la precisión de los movimientos\r\n'),
(11, 'Impulso', 'Impulso sube un nivel la velocidad del Pokémon poseedor al final de cada turno.\r\n'),
(12, 'Superguarda', 'Superguarda protege al poseedor de cualquier ataque que cause daño directo al Pokémon que no sea muy eficaz contra él. Solo los movimientos supereficaces causarán daño al Pokémon.\r\n'),
(13, 'Corte fuerte', 'Corte fuerte evita que los oponentes bajen el ataque del poseedor. Las reducciones por usar movimientos propios, como fuerza bruta o por quemaduras siguen ocurriendo con normalidad.'),
(14, 'Electricidad estitic', 'Todo Pokémon que golpee con un ataque de contacto a un Pokémon con esta habilidad tiene una probabilidad del 30% de resultar paralizado\r\n'),
(15, 'Iman', 'Imán atrapa a Pokémon oponentes de tipo acero, impidiendo que estos huyan del combate o sean cambiados por su entrenador, hasta que quien posee la habilidad sea cambiado o derrotado.\r\n'),
(16, 'Sincronia', 'Si el poseedor de esta habilidad resulta envenenado, paralizado o quemado por el oponente, el oponente pasará a tener el mismo problema de estado del poseedor, siempre y cuando no sea impedido por tipos, habilidades o velo sagrado y campo de niebla.\r\n'),
(17, 'Entusiasmo', 'Entusiasmo aumenta el ataque del poseedor en un 50%, pero reduce en un 20% la precisión de los movimientos de categoría física. '),
(18, 'Sebo', 'Los movimientos de tipo hielo y tipo fuego solo le producirán la mitad del daño normal a un Pokémon con esta habilidad.\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemon`
--

CREATE TABLE `pokemon` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `region` smallint(6) UNSIGNED NOT NULL,
  `generacion` smallint(6) UNSIGNED NOT NULL,
  `habilidad` smallint(3) UNSIGNED NOT NULL,
  `tipo1` smallint(3) UNSIGNED DEFAULT NULL,
  `peso` decimal(7,2) NOT NULL,
  `altura` decimal(5,2) NOT NULL,
  `fecha` date NOT NULL,
  `imagen` varchar(256) NOT NULL,
  `precio` int(6) NOT NULL,
  `nombre` char(20) NOT NULL,
  `numero_dex` smallint(5) UNSIGNED NOT NULL,
  `descripcion_dex` varchar(256) DEFAULT NULL,
  `tipo2` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pokemon`
--

INSERT INTO `pokemon` (`id`, `region`, `generacion`, `habilidad`, `tipo1`, `peso`, `altura`, `fecha`, `imagen`, `precio`, `nombre`, `numero_dex`, `descripcion_dex`, `tipo2`) VALUES
(1, 1, 1, 1, 11, 8.50, 0.30, '2020-06-01', 'charmander.png', 100, 'Charmander', 4, 'La llama de su cola indica su fuerza vital. Si está débil, la llama arderá más tenue.\r\n', NULL),
(2, 1, 1, 1, 11, 19.00, 1.10, '2020-04-01', 'charmeleon.png', 200, 'Charmeleon', 5, 'De naturaleza bárbara, en la batalla esgrime su fiera cola, y araña con sus afiladas garras.\r\n', NULL),
(3, 1, 1, 1, 11, 90.00, 1.70, '2020-01-01', 'charizard.png', 500, 'Charizard', 6, 'Cuando lanza una descarga de fuego súper caliente, la roja llama de su cola brilla más intensamente.\r\n', 6),
(4, 2, 3, 1, 11, 2.50, 0.40, '2020-06-01', 'torchic.png', 100, 'Torchic', 255, 'Si le atacan, se defiende escupiendo bolas de fuego que forma en el estómago. Los Torchic tienen aversión a la oscuridad porque les impide ver lo que los rodea.\r\n', NULL),
(5, 3, 3, 1, 11, 19.00, 0.90, '2020-04-01', 'combusken.png', 200, 'Combusken', 257, 'Propina hasta diez patadas por segundo. Tiene un instinto de lucha tan fuerte que no deja de pelear hasta que el rival se rinde.\r\n', 5),
(6, 3, 3, 1, 11, 52.00, 1.90, '2020-01-01', 'blaziken.png', 500, 'Blaziken', 257, 'Aprende artes marciales en las que se dan puñetazos y patadas. Al cabo de varios años, se le queman las plumas y le crecen otras nuevas, muy flexibles, en su lugar.\r\n', 5),
(7, 1, 1, 2, 2, 9.00, 0.50, '2020-06-01', 'squirtle.png', 100, 'Squirtle', 7, 'Lanza agua a su presa desde el agua. Se esconde en su concha cuando se siente en peligro.\r\n', NULL),
(8, 1, 1, 2, 2, 22.00, 1.00, '2020-04-01', 'wartortle.png', 200, 'Wartortle', 8, 'wartortle.png', NULL),
(9, 1, 1, 2, 2, 85.00, 1.60, '2020-01-01', 'blastoise.png', 500, 'Blastoice', 9, 'Cuando ataca a un enemigo, su descarga de agua es aún más potente que una manga de bombero.\r\n', NULL),
(10, 3, 3, 2, 2, 7.60, 0.40, '2020-06-01', 'mudkip.png', 100, 'Mudkip', 258, 'En tierra firme, puede levantar grandes cantos rodados haciendo palanca con sus cuatro patas. Duerme enterrado en el suelo, cerca del agua.\r\n', NULL),
(11, 3, 3, 2, 2, 28.00, 0.70, '2020-04-01', 'marshtomp.png', 200, 'Marshtop', 259, 'Tiene unas patas traseras fortísimas que le permiten mantenerse erguido. Como se debilita si se le seca la piel, juega en el lodo para mantenerse hidratado.\r\n', NULL),
(12, 3, 3, 2, 2, 81.90, 1.50, '2020-04-01', 'swampert.png', 500, 'Swampert', 260, 'Si detecta que se acerca una tormenta, protege su nido apilando cantos rodados para protegerlo del fuerte oleaje. Nada tan rápido como una moto acuática.\r\n', 8),
(13, 1, 1, 3, 12, 6.90, 0.70, '2020-06-01', 'bulbasaur.png', 100, 'Bulbasaur', 1, 'Puede sobrevivir largo tiempo sin probar bocado. Guarda energía en el bulbo de su espalda.\r\n', 7),
(14, 1, 1, 3, 12, 13.00, 1.00, '2020-04-01', 'ivysaur.png', 200, 'Ivysaur', 2, 'Su bulbo crece cuando absorbe energía. Desprende un fuerte aroma cuando florece.\r\n', 7),
(15, 1, 1, 3, 12, 100.00, 2.00, '2020-01-01', 'venusaur.png', 500, 'Venusaur', 3, 'La flor de su espalda recoge los rayos del sol. Los transforma en energía.\r\n', 7),
(16, 9, 9, 3, 12, 4.10, 0.40, '2020-06-01', 'sprigatito.png', 100, 'Sprigatito', 906, 'Su sedoso pelaje se asemeja en composición a las plantas. Se lava la cara con diligencia para que no se le seque.\r\n', NULL),
(17, 9, 9, 3, 12, 12.20, 0.90, '2020-04-01', 'floragato.png', 200, 'Floragato', 907, 'Maneja diestramente la vid oculta bajo su largo pelaje y propina latigazos al enemigo con el capullo endurecido de la punta.\r\n', NULL),
(18, 9, 9, 3, 12, 31.20, 1.50, '2020-01-01', 'meowscarada.png', 500, 'Meowscarada', 908, 'Se sirve de la luz que reflejan los tricomas de su manto de hojas para camuflar la vid y crear la ilusión óptica de que la flor flota en el aire.\r\n', 18),
(19, 1, 1, 4, 10, 0.10, 1.30, '2020-06-01', 'gastly.png', 100, 'Gastly', 92, 'Solo aparece en edificios en ruinas. No tiene forma real, ya que parece que está hecho de gas.\r\n', 7),
(20, 1, 1, 4, 10, 0.10, 1.60, '2020-04-01', 'haunter.png', 200, 'Haunter', 93, 'Toma la vida de su adversario a lengüetazos. Esto produce mareos hasta que la víctima fallece\r\n', 7),
(21, 1, 1, 4, 10, 40.50, 1.70, '2020-01-01', 'gengar.png', 500, 'Gengar', 94, 'Sabrás que un Gengar está cerca cuando sufras de sudores fríos. Intentará echarte un hechizo.\r\n', 7),
(22, 5, 5, 5, 10, 3.10, 0.30, '2020-06-01', 'litwick.png', 100, 'Litwick', 607, 'La luz que desprende absorbe la energía vital de humanos y Pokémon.\r\n', 11),
(23, 5, 5, 5, 10, 13.00, 0.60, '2020-04-01', 'lampent.png', 200, 'Lampent', 608, 'Lo temen por ser considerado de mal agüero. Vaga en busca de almas de individuos que han pasado a mejor vida.\r\n', 11),
(24, 5, 5, 5, 10, 34.30, 1.00, '2020-01-01', 'chandelure.png', 500, 'Chandelure', 609, 'Absorbe almas y las quema. Mece las llamas de sus brazos para hipnotizar a sus enemigos.\r\n', 11),
(25, 3, 3, 6, 1, 60.00, 1.40, '2020-06-01', 'aron.png', 100, 'Aron', 304, 'Está cubierto por una coraza de acero que se regenera cuando evoluciona. La coraza vieja, ya estropeada, se recicla para fabricar productos de hierro.\r\n', 9),
(26, 3, 3, 6, 1, 120.00, 0.90, '2020-04-01', 'lairon.png', 200, 'Lairon', 305, 'Si dos Lairon se encuentran en su hábitat natural, luchan por su territorio golpeándose con sus cuerpos de acero. El estruendo que forman se oye a kilómetros.\r\n', 9),
(27, 3, 3, 6, 1, 360.00, 2.10, '2020-01-01', 'aggron.png', 500, 'Aggron', 305, 'Los cuernos de hierro que tiene le crecen poco a poco. Sirven para determinar la edad que tiene. Luce los desperfectos de su coraza en recuerdo de sus combates.\r\n', 9),
(28, 3, 3, 7, 1, 95.20, 0.60, '2020-06-01', 'beldum.png', 100, 'Beldum', 374, 'Cuando los Beldum van en enjambre, se mueven al unísono en perfecta armonía, como si fueran un solo Pokémon. Se comunican por ondas cerebrales.\r\n', 14),
(29, 3, 3, 7, 1, 202.50, 1.20, '2020-04-01', 'metang.png', 200, 'Metang', 375, 'Sus brazos acaban en unas garras que acumulan energía destructiva con la que rasga planchas de hierro como si fueran de papel. Vuela a más de 100 km por hora.\r\n', 14),
(30, 3, 3, 7, 1, 376.00, 1.60, '2020-01-01', 'metagross.png', 500, 'Metagross', 376, 'Metagross tiene cuatro cerebros unidos por una compleja red neuronal. Esta integración hace que sea más inteligente que un ordenador de última generación.\r\n', 14),
(31, 1, 1, 8, 3, 2.90, 0.30, '2020-06-01', 'caterpie.png', 100, 'Caterpie', 10, 'Si tocas los receptores de su cabeza, soltará un terrible olor para protegerse.\r\n', NULL),
(32, 1, 1, 9, 3, 9.90, 0.70, '2020-04-01', 'metapod.png', 200, 'Metapod', 11, 'Endurece su concha para protegerse. De todos modos, un gran impacto puede afectarle.\r\n', NULL),
(33, 1, 1, 10, 3, 32.00, 1.10, '2020-01-01', 'butterfree.png', 500, 'Butterfree', 12, 'Sus alas están cubiertas de polvos venenosos. Como repelen el agua, puede volar bajo la lluvia.\r\n', 6),
(34, 3, 3, 10, 3, 5.50, 0.50, '2020-06-01', 'nincada.png', 100, 'Nincada', 290, 'Hace su nido en las raíces de un árbol resistente. Tiene unas antenas con forma de bigotes que usa para examinar el oscuro terreno que le rodea.\r\n', NULL),
(35, 3, 3, 11, 3, 12.00, 0.80, '2020-04-01', 'ninjask.png', 200, 'Ninjask', 291, 'Como se mueve de un lado a otro a una velocidad de vértigo es casi imposible verlo. Oír su zumbido durante mucho tiempo llega a dar dolor de cabeza.\r\n', 6),
(36, 3, 3, 12, 3, 1.20, 0.80, '2020-04-01', 'shedinja.png', 500, 'Shedinja', 292, 'Curioso Pokémon que permanece en suspensión sin mover las alas. Su interior está hueco y totalmente oscuro.\r\n', 10),
(37, 9, 9, 7, 16, 2.00, 0.50, '2020-06-01', 'dreepy.png', 100, 'Dreepy', 885, 'Habitaba los mares en tiempos inmemoriales. Ha revivido en forma de Pokémon de tipo Fantasma para vagar por su antigua morada.\r\n', 10),
(38, 9, 9, 7, 16, 11.00, 1.40, '2020-04-01', 'drakloak.png', 200, 'Drakloak', 886, 'Vuela a una velocidad de 200 km/h. Lucha junto a un Dreepy, al que cuida hasta el momento de su evolución.\r\n', 10),
(39, 9, 9, 13, 16, 50.00, 3.00, '2020-01-01', 'dragapult.png', 500, 'Dragapult', 887, 'Vive en compañía de Dreepy, a los que hospeda en el interior de sus cuernos. Los dispara a velocidad supersónica en combate.\r\n', 10),
(40, 3, 3, 13, 8, 15.00, 0.70, '2020-06-01', 'trapinch.png', 100, 'Trapinch', 328, 'Tiene unas enormes fauces con las que destruye piedras. Como tiene una cabeza muy grande, le cuesta conseguir ponerse de pie si se cae de espaldas.\r\n', 8),
(41, 3, 3, 4, 8, 15.30, 1.10, '2020-04-01', 'vibrava.png', 200, 'Vibrava', 329, 'Cuando frota las alas, emite ondas ultrasónicas, pero, como aún no están completamente desarrolladas, sólo puede volar distancias cortas.\r\n', 16),
(42, 3, 3, 4, 8, 82.00, 2.00, '2020-01-01', 'flygon.png', 500, 'Flygon', 330, 'El aleteo de sus alas es muy melódico. Para evitar que el enemigo lo descubra, levanta con las alas una nube de arena del desierto, tras la cual se oculta.\r\n', 16),
(43, 2, 2, 14, 13, 7.80, 0.60, '2020-06-01', 'mareep.png', 100, 'Mareep', 179, 'Tiene un pelaje lanudo y suave que produce carga estática por el roce. Cuanto más se carga de electricidad estática, más brilla la bombilla que lleva en la cola.\r\n', NULL),
(44, 2, 2, 14, 13, 13.30, 0.80, '2020-04-01', 'flaaffy.png', 200, 'Flaaffy', 180, 'La calidad de su lana varía para generar electricidad estática con poca cantidad de lana. Las zonas donde no hay pelaje están protegidas contra la electricidad.\r\n', NULL),
(45, 2, 2, 14, 13, 61.30, 1.40, '2020-01-01', 'ampharos.png', 500, 'Ampharos', 181, 'Desprende tanta luz que es posible verlo desde el espacio. Antes, la gente usaba su luz como sistema de comunicación con el que enviaba señales a gran distancia.\r\n', NULL),
(46, 1, 1, 15, 13, 6.00, 0.30, '2020-06-01', 'magnemite.png', 100, 'Magnemite', 81, 'Puede desafiar a la gravedad desde su nacimiento. Flota en el aire gracias a ondas electromagnéticas.\r\n', 1),
(47, 1, 1, 15, 13, 60.00, 1.00, '2020-04-01', 'magneton.png', 200, 'Magneton', 82, 'Genera extrañas señales de radio. Es capaz de elevar la temperatura 3º centígrados.\r\n', 1),
(48, 1, 1, 15, 13, 180.00, 1.20, '2020-01-01', 'magnezone.png', 500, 'Magnezone', 462, 'Evolucionó por la exposición a un campo magnético especial. Tres unidades generan magnetismo.\r\n', 1),
(49, 3, 3, 16, 14, 6.30, 0.40, '2020-06-01', 'ralts.png', 100, 'Ralts', 280, 'Ralts tiene la capacidad de detectar las sensaciones de la gente y de los Pokémon gracias a los cuernos de la cabeza. Si percibe energía negativa, se protegerá.\r\n', 17),
(50, 3, 3, 16, 14, 20.20, 0.80, '2020-04-01', 'kirlia.png', 200, 'Kirlia', 281, 'Kirlia tiene poderes psicoquinéticos con los que crea un espacio dimensional para ver el futuro. Dicen que baila con energía en las mañanas soleadas.\r\n', 17),
(51, 3, 3, 16, 14, 48.40, 1.60, '2020-01-01', 'gardevoir.png', 500, 'Gardevoir', 282, 'Al parecer, no siente la fuerza de la gravedad porque se sostiene gracias a la energía psicoquinética. Por proteger a su Entrenador, sería capaz de todo.\r\n', 17),
(52, 2, 2, 17, 17, 1.50, 0.30, '2020-06-01', 'togepi.png', 100, 'Togepi', 175, 'El cascarón parece estar lleno de alegría. Dicen que trae buena suerte si es tratado con cariño.\r\n', NULL),
(53, 2, 2, 17, 17, 3.20, 0.60, '2020-04-01', 'togetic.png', 200, 'Togetic', 176, 'Dicen que aparece entre gentes cuidadosas y de buen corazón, a quienes inunda de felicidad.\r\n', 6),
(54, 4, 4, 17, 17, 38.00, 1.50, '2020-01-01', 'togekiss.png', 500, 'Togekiss', 468, 'Nunca aparece donde hay peleas. Últimamente no se deja ver muy a menudo.\r\n', 6),
(55, 3, 3, 18, 15, 39.50, 0.80, '2020-06-01', 'spheal.png', 100, 'Spheal', 363, 'Está cubierto por completo con un grueso pelaje. Gracias a él, nunca siente frío: ni cuando rueda sobre placas de hielo ni cuando bucea en el mar.\r\n', 2),
(56, 3, 3, 18, 17, 87.60, 1.10, '2020-04-01', 'sealeo.png', 200, 'Sealeo', 364, 'Sealeo vive en manadas sobre placas de hielo. Puede romper el hielo usando sus potentes aletas y se zambulle en el mar cinco veces al día para pescar.\r\n', 2),
(57, 3, 3, 18, 15, 150.60, 1.40, '2020-01-01', 'walrein.png', 500, 'Walrein', 365, 'Para proteger a su manada, el líder luchará hasta el final contra todo lo que invada su territorio. En el transcurso del combate, es posible que pierda los colmillos.\r\n', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemon_x_tipo`
--

CREATE TABLE `pokemon_x_tipo` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `pokemon_id` smallint(5) UNSIGNED NOT NULL,
  `tipo_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pokemon_x_tipo`
--

INSERT INTO `pokemon_x_tipo` (`id`, `pokemon_id`, `tipo_id`) VALUES
(1, 1, 11),
(3, 27, 1),
(4, 27, 9),
(5, 45, 13),
(6, 25, 1),
(7, 25, 9),
(8, 28, 1),
(9, 28, 14),
(10, 9, 2),
(11, 6, 11),
(12, 6, 5),
(13, 13, 12),
(14, 13, 7),
(15, 33, 3),
(16, 33, 6),
(17, 31, 3),
(18, 24, 10),
(19, 24, 11),
(20, 3, 11),
(21, 3, 6),
(23, 2, 11),
(24, 5, 11),
(25, 5, 5),
(26, 39, 16),
(27, 39, 10),
(28, 38, 16),
(29, 38, 10),
(30, 37, 16),
(31, 37, 10),
(32, 44, 13),
(33, 17, 12),
(34, 42, 16),
(35, 42, 8),
(36, 51, 17),
(37, 51, 14),
(38, 19, 10),
(39, 19, 7),
(40, 21, 10),
(41, 21, 7),
(42, 20, 10),
(43, 20, 7),
(44, 14, 12),
(45, 14, 7),
(46, 50, 17),
(47, 50, 14),
(48, 26, 1),
(49, 26, 9),
(50, 23, 10),
(51, 23, 11),
(52, 22, 10),
(53, 22, 11),
(54, 46, 1),
(55, 46, 13),
(56, 47, 1),
(57, 47, 13),
(58, 48, 1),
(59, 48, 13),
(60, 43, 13),
(61, 11, 2),
(62, 11, 8),
(63, 18, 12),
(64, 18, 18),
(65, 30, 1),
(66, 30, 14),
(67, 29, 1),
(68, 29, 14),
(69, 32, 3),
(70, 10, 2),
(71, 34, 3),
(72, 34, 8),
(73, 35, 3),
(74, 35, 6),
(75, 49, 17),
(76, 49, 14),
(77, 56, 15),
(78, 56, 2),
(79, 36, 3),
(80, 36, 10),
(81, 55, 15),
(82, 55, 2),
(83, 16, 12),
(84, 7, 2),
(85, 12, 2),
(86, 12, 8),
(87, 54, 17),
(88, 54, 6),
(89, 52, 17),
(90, 53, 17),
(91, 53, 6),
(92, 4, 11),
(93, 40, 8),
(94, 15, 12),
(95, 15, 7),
(96, 41, 16),
(97, 41, 8),
(98, 57, 15),
(99, 57, 2),
(100, 8, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nombre` char(20) NOT NULL,
  `descripcion` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Kanto', 'La región original presentada en los juegos Pokémon Rojo y Azul. Kanto es conocida por sus ocho gimnasios y la Liga Pokémon, donde los entrenadores buscan convertirse en el campeón de la región'),
(2, 'Johto', 'Introducida en Pokémon Oro y Plata, esta región vecina de Kanto también tiene ocho gimnasios, pero ofrece una nueva trama y una variedad de Pokémon de la región Johto y Kanto.'),
(3, 'Hoenn', 'Aparece en Pokémon Rubí, Zafiro y Esmeralda. Hoenn destaca por su geografía diversa, con rutas acuáticas y tierras exóticas. Hay ocho gimnasios y una nueva Liga Pokémon.'),
(4, 'Sinnoh', 'Presentada en Pokémon Diamante, Perla y Platino, Sinnoh ofrece una experiencia de juego expansiva con nuevas formas de evolución y un clima dinámico. También tiene ocho gimnasios y la Liga Pokémon.'),
(5, 'Teselia', 'La región de Teselia se encuentra en Pokémon Negro y Blanco. Es conocida por su extensión urbana y un conjunto de Pokémon exclusivos de la región. También introdujo la opción de combates en triple y rotativos.\r\n\r\n'),
(6, 'Kalos', 'Presentada en Pokémon X e Y, Kalos se inspira en Francia. Ofrece un nuevo sistema de movimiento llamado \"Holo Caster\" y tiene una Liga Pokémon única. También introdujo la Megaevolución.'),
(7, 'Alola', 'En Pokémon Sol y Luna, los jugadores exploran la región tropical de Alola, inspirada en Hawái. Alola presenta la variante regional de Pokémon y el desafío de las islas en lugar de gimnasios tradicionales.'),
(8, 'Galar', 'Introducida en Pokémon Espada y Escudo, Galar se basa en el Reino Unido y presenta el fenómeno Dinamax, que permite a los Pokémon aumentar de tamaño durante las batallas. La región tiene un sistema de gimnasios renovado llamado Desafío de Estadios.'),
(9, 'Paldea', 'Vista en los juegos de Escarlata y Purpura, una vasta región llena de lagos, altos picos, terrenos baldíos y cadenas montañosas escarpadas.\r\nLa Región de Paldea se basa en España, tomando elementos geográficos, culturales y arquitectónicos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nombre` char(20) NOT NULL,
  `debilidad` char(100) DEFAULT NULL,
  `fortaleza` char(100) DEFAULT NULL,
  `inmunidad` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `nombre`, `debilidad`, `fortaleza`, `inmunidad`) VALUES
(1, 'Acero', 'Fuego, Lucha, Tierra', 'Hada, Hielo, Roca', 'Veneno'),
(2, 'Agua', 'Eléctrico, Planta', 'Fuego, Tierray Roca', 'Ninguna'),
(3, 'Bicho', 'Fuego, Roca, Volador', 'Planta, Psíquico, Siniestro', 'Ninguna'),
(4, 'Normal', 'Lucha', 'Ninguno', 'Fantasma'),
(5, 'Lucha', 'Volador, Psíquico, Hada', 'Normal, Hielo, Roca, Siniestro, Acero', 'Fantasma'),
(6, 'Volador', 'Eléctrico, Hielo, Roca', 'Lucha, Bicho, Planta', 'Ninguna'),
(7, 'Veneno', 'Tierra, Psíquico', 'Planta, Hada', 'Ninguna'),
(8, 'Tierra', 'Agua, Planta, Hielo', 'Fuego, Eléctrico, Veneno, Roca, Acero', 'Electrico'),
(9, 'Roca', 'Agua, Planta, Lucha, Tierra, Acero', 'Fuego, Volador, Bicho, Hielo', 'Ninguna'),
(10, 'Fantasma', 'Fantasma, Siniestro', 'Fantasma, Psiquico', 'Normal, Lucha'),
(11, 'Fuego', 'Agua, Roca, Tierra', 'Planta, Hielo, Bicho, Acero', 'Ninguna'),
(12, 'Planta', 'Fuego, Volador, Hielo, Bicho, Veneno', 'Agua, Tierra, Roca', 'Ninguna'),
(13, 'Eléctrico', 'Tierra', 'Agua, Volador', 'Ninguna'),
(14, 'Psíquico', 'Bicho, Siniestro, Fantasma', 'Lucha, Psíquico', 'Ninguna'),
(15, 'Hielo', 'Lucha, Fuego, Roca, Acero', 'Planta, Tierra, Volador, Dragón', 'Ninguna'),
(16, 'Dragón', 'Hielo, Hada, Dragón', 'Dragón', 'Ninguna'),
(17, 'Hada', 'Veneno, Acero', 'Lucha, Dragón, Siniestro', 'Dragón'),
(18, 'Siniestro', 'Hada, Lucha, Bicho', 'Fantasma, Psiquico', 'Psiquico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `email` char(50) NOT NULL,
  `nombre_usuario` char(50) NOT NULL,
  `nombre_completo` char(50) DEFAULT NULL,
  `pass` char(200) NOT NULL,
  `roll` enum('usuario','admin','superadmin','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `nombre_usuario`, `nombre_completo`, `pass`, `roll`) VALUES
(1, 'mauro@hotmail.com', 'mauros', 'Mauro soto', '$2y$10$GfwFsHAPo3jeG9LUsl8HK.2G8EGvDg8nApR93HJhZ3H3/7Vu6VVNm', 'usuario'),
(2, 'ale_soto@gmail.com', 'alejandros', 'Alejandro soto', '$2y$10$PS9PQB1Lote8CuG1smYq9e2tKevzMfb4RmZfV35hojcbp4IlRv4Ri', 'admin'),
(3, 'mauro_soto@davinci.edu.ar', 'mas1702', 'Mauro Alejandro Soto', '$2y$10$oPFVn9dvYg2XaCiNAjkOzOHpP33LIKGKlVzZsBjlkP8z.6MDgvltG', 'superadmin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `generaciones`
--
ALTER TABLE `generaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region` (`region`),
  ADD KEY `generacion` (`generacion`),
  ADD KEY `habilidad` (`habilidad`),
  ADD KEY `tipo` (`tipo1`),
  ADD KEY `pokemon_ibfk_3` (`tipo2`);

--
-- Indices de la tabla `pokemon_x_tipo`
--
ALTER TABLE `pokemon_x_tipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pokemon_id` (`pokemon_id`),
  ADD KEY `tipo_id` (`tipo_id`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `generaciones`
--
ALTER TABLE `generaciones`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `pokemon_x_tipo`
--
ALTER TABLE `pokemon_x_tipo`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pokemon`
--
ALTER TABLE `pokemon`
  ADD CONSTRAINT `pokemon_ibfk_1` FOREIGN KEY (`generacion`) REFERENCES `generaciones` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pokemon_ibfk_2` FOREIGN KEY (`tipo1`) REFERENCES `tipos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pokemon_ibfk_3` FOREIGN KEY (`tipo2`) REFERENCES `tipos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pokemon_ibfk_4` FOREIGN KEY (`habilidad`) REFERENCES `habilidades` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pokemon_ibfk_5` FOREIGN KEY (`region`) REFERENCES `region` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `pokemon_x_tipo`
--
ALTER TABLE `pokemon_x_tipo`
  ADD CONSTRAINT `pokemon_x_tipo_ibfk_1` FOREIGN KEY (`pokemon_id`) REFERENCES `pokemon` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pokemon_x_tipo_ibfk_2` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
