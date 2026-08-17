<?php

class ImagenHelper
{
    public static function subir(
        array $archivo,
        string $carpeta,
        ?string $imagenAnterior = null
    ): ?string {

        /*
         * Si no se seleccionó ninguna imagen,
         * conservamos la anterior al editar,
         * o NULL al crear.
         */
        if (
            !isset($archivo["error"]) ||
            $archivo["error"] === UPLOAD_ERR_NO_FILE
        ) {
            return $imagenAnterior;
        }


        if ($archivo["error"] !== UPLOAD_ERR_OK) {

            throw new Exception(
                "Ocurrió un error al subir la imagen."
            );
        }


        /*
         * Máximo 5 MB
         */
        $maximo = 5 * 1024 * 1024;

        if ($archivo["size"] > $maximo) {

            throw new Exception(
                "La imagen no puede superar los 5 MB."
            );
        }


        /*
         * Validamos el tipo real del archivo.
         */
        $finfo = new finfo(FILEINFO_MIME_TYPE);

        $mime = $finfo->file(
            $archivo["tmp_name"]
        );


        $tiposPermitidos = [

            "image/jpeg" => "jpg",

            "image/png" => "png",

            "image/webp" => "webp"

        ];


        if (!isset($tiposPermitidos[$mime])) {

            throw new Exception(
                "Solo se permiten imágenes JPG, PNG o WEBP."
            );
        }


        $extension =
            $tiposPermitidos[$mime];


        /*
         * Generamos nombre único.
         */
        $nombreArchivo =
            uniqid("img_", true)
            . "."
            . $extension;


        /*
         * Carpeta física.
         */
        $rutaCarpeta =
            __DIR__
            . "/../../public/uploads/"
            . $carpeta;


        if (!is_dir($rutaCarpeta)) {

            if (
                !mkdir(
                    $rutaCarpeta,
                    0755,
                    true
                )
            ) {

                throw new Exception(
                    "No fue posible crear la carpeta de imágenes."
                );
            }
        }


        $rutaDestino =
            $rutaCarpeta
            . "/"
            . $nombreArchivo;


        if (
            !move_uploaded_file(
                $archivo["tmp_name"],
                $rutaDestino
            )
        ) {

            throw new Exception(
                "No fue posible guardar la imagen."
            );
        }


        /*
         * Si se reemplazó una imagen,
         * eliminamos la anterior.
         */
        if (!empty($imagenAnterior)) {

            $rutaAnterior =
                __DIR__
                . "/../../public/"
                . $imagenAnterior;


            if (
                file_exists($rutaAnterior) &&
                is_file($rutaAnterior)
            ) {

                unlink($rutaAnterior);
            }
        }


        /*
         * Esta es la ruta que guardamos
         * en MySQL.
         */
        return
            "uploads/"
            . $carpeta
            . "/"
            . $nombreArchivo;
    }
}