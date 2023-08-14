<?php

class ProductRequest
{
    protected $data;
    protected $errors = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function validate()
    {
        $this->validateRequired('name');
        $this->validateRequired('description');
        $this->validateNumeric('price');
    }

    public function passedValidation()
    {
        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    protected function validateRequired($field)
    {
        if (empty($this->data[$field])) {
            $this->errors[$field][] = ucfirst($field) . ' is required.';
        }
    }

    protected function validateNumeric($field)
    {
        if (!is_numeric($this->data[$field])) {
            $this->errors[$field][] = ucfirst($field) . ' must be numeric.';
        }
    }
}
