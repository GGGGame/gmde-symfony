<?php

namespace App\Service;

class ImportResult
{
    private int $successCount = 0;
    private array $failedRows = [];
    private array $skippedRows = [];

    public function addSuccess(): void
    {
        $this->successCount++;
    }

    public function addFailed(array $row, ?string $message = null): void
    {
        $this->failedRows[] = [
            'row' => $row,
            'error' => $message,
        ];
    }

    public function addSkipped(array $row, ?string $message = null): void
    {
        $this->skippedRows[] = [
            'row' => $row,
            'reason' => $message
        ];
    }
}