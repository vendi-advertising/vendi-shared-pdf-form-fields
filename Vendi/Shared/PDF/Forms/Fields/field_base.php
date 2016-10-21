<?php

namespace Vendi\Shared\PDF\Forms\Fields;

abstract class field_base
{

    const FIELD_TYPE_STRING = 'string';

    const FIELD_TYPE_INT = 'int';

    const FIELD_TYPE_CHECKBOX = 'checkbox';

    const FIELD_TYPE_DATE = 'date';

    protected $field_name;

    protected $field_value;

    protected $field_type;

    public function set_value( $field_value )
    {
        $this->field_value = $field_value;
    }

    public function get_value( )
    {
        return $this->field_value;
    }

    public function __construct( string $field_type, string $field_name, $field_value = null )
    {
        $this->field_type = $field_type;
        $this->field_name = $field_name;
        $this->field_value = $field_value;
    }
}
