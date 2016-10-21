<?php

namespace Vendi\Shared\PDF\Forms\Fields;

class field_collection
{
    public $fields = [];

    private function add_field( string $field_name, field_base $field )
    {
        if( array_key_exists( $field_name, $this->fields ) )
        {
            throw new \Exception( sprintf( 'Field [%1$s] alread exists in collection', $field_name ) );
        }

        $this->fields[ $field_name ] = $field;

        return $this;
    }

    public function add_string_field( string $field_name, string $field_value = null )
    {
        return $this->add_field( $field_name, new string_field( $field_name, $primary_applicant->first_name ) );
    }

    public function add_date_field( string $field_name_prefix, string $year_label, string $month_label, string $day_label, \DateTime $field_value = null )
    {
        return $this->add_field( $field_name_prefix, new date_field( $field_name_prefix, $year_label, $month_label, $day_label, $field_value ) );
    }

    public function add_checkbox_field( string $field_name, string $checked_export_value, bool $field_value = null )
    {
        return $this->add_field( $field_name, new checkbox_field( $field_name, $checked_export_value, $field_value ) );
    }

    public function add_if_false_yes_checkbox_field( string $field_name, $field_value = null )
    {
        if( null === $field_value )
        {
            //NOOP
        }
        elseif( is_bool( $field_value ) )
        {
            //NOOP
        }
        elseif( is_string( $field_value ) )
        {
            $field_value = 'no' === trim( strtolower( $field_value ) );
        }
        else
        {
            throw new \Exception( 'Invalid value supplied to add_yes_checkbox_field()' );
        }
        return $this->add_field( $field_name, new checkbox_field( $field_name, 'Yes', $field_value ) );
    }

    public function add_if_true_yes_checkbox_field( string $field_name, $field_value = null )
    {
        if( null === $field_value )
        {
            //NOOP
        }
        elseif( is_bool( $field_value ) )
        {
            //NOOP
        }
        elseif( is_string( $field_value ) )
        {
            $field_value = 'yes' === trim( strtolower( $field_value ) );
        }
        else
        {
            throw new \Exception( 'Invalid value supplied to add_yes_checkbox_field()' );
        }

        return $this->add_field( $field_name, new checkbox_field( $field_name, 'Yes', $field_value ) );
    }
}
