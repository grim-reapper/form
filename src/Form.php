<?php

namespace Imran\Form;

class Form
{
    /**
     * Store the custom types that have been registered
     */
    private static array $customTypes = [];

    /**
     * Generates an opening form tag with the given attributes.
     *
     * @param  array  $attributes  An associative array of attributes for the form tag.
     * @return string The HTML for the opening form tag.
     */
    public static function open(array $attributes = []): string
    {
        $attr_strings = self::attributesToString($attributes);
        return "<form $attr_strings>";
    }

    /**
     * Generates a closing form tag.
     *
     * @return string The HTML for the closing form tag.
     */
    public static function close(): string
    {
        return "</form>";
    }

    /**
     * Generates an input field of the given type with the given name, value and attributes.
     *
     * @param  string  $name  The name attribute of the input field.
     * @param  string  $type  The type of the input field (text, date, etc.).
     * @param  string|null  $value  The value attribute of the input field.
     * @param  array  $attributes  An associative array of attributes for the input tag.
     * @return string The HTML for the input field.
     */
    public static function input(
        string $name,
        string $type = 'text',
        string $value = '',
        array $attributes = []
    ): string {
        $attr_string = self::attributesToString($attributes);
        return "<input type='$type' name='$name' value='$value' $attr_string>";
    }

    /**
     * Generates a select field with the given name, value, options and attributes.
     *
     * @param  string  $name  The name attribute of the select field.
     * @param  string  $value  The selected value of the select field.
     * @param  array  $options  An associative array of options for the select field.
     * @param  array  $attributes  An associative array of attributes for the select tag.
     * @return string The HTML for the select field.
     */
    public static function select(string $name, string $value, array $options, array $attributes = []): string
    {
        $attr_string = self::attributesToString($attributes);
        $options_string = self::optionsToString($options, $value);
        return "<select name='$name' $attr_string>$options_string</select>";
    }

    /**
     * Generates a textarea field with the given name, value and attributes.
     *
     * @param  string  $name  The name attribute of the textarea field.
     * @param  string  $value  The value of the textarea field.
     * @param  array  $attributes  An associative array of attributes for the textarea tag.
     * @return string The HTML for the textarea field.
     */
    public static function textarea(string $name, string $value = '', array $attributes = []): string
    {
        $attr_string = self::attributesToString($attributes);
        return "<textarea name='$name' $attr_string>$value</textarea>";
    }

    /**
     * Generates a checkbox field with the given name, value, checked status and attributes.
     *
     * @param  string  $name  The name attribute of the checkbox field.
     * @param  string  $value  The value attribute of the checkbox field.
     * @param  bool  $is_checked  Whether the checkbox should be checked or not.
     * @param  array  $attributes  An associative array of attributes for the checkbox tag.
     * @return string The HTML for the checkbox field.
     */
    public static function checkbox(string $name, string $value, bool $is_checked, array $attributes = []): string
    {
        $attr_string = self::attributesToString($attributes);
        $checked = $is_checked ? "checked" : "";
        return "<input type='checkbox' name='$name' value='$value' $checked $attr_string>";
    }

    /**
     * Generates a radio button with the given name, value, checked status and attributes.
     *
     * @param  string  $name  The name attribute of the radio button.
     * @param  string  $value  The value attribute of the radio button.
     * @param  bool  $is_checked  Whether the radio button should be checked or not.
     * @param  array  $attributes  An associative array of attributes for the radio button tag.
     * @return string The HTML for the radio button.
     */
    public static function radio(string $name, string $value, bool $is_checked, array $attributes = []): string
    {
        $attr_string = self::attributesToString($attributes);
        $checked = $is_checked ? "checked" : "";
        return "<input type='radio' name='$name' value='$value' $checked $attr_string>";
    }

    /**
     * Generates a button with the given type, value and attributes.
     *
     * @param  string  $type  The type attribute of the button.
     * @param  string  $value  The value of the button.
     * @param  array  $attributes  An associative array of attributes for the button tag.
     * @return string The HTML for the button.
     */
    public static function button(string $type = 'submit', string $value = 'Submit', array $attributes = []): string
    {
        $attr_string = self::attributesToString($attributes);
        return "<button type='$type' $attr_string>$value</button>";
    }

    /**
     * Generates a file input field with the given name and attributes.
     *
     * @param  string  $name  The name attribute of the file input field.
     * @param  array  $attributes  An associative array of attributes for the file input tag.
     * @return string The HTML for the file input field.
     */
    public static function file(string $name, array $attributes = []): string
    {
        $attr_string = self::attributesToString($attributes);
        return "<input type='file' name='$name' $attr_string>";
    }

    /**
     * Generates a password input field with the given name and attributes.
     *
     * @param  string  $name  The name attribute of the password input field.
     * @param  array  $attributes  An associative array of attributes for the password input tag.
     * @return string The HTML for the password input field.
     */
    public static function password(string $name, array $attributes = []): string
    {
        $attr_string = self::attributesToString($attributes);
        return "<input type='password' name='$name' $attr_string>";
    }

    /**
     * Generates an email input field with the given name, value and attributes.
     *
     * @param  string  $name  The name attribute of the email input field.
     * @param  string  $value  The value attribute of the email input field.
     * @param  array  $attributes  An associative array of attributes for the email input tag.
     * @return string The HTML for the email input field.
     */
    public static function email(string $name, string $value = '', array $attributes = []): string
    {
        $attr_string = self::attributesToString($attributes);
        return "<input type='email' name='$name' value='$value' $attr_string>";
    }

    /**
     * Generates a label element with the given "for" attribute, text and attributes.
     *
     * @param  string  $for  The "for" attribute of the label.
     * @param  string  $text  The text of the label.
     * @param  array  $attributes  An associative array of attributes for the label tag.
     * @param  string  $required_html  The html content to labeled the field required
     * @param  bool  $before_text  A boolean value to add "$required_html" before or after label text
     * @return string The HTML for the label element.
     */
    public static function label(
        string $for,
        string $text = '',
        array $attributes = [],
        string $required_html = '',
        bool $before_text = true
    ): string {
        $attr_string = self::attributesToString($attributes);
        $required_content = trim($before_text ? $required_html.' '.$text : $text.' '.$required_html);
        return "<label for='$for' $attr_string>$required_content</label>";
    }

    /**
     * Registers a custom type with the given name and callback function.
     *
     * @param  string  $name  The name of the custom type.
     * @param  callable  $callback  The callback function that generates the HTML for the custom type.
     * @return void
     */
    public static function registerCustomType(string $name, callable $callback): void
    {
        self::$customTypes[$name] = $callback;
    }

    /**
     * Generates HTML for a registered custom type.
     *
     * @param  string  $name  The name of the custom type.
     * @param  array  $params  The parameters to pass to the callback function of the custom type.
     * @return string The HTML for the custom type.
     * @throws \Exception If the custom type is not registered.
     */
    public static function custom(string $name, array $params = []): string
    {
        if (!isset(self::$customTypes[$name])) {
            throw new \Exception("Custom type '$name' not registered.");
        }
        return call_user_func_array(self::$customTypes[$name], array_values($params));
    }

    /**
     * Helper method that converts an associative array of attributes to a string.
     *
     * @param  array  $attributes  An associative array of attributes.
     * @return string The attributes in string format.
     */
    public static function attributesToString(array $attributes): string
    {
        $attr_string = "";
        foreach ($attributes as $name => $value) {
            $attr_string .= "$name='$value' ";
        }
        return $attr_string;
    }

    /**
     * Helper method that converts an associative array of options to a string.
     * @param  array  $options  An associative array of options
     * @param  string  $selected_value  the selected value of the options
     * @return string The options in string format.
     */
    private static function optionsToString(array $options, string $selected_value): string
    {
        $options_string = "";
        foreach ($options as $value => $text) {
            $selected = $value == $selected_value ? "selected" : "";
            $options_string .= "<option value='$value' $selected>$text</option>";
        }
        return $options_string;
    }
}



