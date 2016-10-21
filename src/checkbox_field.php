<?php

namespace Vendi\Shared\PDF\Forms\Fields;

class checkbox_field extends field_base
{
    public function __construct( string $field_name, string $field_value = null )
    {
        parent::__construct( field_base::FIELD_TYPE_CHECKBOX, $field_name, $field_value );
    }
}
