<?php

namespace App\Command;

use App\Service\CsvImporter;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:import-cars',
    description: 'Add a short description for your command',
)]
class ImportCarsCommand extends Command
{
    public function __construct(
        private CsvImporter $csvImporter,
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('pathCsvFile', InputArgument::REQUIRED, 'path to csv file')
            ->addOption('batch', 'b', InputOption::VALUE_OPTIONAL, 'Batch size to handle', 50);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $csvPath = $input->getArgument('pathCsvFile');

        if (!file_exists($csvPath)) {
            $io->error('CSV file does not exist: ' . $csvPath);
            return Command::FAILURE;
        }

        $batchSize = $this->validateBatchSize($input, $io);
        if ($batchSize === null) {
            return Command::FAILURE;
        }

        $io->info('Batch size IO: ' . $batchSize);

        $this->csvImporter->import($csvPath, $batchSize);

        $io->success('Import command success.');

        return Command::SUCCESS;
    }

     private function validateBatchSize(InputInterface $input, SymfonyStyle $io): ?int
    {
        $batchSizeRaw = $input->getOption('batch');
        
        // DEBUG: Mostra cosa arriva dall'input
        $io->info("DEBUG: Raw batch value: " . var_export($batchSizeRaw, true));
        $io->info("DEBUG: Type: " . gettype($batchSizeRaw));

        if (is_string($batchSizeRaw)) {
            $batchSizeRaw = trim($batchSizeRaw);

            if (!ctype_digit($batchSizeRaw)) {
                $io->error('Batch size deve essere un numero positivo: ' . $batchSizeRaw);
                return null;
            }
            
            $batchSize = (int)$batchSizeRaw;
        } else {
            $batchSize = (int)$batchSizeRaw;
        }

        // DEBUG: Mostra il valore finale
        $io->info("DEBUG: Final batch size: {$batchSize}");

        return $batchSize;
    }
}
