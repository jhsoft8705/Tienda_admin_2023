<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'El atributo debe ser aceptado.',
    'active_url'           => 'El atributo no es una URL válida.',
    'after'                => 'El atributo debe ser una fecha posterior a la fecha.',
    'after_or_equal'       => 'El atributo debe ser una fecha posterior o igual a la fecha.',
    'alpha'                => 'El atributo solo puede contener letras.',
    'alpha_dash'           => 'El atributo solo puede contener letras, números y guiones.',
    'alpha_num'            => 'El atributo solo puede contener letras y números.',
    'array'                => 'El atributo debe ser una matriz.',
    'before'               => 'El atributo debe ser una fecha anterior a la fecha.',
    'before_or_equal'      => 'El atributo debe ser una fecha anterior o igual a la fecha.',
    'between'              => [
        'numeric' => 'El atributo debe estar entre mínimo y máximo.',
        'file'    => 'El atributo debe estar entre el mínimo y el máximo de kilobytes.',
        'string'  => 'El atributo debe tener entre caracteres mínimos y máximos.',
        'array'   => 'El atributo debe tener entre elementos mínimos y máximos.',
    ],
    'boolean'              => 'El campo de atributo debe ser verdadero o falso.',
    'confirmed'            => 'La confirmación del atributo no coincide.',
    'date'                 => 'El atributo no es una fecha válida.',
    'date_format'          => 'El atributo no coincide con el formato de formato.',
    'different'            => 'El atributo y otros deben ser diferentes.',
    'digits'               => 'El atributo debe ser dígitos dígitos.',
    'digits_between'       => 'El atributo debe estar entre los dígitos mínimo y máximo.',
    'dimensions'           => 'El atributo tiene dimensiones de imagen no válidas.',
    'distinct'             => 'El campo de atributo tiene un valor duplicado.',
    'email'                => 'El atributo debe ser una dirección de correo electrónico válida.',
    'exists'               => 'El atributo ingresado ya existe.',
    'file'                 => 'El atributo debe ser un archivo.',
    'filled'               => 'El campo de atributo debe tener un valor.',
    'image'                => 'El atributo debe ser una imagen.',
    'in'                   => 'El atributo seleccionado no es válido.',
    'in_array'             => 'El campo de atributo no existe en otros.',
    'integer'              => 'El atributo debe ser un número entero.',
    'ip'                   => 'El atributo debe ser una dirección IP válida.',
    'ipv4'                 => 'El atributo debe ser una dirección IPv4 válida.',
    'ipv6'                 => 'El atributo debe ser una dirección IPv6 válida.',
    'json'                 => 'El atributo debe ser una cadena JSON válida.',
    'max'                  => [
        'numeric' => 'El atributo no puede ser mayor que el máximo',
        'file'    => 'El atributo no puede superar el máximo de kilobytes.',
        'string'  => 'El atributo no puede tener más de un máximo de caracteres.',
        'array'   => 'El atributo no puede tener más del máximo de items.',
    ],
    'mimes'                => 'El atributo debe ser un archivo de valores de tipo.',
    'mimetypes'            => 'El atributo debe ser un archivo de valores de tipo.',
    'min'                  => [
        'numeric' => 'El atributo debe ser mínimo como mínimo.',
        'file'    => 'El atributo debe tener al menos un mínimo de kilobytes.',
        'string'  => 'El atributo debe tener al menos un mínimo de caracteres.',
        'array'   => 'El atributo debe tener al menos elementos mínimos.',
    ],
    'not_in'               => 'El atributo seleccionado no es válido.',
    'numeric'              => 'El atributo debe ser un número.',
    'present'              => 'El campo de atributo debe estar presente.',
    'regex'                => 'El formato de atributo no es válido.',
    'required'             => 'El campo de atributo es obligatorio.',
    'required_if'          => 'El campo de atributo es obligatorio cuando otro es valor.',
    'required_unless'      => 'El campo de atributo es obligatorio a menos que haya otro en los valores.',
    'required_with'        => 'El campo de atributo es obligatorio cuando hay valores.',
    'required_with_all'    => 'El campo de atributo es obligatorio cuando hay valores.',
    'required_without'     => 'El campo de atributo es obligatorio cuando no hay valores.',
    'required_without_all' => 'El campo de atributo es obligatorio cuando no hay ningún valor presente.',
    'same'                 => 'El atributo y otros deben coincidir.',
    'size'                 => [
        'numeric' => 'El atributo debe ser tamaño.',
        'file'    => 'El atributo debe tener un tamaño de kilobytes.',
        'string'  => 'El atributo debe tener caracteres de tamaño.',
        'array'   => 'El atributo debe contener artículos de tamaño.',
    ],
    'string'               => 'El atributo debe ser una cadena.',
    'timezone'             => 'El atributo debe ser una zona válida.',
    'unique'               => 'El atributo ya se ha tomado.',
    'uploaded'             => 'El atributo no se pudo cargar.',
    'url'                  => 'El formato de atributo no es válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
