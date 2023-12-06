<?php
Class Habilidad
{
    protected $id;
    protected $nombre;
    protected $descipcion;

    /**
     * Devuelve los datos de la hebilidad
     * @param int ID de la hebilidad
     */
    public function Habilidad(int $id) : Habilidad {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM habilidades WHERE id=:id";

        $PDOS = $conexion->prepare($query);
        $PDOS->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOS->execute(['id'=>$id]);
        $result =$PDOS->fetch();

        return $result;
    }

    /**
     * ingresa una habilidad en la base de datos
     */
    public function insert_hab(string $nombre, string $descipcion)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO habilidades (`nombre`, `descipcion`) VALUES (:nombre, :descipcion)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'nombre' => $nombre,
                'descipcion' => $descipcion
            ]
        );

    }

        /**
     * Devuelve el listado de las generaciones
     */
    public function hab_list(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM habilidades";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista = $PDOStatement->fetchAll();

        return $lista;
    }

    /**
     * Elimina una habilidad de la base de datos
     */
    public function delete_hab()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM habilidades WHERE id = ?";

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
     * Get the value of descipcion
     */ 
    public function getDescipcion()
    {
        return $this->descipcion;
    }
}