<?php

class Imagen
{
    /**
     * Carga la imagen desde el archivo temp
     * @param string $directorio
     * @param string $datosArchivo
     */
    public function uploadIMG($directorio, $datosArchivo) : string 
    {
        $og_name = (explode(".", $datosArchivo['name']));
        $extension = end($og_name);
        $filename = time() . ".$extension";

        $fileUpload = move_uploaded_file($datosArchivo['tmp_name'], "$directorio/$filename");

        if (!$fileUpload) {
            throw new Exception("No se pudo subir la imagen");
        } else {
            return $filename;
        }
    }

    /**
     * borra la imagen guardada en caso de reemplazarla
     * @param string $archivo
     */
    public function delIMG($archivo): bool
    {

        if (file_exists(($archivo))) {

            $fileDelete =  unlink($archivo);

            if (!$fileDelete) {
                throw new Exception("No se pudo eliminar la imagen");
            } else {
                return TRUE;
            }
        }else{
            return FALSE;
        }
    }
}