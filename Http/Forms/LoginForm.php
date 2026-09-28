<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected array $attributes;

    protected array $errors = [];

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
        $this->validateAttributes();
    }

    public static function validate(array $attributes): static
    {
        $form = new static($attributes);

        if ($form->failed()) {
            $form->throw();
        }

        return $form;
    }

    protected function validateAttributes(): void
    {
        if (!Validator::email($this->attributes['email'] ?? '')) {
            $this->errors['email'] = 'Email is not valid';
        }

        if (!Validator::string($this->attributes['password'] ?? '')) {
            $this->errors['password'] = 'Password is required';
        }
    }

    public function failed(): bool
    {
        return !empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error(string $field, string $message): static
    {
        $this->errors[$field] = $message;

        return $this;
    }

    public function throw(): never
    {
        throw new ValidationException($this->errors(), $this->oldInput());
    }

    protected function oldInput(): array
    {
        return array_intersect_key($this->attributes, ['email' => true]);
    }
}
