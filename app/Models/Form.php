<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'fields' => 'array',
    ];
    const FIELD_TYPE_TEXT = 'text';
    const FIELD_TYPE_TEXTAREA = 'textarea';
    const FIELD_TYPE_FILE = 'file';
    const FIELD_TYPE_NUMBER = 'number';

    const FIELD_TYPE_ARRAY = [self::FIELD_TYPE_TEXT, self::FIELD_TYPE_TEXTAREA, self::FIELD_TYPE_FILE, self::FIELD_TYPE_NUMBER];

    const VISITOR_FORM_FIELDS = [
        [
            'display_name' => 'What is your height?',
            'name' => 'height',
            'type' => self::FIELD_TYPE_NUMBER,
            'validation' => 'required',
        ],
        [
            'display_name' => 'What is your weight?',
            'name' => 'weight',
            'type' => self::FIELD_TYPE_NUMBER,
            'validation' => 'required',
        ],
        [
            'display_name' => 'Choose an attachment',
            'name' => 'attachment',
            'type' => self::FIELD_TYPE_FILE,
            'validation' => 'required',
        ],
        [
            'display_name' => 'Note',
            'name' => 'note',
            'type' => self::FIELD_TYPE_TEXTAREA,
            'validation' => 'required',
        ]
    ];


    public function formable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }


}
