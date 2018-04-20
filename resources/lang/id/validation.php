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

    'accepted'             => ':attribute harus disetujui',
    'active_url'           => ':attribute bukan URL yang valid',
    'after'                => ':attribute harus tanggal setelah :date',
    'alpha'                => ':attribute hanya dapat mengandung huruf',
    'alpha_dash'           => ':attribute hanya dapat mengandung huruf, angka, dan tanda hubung',
    'alpha_num'            => ':attribute hanya dapat mengandung huruf dan angka',
    'array'                => ':attribute harus array',
    'before'               => ':attribute harus tanggal sebelum :date',
    'between'              => [
        'numeric' => ':attribute harus antara :min dan :max',
        'file'    => ':attribute harus antara :min dan :max kilobyte',
        'string'  => ':attribute harus antara :min dan :max karakter',
        'array'   => ':attribute harus memiliki antara :min dan :max item',
    ],
    'boolean'              => ':attribute harus bernilai true atau false',
    'confirmed'            => 'Konfirmasi :attribute tidak cocok',
    'date'                 => ':attribute bukan tanggal yang valid',
    'date_format'          => ':attribute tidak sesuai format :format',
    'different'            => ':attribute dan :other harus berbeda',
    'digits'               => ':attribute harus :digits digit',
    'digits_between'       => ':attribute harus antara :min dan :max digit',
    'email'                => ':attribute harus alamat email yang valid',
    'exists'               => ':attribute yang dipilih tidak valid',
    'filled'               => ':attribute diperlukan',
    'image'                => ':attribute harus sebuah gambar',
    'in'                   => ':attribute yang dipilih tidak valid',
    'integer'              => ':attribute harus integer',
    'ip'                   => ':attribute harus sebuah IP Address yang valid',
    'json'                 => ':attribute harus JSON string yang valid',
    'max'                  => [
        'numeric' => ':attribute mungkin tidak lebih besar dari :max',
        'file'    => ':attribute mungkin tidak lebih besar dari :max kilobyte',
        'string'  => ':attribute mungkin tidak lebih banyak dari :max karakter',
        'array'   => ':attribute mungkin tidak memiliki lebih dari :max item',
    ],
    'mimes'                => ':attribute harus file dengan tipe: :values',
    'min'                  => [
        'numeric' => ':attribute harus minimal :min',
        'file'    => ':attribute harus minimal :min kilobyte',
        'string'  => ':attribute harus minimal :min karakter',
        'array'   => ':attribute harus memiliki minimal :min item',
    ],
    'not_in'               => ':attribute yang dipilih tidak valid',
    'numeric'              => ':attribute harus berupa angka',
    'regex'                => 'Format :attribute tidak valid',
    'required'             => ':attribute diperlukan',
    'required_if'          => ':attribute diperlukan bila :other adalah :value',
    'required_unless'      => ':attribute diperlukan kecuali :other dalam :values',
    'required_with'        => ':attribute diperlukan bila terdapat nilai :values',
    'required_with_all'    => ':attribute diperlukan bila terdapat nilai :values',
    'required_without'     => ':attribute diperlukan bila tidak terdapat nilai :values',
    'required_without_all' => ':attribute diperlukan bila tak satupun terdapat nilai :values',
    'same'                 => ':attribute dan :other harus sama',
    'size'                 => [
        'numeric' => ':attribute harus :size',
        'file'    => ':attribute harus :size kilobyte',
        'string'  => ':attribute harus :size karakter',
        'array'   => ':attribute harus berisi :size item',
    ],
    'string'               => ':attribute harus string',
    'timezone'             => ':attribute harus zona yang valid',
    'unique'               => ':attribute sudah digunakan',
    'url'                  => 'Format :attribute tidak valid',

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
