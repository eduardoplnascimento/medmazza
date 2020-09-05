<?php

namespace App\Http\Services\Responses;

use JsonSerializable;

class ServiceResponse implements JsonSerializable
{
    /**
     * @var bool
     */
    public $success;

    /**
     * @var string
     */
    public $message;

    /**
     * @var mixed
     */
    public $data;

    /**
     * @var mixed
     */
    public $erros;

    /**
     * @param bool   $success
     * @param string $message
     * @param mixed  $data
     * @param mixed $errors
     */
    public function __construct(
        bool $success,
        string $message,
        $data = null,
        $errors = null
    ) {
        $this->success = $success;
        $this->message = $message;
        $this->data    = $data;
        $this->errors  = $errors;
    }

    /**
     * Retorna as propriedades dessa classe em array
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'message' => $this->message,
            'data'    => $this->data,
            'errors'  => $this->errors
        ];
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
