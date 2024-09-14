<?php

namespace walangkaji\LitensiAPI\Response;

use Spatie\DataTransferObject\Caster;

class DataCaster implements Caster
{
    public function __construct(
        private array $types,
        private string $itemType,
    ) {
    }

    /**
     * Caster
     *
     * @throws \Exception
     */
    public function cast(mixed $value): mixed
    {
        // If $value is a string, return it directly (likely a failure message)
        if (\is_string($value)) {
            return $value;
        }

        // If it's an array, map each item to the dynamically provided class
        if (\is_array($value)) {
            if ('array' === $this->types[0]) {
                return array_map(fn ($item) => new $this->itemType(...$item), $value);
            }

            return new $this->itemType($value);
        }

        throw new \Exception("Invalid data type for 'data'");
    }
}
