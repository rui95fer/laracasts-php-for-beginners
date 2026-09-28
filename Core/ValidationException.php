<?php

namespace Core;

use RuntimeException;

class ValidationException extends RuntimeException
{
    public function __construct(
        public readonly array $errors,
        public readonly array $oldInput
    ) {
        parent::__construct('The submitted data is invalid.');
    }
}
