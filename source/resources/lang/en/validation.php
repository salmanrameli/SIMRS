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

    'accepted'             => 'Isian :attribute harus diterima.',
    'active_url'           => 'Isian :attribute bukan URL yang sah.',
    'after'                => 'Isian :attribute harus tanggal setelah :date.',
    'alpha'                => 'Isian :attribute hanya boleh berisi huruf.',
    'alpha_dash'           => 'Isian :attribute hanya boleh berisi huruf, angka, dan strip.',
    'alpha_num'            => 'Isian :attribute hanya boleh berisi huruf dan angka.',
    'array'                => 'Isian :attribute harus berupa sebuah array.',
    'before'               => 'Isian :attribute harus tanggal sebelum :date.',
    'between'              => [
        'numeric' => 'Isian :attribute harus antara :min dan :max.',
        'file'    => 'Isian :attribute harus antara :min dan :max kilobytes.',
        'string'  => 'Isian :attribute harus antara :min dan :max karakter.',
        'array'   => 'Isian :attribute harus antara :min dan :max item.',
    ],
    'boolean'              => 'Isian :attribute harus berupa true atau false',
    'confirmed'            => 'Konfirmasi :attribute tidak cocok.',
    'date'                 => 'Isian :attribute bukan tanggal yang valid.',
    'date_format'          => 'Isian :attribute tidak cocok dengan format :format.',
    'different'            => 'Isian :attribute dan :other harus berbeda.',
    'digits'               => 'Isian :attribute harus berupa angka :digits.',
    'digits_between'       => 'Isian :attribute harus antara angka :min dan :max.',
    'dimensions'           => 'Isian :attribute harus merupakan dimensi gambar yang sah.',
    'distinct'             => 'Isian :attribute memiliki nilai yang duplikat.',
    'email'                => 'Isian :attribute harus berupa alamat surel yang valid.',
    'exists'               => 'Isian :attribute yang dipilih tidak valid.',
    'filled'               => 'Isian :attribute wajib diisi.',
    'image'                => 'Isian :attribute harus berupa gambar.',
    'in'                   => 'Isian :attribute yang dipilih tidak valid.',
    'in_array'             => 'Isian :attribute tidak terdapat dalam :other.',
    'integer'              => 'Isian :attribute harus merupakan bilangan bulat.',
    'ip'                   => 'Isian :attribute harus berupa alamat IP yang valid.',
    'json'                 => 'Isian :attribute harus berupa JSON string yang valid.',
    'max'                  => [
        'numeric' => 'Isian :attribute seharusnya tidak lebih dari :max.',
        'file'    => 'Isian :attribute seharusnya tidak lebih dari :max kilobytes.',
        'string'  => 'Isian :attribute seharusnya tidak lebih dari :max karakter.',
        'array'   => 'Isian :attribute seharusnya tidak lebih dari :max item.',
    ],
    'mimes'                => 'Isian :attribute harus dokumen berjenis : :values.',
    'min'                  => [
        'numeric' => 'Isian :attribute harus minimal :min.',
        'file'    => 'Isian :attribute harus minimal :min kilobytes.',
        'string'  => 'Isian :attribute harus minimal :min karakter.',
        'array'   => 'Isian :attribute harus minimal :min item.',
    ],
    'not_in'               => 'Isian :attribute yang dipilih tidak valid.',
    'numeric'              => 'Isian :attribute harus berupa angka.',
    'present'              => 'Isian :attribute wajib ada.',
    'regex'                => 'Format isian :attribute tidak valid.',
    'required'             => 'Isian :attribute wajib diisi.',
    'required_if'          => 'Isian :attribute wajib diisi bila :other adalah :value.',
    'required_unless'      => 'Isian :attribute wajib diisi kecuali :other memiliki nilai :values.',
    'required_with'        => 'Isian :attribute wajib diisi bila terdapat :values.',
    'required_with_all'    => 'Isian :attribute wajib diisi bila terdapat :values.',
    'required_without'     => 'Isian :attribute wajib diisi bila tidak terdapat :values.',
    'required_without_all' => 'Isian :attribute wajib diisi bila tidak terdapat ada :values.',
    'same'                 => 'Isian :attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => 'Isian :attribute harus berukuran :size.',
        'file'    => 'Isian :attribute harus berukuran :size kilobyte.',
        'string'  => 'Isian :attribute harus berukuran :size karakter.',
        'array'   => 'Isian :attribute harus mengandung :size item.',
    ],
    'string'               => 'Isian :attribute harus berupa string.',
    'timezone'             => 'Isian :attribute harus berupa zona waktu yang valid.',
    'unique'               => 'Isian :attribute sudah ada sebelumnya.',
    'url'                  => 'Format isian :attribute tidak valid.',

//    'accepted'             => 'The :attribute must be accepted.',
//    'active_url'           => 'The :attribute is not a valid URL.',
//    'after'                => 'The :attribute must be a date after :date.',
//    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
//    'alpha'                => 'The :attribute may only contain letters.',
//    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
//    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
//    'array'                => 'The :attribute must be an array.',
//    'before'               => 'The :attribute must be a date before :date.',
//    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
//    'between'              => [
//        'numeric' => 'The :attribute must be between :min and :max.',
//        'file'    => 'The :attribute must be between :min and :max kilobytes.',
//        'string'  => 'The :attribute must be between :min and :max characters.',
//        'array'   => 'The :attribute must have between :min and :max items.',
//    ],
//    'boolean'              => 'The :attribute field must be true or false.',
//    'confirmed'            => 'The :attribute confirmation does not match.',
//    'date'                 => 'The :attribute is not a valid date.',
//    'date_format'          => 'The :attribute does not match the format :format.',
//    'different'            => 'The :attribute and :other must be different.',
//    'digits'               => 'The :attribute must be :digits digits.',
//    'digits_between'       => 'The :attribute must be between :min and :max digits.',
//    'dimensions'           => 'The :attribute has invalid image dimensions.',
//    'distinct'             => 'The :attribute field has a duplicate value.',
//    'email'                => 'The :attribute must be a valid email address.',
//    'exists'               => 'The selected :attribute is invalid.',
//    'file'                 => 'The :attribute must be a file.',
//    'filled'               => 'The :attribute field must have a value.',
//    'image'                => 'The :attribute must be an image.',
//    'in'                   => 'The selected :attribute is invalid.',
//    'in_array'             => 'The :attribute field does not exist in :other.',
//    'integer'              => 'The :attribute must be an integer.',
//    'ip'                   => 'The :attribute must be a valid IP address.',
//    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
//    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
//    'json'                 => 'The :attribute must be a valid JSON string.',
//    'max'                  => [
//        'numeric' => 'The :attribute may not be greater than :max.',
//        'file'    => 'The :attribute may not be greater than :max kilobytes.',
//        'string'  => 'The :attribute may not be greater than :max characters.',
//        'array'   => 'The :attribute may not have more than :max items.',
//    ],
//    'mimes'                => 'The :attribute must be a file of type: :values.',
//    'mimetypes'            => 'The :attribute must be a file of type: :values.',
//    'min'                  => [
//        'numeric' => 'The :attribute must be at least :min.',
//        'file'    => 'The :attribute must be at least :min kilobytes.',
//        'string'  => 'The :attribute must be at least :min characters.',
//        'array'   => 'The :attribute must have at least :min items.',
//    ],
//    'not_in'               => 'The selected :attribute is invalid.',
//    'numeric'              => 'The :attribute must be a number.',
//    'present'              => 'The :attribute field must be present.',
//    'regex'                => 'The :attribute format is invalid.',
//    'required'             => 'The :attribute field is required.',
//    'required_if'          => 'The :attribute field is required when :other is :value.',
//    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
//    'required_with'        => 'The :attribute field is required when :values is present.',
//    'required_with_all'    => 'The :attribute field is required when :values is present.',
//    'required_without'     => 'The :attribute field is required when :values is not present.',
//    'required_without_all' => 'The :attribute field is required when none of :values are present.',
//    'same'                 => 'The :attribute and :other must match.',
//    'size'                 => [
//        'numeric' => 'The :attribute must be :size.',
//        'file'    => 'The :attribute must be :size kilobytes.',
//        'string'  => 'The :attribute must be :size characters.',
//        'array'   => 'The :attribute must contain :size items.',
//    ],
//    'string'               => 'The :attribute must be a string.',
//    'timezone'             => 'The :attribute must be a valid zone.',
//    'unique'               => 'The :attribute has already been taken.',
//    'uploaded'             => 'The :attribute failed to upload.',
//    'url'                  => 'The :attribute format is invalid.',

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
