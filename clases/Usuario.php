<?php
class Usuario {
    private $id;
    private $email;
    private $nombre_usuario;
    private $nombre_completo;
    private $pass;
    private $roll;
    

    /**
     * busca un usuario segun su username
     * @param string $username  nombre de usuario
     */
    public function userData(string $username): ?Usuario
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM usuario WHERE nombre_usuario = ?";

        $PDOST = $conexion->prepare($query);
        $PDOST->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOST->execute([$username]);

        $result = $PDOST->fetch();

        if (!$result) {
            return null;
        }
        return $result;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of nombre_usuario
     */ 
    public function getNombre_usuario()
    {
        return $this->nombre_usuario;
    }

    /**
     * Get the value of nombre_completo
     */ 
    public function getNombre_completo()
    {
        return $this->nombre_completo;
    }

    /**
     * Get the value of pass
     */ 
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Get the value of roll
     */ 
    public function getRoll()
    {
        return $this->roll;
    }
}