<?php

namespace Vendi\Shared\PDF\Forms\Fields;

class checkbox_field extends field_base
{
    public $checked_export_value;

    public function __construct( string $field_name, string $checked_export_value, bool $field_value = null )
    {
        parent::__construct( field_base::FIELD_TYPE_CHECKBOX, $field_name, $field_value );
        $this->checked_export_value = $checked_export_value;
    }
}
