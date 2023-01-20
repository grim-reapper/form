# Form Class

The Form class is a utility class that provides a simple and consistent way to generate various types of HTML form
fields.

## Installation

You can [Download](https://github.com/grim-reapper/form/archive/refs/heads/main.zip) the class file and include it in
your project.

or you can install by using composer, this is recommended way.

```php
composer require imran/form
```

## Usage

### Opening and closing a form

To create an opening form tag with attributes, use the **`open()`**  method:

```php
echo Form::open(['action' => '/submit', 'method' => 'post']);
```

To create a closing form tag, use the `close()` method:

```php
echo Form::close();
```

### Input fields

To create an input field of any type, use the `input()` method:

```php
echo Form::input('text', 'first_name', 'John');
echo Form::input('date', 'birthday', '1990-01-01');
```

To create a textarea field, use the `textarea()` method:

```php
echo Form::textarea('message', 'Hello, World!');
```

To create a checkbox field, use the `checkbox()` method:

```php
echo Form::checkbox('agreement', 1, true);
```

To create a radio button, use the `radio()` method:

```php
echo Form::radio('payment', 'credit', true);
```

To create a file input field, use the `file()` method:

```php
echo Form::file('resume');
```

To create a password input field, use the `password()` method:

```php
echo Form::password('password');
```

To create an email input field, use the `email()` method:

```php
echo Form::email('email', 'example@example.com');
```

To create a label element, use the `label()` method:

```php
echo Form::label('email', 'Email');
```

### Registering Custom Types

You can register custom types by using the registerCustomType() method and passing in a name for the custom type and a
callback function that will generate the HTML for that custom type.

```php
Form::registerCustomType('custom_input', function($type, $name, $value, $attributes = []) {
    $attr_string = Form::attributesToString($attributes);
    return "<input type='$type' name='$name' value='$value' $attr_string>";
});
```

You can then use the registered custom type by using the `custom()` method and passing in the name of the custom type
and an array of parameters to be passed to the callback function

```php
echo Form::custom('custom_input', ['text', 'first_name', 'John']);
```

### Running Tests

To run tests, use following command

```shell
.\vendor\bin\phpunit tests/FormTest.php
```

### Conclusion

The Form class provides a simple and consistent way to generate various types of HTML form fields, making it easy to
create forms in your PHP projects. You can also register your custom types to the class, giving you more flexibility and
control over your forms. With the `open()` and `close()` methods, you can easily create the basic structure of a form,
and with the various other methods, you can add different types of input fields, labels, and buttons to your form. The
class also allows you to pass in attributes for each field, giving you more control over the appearance and behavior of
your form fields. Overall, the Form class is a useful tool for creating and managing forms in your PHP projects.

### Hi, I'm Imran Ali! 👋

### 🚀 About Me

Senior **Full-Stack** Developer specializing in front end and back-end development. Experienced with all stages of
the development cycle for dynamic web projects. Innovative, creative and a proven team player, I possess
a Tech Degree in Front End Development and have 7 years building developing and managing websites,
applications and programs for various companies. I seek to secure the position of Senior Full
Stack Developer where i can share my skills, expertise and experience with valuable clients.

### 🛠 Skills

PHP OOP,
Laravel,
Codeigniter
Javascript,
Node,
React,
Vue,
Git,
HTML,
Rest Api,
Typescript,
Angular,
SCSS,
Docker,
CI/CD Jenkins,
Bootstrap,
Responsive Design,
ASP.NET Core

### 🔗 Follow on

[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/imranali291/)
[![twitter](https://img.shields.io/badge/twitter-1DA1F2?style=for-the-badge&logo=twitter&logoColor=white)](https://twitter.com/imranali125)

### License

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
[![GPLv3 License](https://img.shields.io/badge/License-GPL%20v3-yellow.svg)](https://opensource.org/licenses/)
[![AGPL License](https://img.shields.io/badge/license-AGPL-blue.svg)](http://www.gnu.org/licenses/agpl-3.0)

### Contributing

Contributions are always welcome!

See `contributing.md` for ways to get started.

Please adhere to this project's `code of conduct`.