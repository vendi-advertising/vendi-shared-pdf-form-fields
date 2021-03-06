<?php

namespace Vendi\Shared\PDF\Forms\Fields;

class field_collection implements \IteratorAggregate
{
    public $fields = [];

    public function getIterator()
    {
        return new \ArrayIterator( $this->fields );
    }

    protected function add_field( string $field_name, field_base $field ) : field_collection
    {
        if( array_key_exists( $field_name, $this->fields ) )
        {
            throw new \Exception( sprintf( 'Field [%1$s] alread exists in collection', $field_name ) );
        }

        $this->fields[ $field_name ] = $field;

        return $this;
    }

    public function has_key( string $field_name ) : bool
    {
        return array_key_exists( $field_name, $this->fields );
    }

    public function add_int_field( string $field_name, int $field_value = null ) : field_collection
    {
        return $this->add_field( $field_name, new int_field( $field_name, $field_value ) );
    }

    public function add_string_field( string $field_name, string $field_value = null ) : field_collection
    {
        return $this->add_field( $field_name, new string_field( $field_name, $field_value ) );
    }

    public function add_date_field( string $field_name_prefix, string $year_label, string $month_label, string $day_label, \DateTime $field_value = null ) : field_collection
    {
        return $this->add_field( $field_name_prefix, new date_field( $field_name_prefix, $year_label, $month_label, $day_label, $field_value ) );
    }

    public function add_checkbox_field( string $field_name, string $field_value = null ) : field_collection
    {
        return $this->add_field( $field_name, new checkbox_field( $field_name, $field_value ) );
    }

    public function add_if_false_yes_checkbox_field( string $field_name, $field_value = null ) : field_collection
    {
        if( null === $field_value )
        {
            $field_value = true;
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
            throw new \Exception( 'Invalid value supplied to add_if_false_yes_checkbox_field()' );
        }
        return $this->add_field( $field_name, new checkbox_field( $field_name, $field_value ? 'No' : 'Yes' ) );
    }

    public function add_if_true_yes_checkbox_field( string $field_name, $field_value = null ) : field_collection
    {
        if( null === $field_value )
        {
            $field_value = false;
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
            throw new \Exception( 'Invalid value supplied to add_if_true_yes_checkbox_field()' );
        }

        return $this->add_field( $field_name, new checkbox_field( $field_name, $field_value ? 'Yes' : 'No' ) );
    }
}
