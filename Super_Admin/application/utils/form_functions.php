<?php
/**
 * @create a dropdown select
 *
 * @param string $name
 * @param array  $options
 * @param array  $attributes
 * @param string $selected   (optional)
 *
 * @return string
 */
function dropdown($name, $selected = null, array $options, array $attributes = null)
{
    /*** begin the select ***/
    $dropdown = '<select name="'.$name.'"';
    /*** loop over the attributes ***/
    if(!is_null($attributes)){
        foreach ($attributes as $key => $attribute) {
            $dropdown .=  $key.'="'.$attribute.'" ';
        }
    }
    $dropdown .= ' >\n';

    $selected = $selected;
    /*** loop over the options ***/
    foreach ($options as $key => $option) {
        /*** assign a selected value ***/
        if(is_array($selected))
            $select =  in_array($key, $selected) ? ' selected' : null;
        else
            $select = $selected == $key ? ' selected' : null;

        /*** add each option to the dropdown ***/
        $dropdown .= '<option value="'.$key.'"'.$select.'>'.$option.'</option>'."\n";
    }

    /*** close the select ***/
    $dropdown .= '</select>'."\n";

    /*** and return the completed dropdown ***/
    return $dropdown;
}
