<?php

namespace App\Command;

use App\Service\Converter\JsonConverter;
use App\Service\Converter\XmlConverter;
use App\Service\FileHandlerInterface;
use App\Service\Reader\CsvReader;
use App\Service\Writer\JsonWriter;
use App\Service\Writer\XmlWriter;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:csv-handler',
    description: 'Handles given CSV file and converts it to json&xml',
)]
class CsvHandlerCommand extends Command
{
    private const PATH = 'data';

    /**
     * @var FileHandlerInterface
     */
    private FileHandlerInterface $handler;

    /**
     * @param FileHandlerInterface $fileHandler
     * @param string $name
     */
    public function __construct(FileHandlerInterface $fileHandler, string $name = 'app:csv-handler')
    {
        parent::__construct($name);
        $this->handler = $fileHandler;

    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->addArgument('filename', InputArgument::REQUIRED, 'CSV filename');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $filePath = self::PATH . DIRECTORY_SEPARATOR . $input->getArgument('filename');
        $this->handler->setReader(new CsvReader());
        $this->handler->getReader()->read($filePath);

        $this->handler->setConverter(new JsonConverter());
        $this->handler->setWriter(new JsonWriter());
        $this->handler->handle(self::PATH . DIRECTORY_SEPARATOR . 'converted');
        $this->handler->setConverter(new XmlConverter());
        $this->handler->setWriter(new XmlWriter());
        $this->handler->handle(self::PATH . DIRECTORY_SEPARATOR . 'converted');
        return Command::SUCCESS;
    }
}
