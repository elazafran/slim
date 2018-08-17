<?php
    /*
     * devuelve todas las configuraciones de slim
     */

    return [
        'debug'=>true,
        'templates.path'=>'app/templates',
        'cookies.encrypt'=>true,
        'cookies.secret_key'=>md5('asdf123')

    ];
?>