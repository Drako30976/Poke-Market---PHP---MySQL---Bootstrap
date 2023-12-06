<?php
Class Region
{
    protected $id;
    protected $nombre;
    protected $descripcion;

    /**
     * Devuelve los datos de la Region
     * @param int ID de la Region
     */
    public function Region(int $id) : Region {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM region WHERE id=:id";

        $PDOS = $conexion->prepare($query);
        $PDOS->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOS->execute(['id'=>$id]);
        $result =$PDOS->fetch();

        return $result;
    }

    /**
     * Devuelve el listado de los tipos de pokemon
     */
    public function region_list(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM region";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista = $PDOStatement->fetchAll();

        return $lista;
    }

    /**
     * Inserta una nueva region a la base de datos
     * @param string $nombre
     * @param string $descripcion

     */
    public function insert_region(string $nombre, string $descripcion)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO region (`nombre`, `descripcion`) VALUES (:nombre, :descripcion)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'nombre' => $nombre,
                'descripcion' => $descripcion
            ]
        );

    }

    /**
     * Edita los datos de una region
     * @param string $nombre
     * @param string $descripcion
     */
    public function edit_region($nombre, $descripcion)
    {

        $conexion = Conexion::getConexion();
        $query = "UPDATE region SET nombre = :nombre, descripcion = :descripcion WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'nombre' => $nombre,
                'descripcion' => $descripcion
            ]
        );
    }

     /**
     * Elimina una Region de la base de datos
     */
    public function delete_region()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM region WHERE id = ?";

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
        return $this->descripcion;
    }
}