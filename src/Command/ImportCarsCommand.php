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
            ->addArgument('pathCsvFile', InputArgument::REQUIRED, 'path to csv file');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $csvPath = $input->getArgument('pathCsvFile');

        if (!file_exists($csvPath)) {
            $io->error('CSV file does not exist: ' . $csvPath);
            return Command::FAILURE;
        }

        $this->csvImporter->import($csvPath);

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
