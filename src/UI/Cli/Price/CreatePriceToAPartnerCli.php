<?php

declare(strict_types=1);

namespace Hexagonal\UI\Cli\Price;

use DateTimeImmutable;
use DateTimeZone;
use Hexagonal\Application\Price\Command\CreatePrice\CreatePriceCommand;
use Hexagonal\Application\Price\Command\CreatePrice\CreatePriceHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

final class CreatePriceToAPartnerCli extends Command
{
    private const COMMAND_NAME = 'bb8:price:create';
    private const ARGUMENT_PARTNER_ID = 'partner-id';

    public function __construct(
        private readonly CreatePriceHandler $createPriceHandler,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setName(self::COMMAND_NAME)
            ->addArgument(self::ARGUMENT_PARTNER_ID, InputArgument::REQUIRED, 'Partner Identifier')
            ->setDescription('Create prices');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        try {
            $partnerId = strval($input->getArgument(self::ARGUMENT_PARTNER_ID));
            $today = new DateTimeImmutable('now', new DateTimeZone('UTC'));
            $this->createPriceHandler->__invoke(
                new CreatePriceCommand($partnerId, $today, (clone $today)->modify('+2 year'), 1000)
            );
            $io->success('Sweet Potato');
            return self::SUCCESS;
        } catch (\Exception $exception) {
            $io->error($exception->getMessage());
            return self::FAILURE;
        }
    }

}