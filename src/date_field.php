<?php

namespace Vendi\Shared\PDF\Forms\Fields;

class date_field extends field_collection
{

    public function __construct( string $field_name_prefix, string $year_label, string $month_label, string $day_label, \DateTime $field_value )
    {
        $this->add_int_field( $field_name_prefix . ' ' . $year_label, (int)$field_value->format( 'Y' ) );
        $this->add_int_field( $field_name_prefix . ' ' . $day_label,  (int)$field_value->format( 'm' ) );
        $this->add_int_field( $field_name_prefix . ' ' . $day_label,  (int)$field_value->format( 'd' ) );
    }

}
