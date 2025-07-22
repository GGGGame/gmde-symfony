<?php

namespace App\Service;

class ImportResult
{
    private int $successCount = 0;
    private array $failedRows = [];

    public function addSuccess(): void
    {
        $this->successCount++;
    }

    public function getSuccessCount(): int
    {
        return $this->successCount;
    }

    public function getFailedRows(): array
    {
        return $this->failedRows;
    }

    public function addFailed(array $row, ?string $error = null): void
    {
        $this->failedRows[] = [
            'row' => $row,
            'error' => $error,
        ];
    }
}