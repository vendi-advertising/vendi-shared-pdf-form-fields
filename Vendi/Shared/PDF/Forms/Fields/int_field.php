<?php

namespace Vendi\Shared\PDF\Forms\Fields;

class int_field extends field_base
{
    public function __construct( string $field_name, int $field_value = null )
    {
        parent::__construct( field_base::FIELD_TYPE_INT, $field_name, $field_value );
    }
}
