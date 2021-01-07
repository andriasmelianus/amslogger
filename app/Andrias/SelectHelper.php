<?php

namespace App\Andrias;

/**
 * A helper class when working with HTML select element.
 */
class SelectHelper
{
    /**
     * Constructor.
     * 
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Return 'selected' attribute for initial value.
     * 
     * @param mixed $value
     * @param mixed $oldValue
     * @param mixed $existingValue
     * @return string
     */
    public static function selected($value, $oldValue, $existingValue = '')
    {
        if ($oldValue != '' || $oldValue != null) {
            if ($value == $oldValue) {
                return 'selected';
            } else {
                return '';
            }
        } else {
            if ($value == $existingValue) {
                return 'selected';
            } else {
                return '';
            }
        }
    }

    /**
     * Shorthand when selecting initial value for select element.
     * 
     * @param mixed $oldValue
     * @param mixed $existingValue
     * @return string
     */
    public static function initValue($oldValue, $existingValue = '')
    {
        if ($oldValue == '' || $oldValue == null) {
            return $existingValue;
        } else {
            return $oldValue;
        }
    }
}
