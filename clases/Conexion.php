<?php
/**
 * Clase para generar la conexion de PDO
 */
class Conexion
{
    private const DB_SERVER = "localhost";
    private const DB_USER = "root";
    private const DB_PASS = "";
    private const DB_NAME = "pokedex_bd";
    const DB_DSN = "mysql:host=" . self::DB_SERVER . ";dbname=" . self::DB_NAME . ";charset=utf8mb4";

    private static ?PDO $db = null;

    public static function conectado()

    {
        try {
            self::$db = new PDO(self::DB_DSN,self::DB_USER,self::DB_PASS);
        } catch (Exception $e) {
            die('Error al conectar a la base de datos');
        }
        
    }

    /**
     * Metodo para devolver una conexion PDO
     * @return PDO
     */
    public static function getConexion() : PDO {
        if (self::$db===null) {
            self::conectado();
        }
        return self::$db;
    }
}

?>