<?php

namespace Modules\Core\Services;

use Modules\Core\ValueObjects\ValidationResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Factory;

abstract class EntityValidator
{
    public $entity;
    private $valid;

    abstract protected function rules(): array;
    abstract protected function attributes(): array;

    public function __construct(Model $entity)
    {
        $this->entity = $entity;

        /** @var $factory \Illuminate\Validation\Factory $validator */
        $factory = app(Factory::class);
        $validator = $factory->make($this->getModelData(), $this->rules());

        $this->valid = $validator->valid();
    }

    private function getModelData(): array
    {
        $data = [];

        foreach ($this->fields() as $field) {
            $data[$field] = $this->entity->$field;
        }

        return $data;
    }

    private function fields(): array
    {
        return array_keys($this->attributes());
    }

    private function getAttribute(string $key)
    {
        $attributes = $this->attributes();

        return $attributes[$key];
    }

    public function results(): array
    {
        $data = [];

        foreach($this->fields() as $field) {
            $data[] = $this->getResult($field);
        }

        return $data;
    }

    private function getResult(string $field): ValidationResult
    {
        $result = new ValidationResult($field, $this->getAttribute($field));

        if (\array_key_exists($field, $this->valid)) {
            $result->setValid(true);
        }

        return $result;
    }
}
