<?php
Class Generacion
{
    protected $id;
    protected $nombre;
    protected $juego;

    /**
     * Devuelve los datos de la generacion
     * @param int ID de la genercion
     */
    public function generacion(int $id) : Generacion {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM generaciones WHERE id=:id";

        $PDOS = $conexion->prepare($query);
        $PDOS->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOS->execute(['id'=>$id]);
        $result =$PDOS->fetch();

        return $result;
    }

    /**
     * Devuelve el listado de las generaciones
     */
    public function gen_list(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM generaciones";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista = $PDOStatement->fetchAll();

        return $lista;
    }

        /**
     * Inserta una nueva generacion en la base de datos
     * @param string $nombre
     * @param string $juego

     */
    public function insert_gen(string $nombre, string $juego)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO generaciones (`nombre`, `juego`) VALUES (:nombre, :juego)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'nombre' => $nombre,
                'juego' => $juego
            ]
        );

    }

        /**
     * Edita los datos de una generacion
     * @param string $nombre
     * @param string $juego
     */
    public function edit_gen($nombre, $juego)
    {

        $conexion = Conexion::getConexion();
        $query = "UPDATE generaciones SET nombre = :nombre, juego = :juego WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'nombre' => $nombre,
                'juego' => $juego
            ]
        );
    }

    /**
     * Elimina una Generacion de la base de datos
     */
    public function delete_gen()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM generaciones WHERE id = ?";

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
     * Get the value of juego
     */ 
    public function getJuego()
    {
        return $this->juego;
    }
}