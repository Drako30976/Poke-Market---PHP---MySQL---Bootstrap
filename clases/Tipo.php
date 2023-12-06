<?php
Class Tipo
{
    protected $id;
    protected $nombre;
    protected $debilidad;
    protected $fortaleza;
    protected $inmunidad;

    /**
     * Devuelve los datos de los tipos
     * @param int ID de la tipos
     */
    public function Tipo(int $id) : Tipo {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM tipos WHERE id=:id";

        $PDOS = $conexion->prepare($query);
        $PDOS->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOS->execute(['id'=>$id]);
        $result =$PDOS->fetch();

        return $result;
    }

    /**
     * Devuelve el listado de los tipos de pokemon
     */
    public function type_list(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM tipos";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista = $PDOStatement->fetchAll();

        return $lista;
    }

     /**
     * Inserta un nuevo tipo a la base de datos
     * @param string $nombre
     * @param string $debilidad
     * @param string $fortaleza
     * @param string $inmunidad 
     */
    public function insert_type(string $nombre, string $debilidad, string $fortaleza, string $inmunidad)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO tipos (`nombre`, `debilidad`, `fortaleza`, `inmunidad`) VALUES (:nombre, :debilidad, :fortaleza, :inmunidad)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'nombre' => $nombre,
                'debilidad' => $debilidad,
                'fortaleza' => $fortaleza,
                'inmunidad' => $inmunidad,
            ]
        );

    }
    /**
     * Edita los datos de un tipo
     * @param string $nombre
     * @param string $debilidad
     * @param string $fortaleza
     * @param string $inmunidad 
     */
    public function edit_tipo($nombre, $debilidad, $fortaleza, $inmunidad)
    {

        $conexion = Conexion::getConexion();
        $query = "UPDATE tipos SET nombre = :nombre, debilidad = :debilidad, fortaleza = :fortaleza, inmunidad = :inmunidad WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'nombre' => $nombre,
                'debilidad' => $debilidad,
                'fortaleza' => $fortaleza,
                'inmunidad' => $inmunidad,
            ]
        );
    }

     /**
     * Elimina un "tipo" de la base de datos
     */
    public function delete_type()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM tipos WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of debilidad
     */ 
    public function getDebilidad()
    {
        return $this->debilidad;
    }

    /**
     * Get the value of fortaleza
     */ 
    public function getFortaleza()
    {
        return $this->fortaleza;
    }

    /**
     * Get the value of inmunidad
     */ 
    public function getInmunidad()
    {
        return $this->inmunidad;
    }
}