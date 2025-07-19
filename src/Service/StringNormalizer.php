<?php

namespace App\Service;

class StringNormalizer
{
    public function normalize(string $input, ?string $case = 'camel'): string
    {
        return $this->normalizeString($input, $case);
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