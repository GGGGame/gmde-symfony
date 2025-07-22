<?php

namespace App\Service;

class StringNormalizer
{
    public function normalizeKey(array $data, ?string $case = 'camel'): array
    {
        $normalized = [];
        foreach ($data as $key => $value) {
            $normalized[$this->normalizeString($key, $case)] = empty($value) ? null : $value;
        }
        return $normalized;
    }

    private function normalizeString(string $input, string $case): string
    {
        $input = trim($input);
        
        return match ($case) {
            'pascal' => $this->toPascalCase($input),
            default => $this->toCamelCase($input)
        };
    }

    private function toCamelCase(string $input): string
    {
        $input = str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $input)));
        return lcfirst($input);
    }

    private function toPascalCase(string $input): string
    {
        $input = str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $input)));
        return ucfirst($input);
    }
}