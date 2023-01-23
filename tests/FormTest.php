<?php

namespace Imran\Form\Tests;


use Imran\Form\Form;
use PHPUnit\Framework\TestCase;

/**
 * Form Test Class
 */
class FormTest extends TestCase
{
    /**
     * @group open
     * Test the open method
     */
    public function testOpen()
    {
        $attributes = ['action' => '/submit', 'method' => 'post'];
        $this->assertEquals("<form action='/submit' method='post' >", Form::open($attributes));
    }

    /**
     * @group close
     * Test the close method
     */
    public function testClose()
    {
        $this->assertEquals('</form>', Form::close());
    }

    /**
     * @group input
     * Test the input method
     */
    public function testInput()
    {
        $attributes = ['required' => 'required'];
        $this->assertEquals(
            "<input type='text' name='first_name' value='John' required='required' >",
            Form::input('first_name', 'text', 'John', $attributes)
        );
    }

    /**
     * @group select
     * Test the select method
     */
    public function testSelect()
    {
        $options = ['male' => 'Male', 'female' => 'Female'];
        $this->assertEquals(
            "<select name='gender' ><option value='male' selected>Male</option><option value='female' >Female</option></select>",
            Form::select('gender', 'male', $options)
        );
    }

    /**
     * @group textarea
     * Test the textarea method
     */
    public function testTextarea()
    {
        $this->assertEquals(
            "<textarea name='message' >Hello, World!</textarea>",
            Form::textarea('message', 'Hello, World!')
        );
    }

    /**
     * @group checkbox
     * Test the checkbox method
     */
    public function testCheckbox()
    {
        $this->assertEquals(
            "<input type='checkbox' name='agreement' value='1' checked >",
            Form::checkbox('agreement', 1, true)
        );
    }

    /**
     * @group radio
     * Test the radio method
     */
    public function testRadio()
    {
        $this->assertEquals(
            "<input type='radio' name='payment' value='credit' checked >",
            Form::radio('payment', 'credit', true)
        );
    }

    /**
     * @group file
     * Test the file method
     */
    public function testFile()
    {
        $attributes = ['accept' => 'image/*'];
        $this->assertEquals("<input type='file' name='image' accept='image/*' >", Form::file('image', $attributes));
    }

    /**
     * @group password
     * Test the password method
     */
    public function testPassword()
    {
        $attributes = ['required' => 'required'];
        $this->assertEquals(
            "<input type='password' name='password' required='required' >",
            Form::password('password', $attributes)
        );
    }

    /**
     * @group email
     * Test the email method
     */
    public function testEmail()
    {
        $attributes = ['placeholder' => 'Enter your email'];
        $this->assertEquals(
            "<input type='email' name='email' value='test@example.com' placeholder='Enter your email' >",
            Form::email('email', 'test@example.com', $attributes)
        );
    }

    /**
     * @group label
     * Test the label method
     */
    public function testLabel()
    {
        $attributes = ['class' => 'required'];
        $this->assertEquals(
            "<label for='first_name' class='required' >First Name</label>",
            Form::label('first_name', 'First Name', $attributes)
        );
    }

    /**
     * @group customType
     * Test the registerCustomType and custom method
     */
    public function testCustomType()
    {
        Form::registerCustomType('custom_input', function (...$params) {
            return "<input type='text' name='".$params[0]."' value='".$params[1]."' placeholder='".$params[2]."'>";
        });
        $params = ['custom_name', 'custom_value', 'custom_placeholder'];
        $this->assertEquals(
            "<input type='text' name='custom_name' value='custom_value' placeholder='custom_placeholder'>",
            Form::custom('custom_input', $params)
        );
    }
}