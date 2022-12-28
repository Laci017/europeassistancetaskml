<?php

function simpleFormInput($name, $form_text, $model = null)
{
    return '<div class="form-group col-md-8">
                        <div class="form_item">
                        <label for="' . $name . '">' . $form_text . ':</label>
                        <input type="text" name="' . $name . '" id="' . $name . '" class="form-control form-control-lg"
                               value="' . old($name, $model) . '">
                        </div>
                     </div>';
}

function html_select(
    $name,
    $options,
    $selected,
    $errors,
    $form_text,
    $multiple = false,
    $class = 'form-control',
    $id = null,
    $style = null
)
{
    if ($errors->has($name)) {
        $class .= ($class ? ' ' : '') . 'is-invalid';
    }

    $class = $class ? ' class="' . $class . '"' : '';
    $style = $class ? ' style="' . $style . '"' : '';
    $multiple = $multiple ? ' multiple' : '';
    $_multiple = $multiple ? '[]' : '';

    $html = '<div class="form-group col-md-8">
                        <div class="form_item">
                        <label for="' . $name . '">' . $form_text . ':</label>
    <select name="' . $name . $_multiple . '" id="' . (empty($id) ? $name : $id) . '"' . $multiple . $class . $style . '>';
    foreach ($options as $option) {
        if (!$multiple) {
            $_selected = ($option['id'] == old($name)) || ($option['id'] == request($name)) || $option['id'] == $selected ? ' selected' : '';
        } else {
            $_selected = ((!is_null(old($name)) && in_array($option['id'], old($name))) || (!is_null($selected) && is_null(old($name)) && in_array($option['id'], $selected))) ? ' selected' : '';
        }
        $html .= '<option value="' . $option['id'] . '" ' . $_selected . '>' . $option['name'] . '</option>';
    }
    $html .= '</select></div></div>';
    return $html;
}



