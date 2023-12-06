<?php
class Pokes
{

    private $id;
    private $nombre;
    private $imagen;
    private $region;
    private $generacion;
    private $numero_dex;
    private $habilidad;
    private $peso;
    private $altura;
    private $fecha;
    private $tipo1;
    private $tipo2;
    private $precio;
    private $descripcion_dex;


    private static $createValues = ['id', 'nombre', 'imagen', 'numero_dex', 'peso', 'altura', 'fecha', 'precio', 'descripcion_dex'];


    /**
     * Devuelve una instancia del objeto Pokes con todas sus propiedades
     * @return Pokes
     */
    private function createPoke($pokeData): Pokes
    {
        $poke = new self();
        foreach (self::$createValues as  $value) {
            $poke->{$value} = $pokeData[$value];
        }
        $poke->region = (new Region())->Region(($pokeData['region']));
        $poke->generacion = (new Generacion())->generacion(($pokeData['generacion']));
        $poke->habilidad  = (new Habilidad())->Habilidad(($pokeData['habilidad']));
        $poke->tipo1  = (new Tipo())->Tipo(($pokeData['tipo1']));
        $poke->tipo2  = !empty($pokeData['tipo2']) ? (new Tipo())->Tipo(($pokeData['tipo2'])) : null;

        return $poke;
    }


    /**
     * Devuelve el catálgo de pokemons disponibles
     * 
     * @return array Un array de pokemons
     */
    public function lista_pokes(): array
    {
        $catalogo = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM pokemon";
        $PDOS = $conexion->prepare($query);
        $PDOS->setFetchMode(PDO::FETCH_ASSOC);
        $PDOS->execute();

        while ($resultado = $PDOS->fetch()) {
            $catalogo[] = $this->createPoke($resultado);
        }
        return $catalogo;
    }

    /**
     * devuelve un arreglo de los pokemon filtrados por tipo
     * @param int $int1
     * @param int $int2
     * @return array
     */

    public function typeFilter(int $int1, int $int2 = null): array
    {
        $catalogo = [];
        $conexion = Conexion::getConexion();
        if (!$int2) {

            $query = "SELECT pokemon.* FROM `pokemon` 
            JOIN pokemon_x_tipo ON pokemon.id = pokemon_x_tipo.pokemon_id
            WHERE pokemon_x_tipo.tipo_id = :tone";

            $PDOS = $conexion->prepare($query);
            $PDOS->setFetchMode(PDO::FETCH_ASSOC);
            $PDOS->execute([
                "tone" => $int1
            ]);
        } else {

            $query = "SELECT pokemon.*, COUNT(*) FROM `pokemon` 
            JOIN pokemon_x_tipo ON pokemon.id = pokemon_x_tipo.pokemon_id
            WHERE (pokemon_x_tipo.tipo_id = :tone OR pokemon_x_tipo.tipo_id =:ttwo)
            GROUP BY pokemon.id 
            HAVING COUNT(*) = 2";

            $PDOS = $conexion->prepare($query);
            $PDOS->setFetchMode(PDO::FETCH_ASSOC);
            $PDOS->execute([
                "tone" => $int1,
                "ttwo" => $int2
            ]);
        }

        while ($resultado = $PDOS->fetch()) {
            $catalogo[] = $this->createPoke($resultado);
        }
        if (empty($catalogo)) {
            echo "<h3 class='align-items-center text-center py-4'>No se encontraron pokemons de este tipo</h3>";
            return [];
        } else {
            return $catalogo;
        }
    }

    /**
     * Devuelve el catálgo de pokemons filtrados
     * @param int $id un string con el tipo de pokemon a filtrar por id
     */
    public function filtrado_Id(int $id): ?Pokes
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM pokemon WHERE id = ?";
        $PDOS = $conexion->prepare($query);
        $PDOS->setFetchMode(PDO::FETCH_ASSOC);
        $PDOS->execute([$id]);
        $resultado = $PDOS->fetch();
        $poke = $this->createPoke($resultado);

        return $poke ?? null;
    }


    /**
     * Inserta un nuevo pokemon a la base de datos
     * @param int $region
     * @param int $generacion
     * @param int $habilidad
     * @param int $tipo1 
     * @param int $peso 
     * @param int $altura 
     * @param string $fecha 
     * @param string $imagen 
     * @param int $precio 
     * @param string $nombre 
     * @param int $numero_dex 
     * @param string $descripcion_dex
     * @param int $tipo2
     */


    /**
     * Inserta un pokemon a la base de datos
     */
    public function insert_poke(int $region, int $generacion, int $habilidad, int $tipo1, int $peso, int $altura, string $fecha, string $imagen, int $precio, string $nombre, int $numero_dex, string $descripcion_dex, int $tipo2 = null)

    {
        $conexion = Conexion::getConexion();

        $query = "INSERT INTO pokemon (`region`, `generacion`, `habilidad`, `tipo1`, `peso`, `altura`, `fecha`, `imagen`, `precio`, `nombre`, `numero_dex`, `descripcion_dex`,`tipo2`) VALUES (:region, :generacion, :habilidad, :tipo1, :peso, :altura, :fecha, :imagen, :precio, :nombre, :numero_dex, :descripcion_dex, :tipo2)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'region' => $region,
                'generacion' => $generacion,
                'habilidad' => $habilidad,
                'tipo1' => $tipo1,
                'peso' => $peso,
                'altura' => $altura,
                'fecha' => $fecha,
                'imagen' => $imagen,
                'precio' => $precio,
                'nombre' => $nombre,
                'numero_dex' => $numero_dex,
                'descripcion_dex' => $descripcion_dex,
                'tipo2' => $tipo2 ?? null,
            ]
        );
    }

    /**
     * Edita los datos de un pokemon
     * @param int $region
     * @param int $generacion
     * @param int $habilidad
     * @param int $tipo1 
     * @param int $peso 
     * @param int $altura 
     * @param string $fecha 
     * @param string $imagen 
     * @param int $precio 
     * @param string $nombre 
     * @param int $numero_dex 
     * @param string $descripcion_dex
     * @param int $tipo2
     */
    public function edit_poke(int $region, int $generacion, int $habilidad, int $tipo1, int $peso, int $altura, string $fecha, string $imagen, int $precio, string $nombre, int $numero_dex, string $descripcion_dex, int $tipo2)
    {

        $conexion = Conexion::getConexion();

        $query = "UPDATE pokemon SET region = :region, generacion = :generacion, habilidad = :habilidad, tipo1 = :tipo1, peso = :peso, altura = :altura, fecha = :fecha, imagen = :imagen, precio = :precio, nombre = :nombre, numero_dex = :numero_dex, descripcion_dex = :descripcion_dex, tipo2 = :tipo2 WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id' => $this->id,
            'region' => $region,
            'generacion' => $generacion,
            'habilidad' => $habilidad,
            'tipo1' => $tipo1,
            'peso' => $peso,
            'altura' => $altura,
            'fecha' => $fecha,
            'imagen' => $imagen,
            'precio' => $precio,
            'nombre' => $nombre,
            'numero_dex' => $numero_dex,
            'descripcion_dex' => $descripcion_dex,
            'tipo2' => $tipo2,
        ]);
    }

    /**
     * Elimina un pokemon de la base de datos
     */
    public function delete_poke()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM pokemon WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }


    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getRegion()
    {
        return $this->region->getNombre();
    }

    public function getGeneracion()
    {
        return $this->generacion->getNombre();
    }

    public function getNumero()
    {
        return $this->numero_dex;
    }

    public function getHabilidad()
    {
        return $this->habilidad->getNombre();
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function getAltura()
    {
        return $this->altura;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getTipo1()
    {
        return $this->tipo1->getNombre();
    }

    public function getTipo2()
    {
        if ($this->tipo2 === null) {
            return "";
        } else {
            return $this->tipo2->getNombre();
        }
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Get the value of descripcion_dex
     */
    public function getDescripcion_dex()
    {
        return $this->descripcion_dex;
    }
}
