<?php

class Autentificacion
{

    /**
     * verifica si los datos del usuario son correctos
     * @param string $username nombre de usuario
     * @param string $pass contraseña
     * @return bool 
     */
    public function log_in(string $usuario, string $pass): ?bool
    {
        $datosUsuario = (new Usuario())->userData($usuario);
        if ($datosUsuario) {
            if (password_verify($pass, $datosUsuario->getPass())) {

                $datosLogin['username'] = $datosUsuario->getNombre_usuario();
                $datosLogin['nombre_completo'] = $datosUsuario->getNombre_completo();
                $datosLogin['id'] = $datosUsuario->getId();
                $datosLogin['rol'] = $datosUsuario->getRoll();
                $_SESSION['loggedIn'] = $datosLogin;
            (new Alerta())->add_alerta('warning', "Logeado con exito.");

                return $datosLogin['rol'];
            } else {
                (new Alerta())->add_alerta('danger', "La contraseña ingresada no es correcta.");
                return FALSE;
            }
        } else {
            (new Alerta())->add_alerta('danger', "El usuario ingresado no esta registrado en nuestra base de datos.");
            return NULL;
        }
    }


    /**
     * Funcion para cerrar la sesion
     */
    public function log_out()
    {

        if (isset($_SESSION['loggedIn'])) {
            unset($_SESSION['loggedIn']);
        };
    }

    /**
     * verifica si el usuario esta logeado y su roll    
     */

    public function verify(): bool
    {

        if (isset($_SESSION['loggedIn'])) {
                return TRUE;
        } else {
            header('location: index.php?sec=login');
        }
    }
}
