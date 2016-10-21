<?php

namespace Vendi\Shared\PDF\Forms\Fields;

class date_field extends field_base
{

    private $month_label;

    private $day_label;

    private $year_label;

    public function __construct( string $field_name_prefix, string $year_label, string $month_label, string $day_label, \DateTime $field_value = null )
    {
        parent::__construct(
                                field_base::FIELD_TYPE_DATE,
                                $field_name_prefix,
                                [
                                    new int_field( $field_name_prefix . ' ' . $year_label,  (int)$field_value->format( 'Y' ) ),
                                    new int_field( $field_name_prefix . ' ' . $month_label, (int)$field_value->format( 'm' ) ),
                                    new int_field( $field_name_prefix . ' ' . $day_label,   (int)$field_value->format( 'd' ) ),
                                ]
                        );

        $this->month_label = $month_label;
        $this->day_label = $day_label;
        $this->year_label = $year_label;
    }

}
