<?php

namespace BookRecords\Commands;

use BookRecords\DB\DBConnection;
use BookRecords\DB\DBSchema;
use BookRecords\Utility\SaveXMLBookRecords;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExecuteBooksXMLCommand extends Command
{

    protected static $defaultName = 'populate-books';

    protected function configure()
    {
        $this
        // the short description shown while running "php bin/console list"
        ->setDescription('Populates books.')

        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp('This command allows you to populates book from XML files')
    ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dbconn = new DBConnection(DB_DRIVER, DB_HOST, DB_USERNAME, DB_PASSWORD);
        //create DB schema if not exist
        $dbschema = new DBSchema($dbconn);
        $dbschema->createSchema();

        $xmlrecords = new SaveXMLBookRecords(DIRECTORY_XML_FOLDER);
        $xmlrecords->run();
        $output->writeln("Records Inserted");
        return 0;
    }
}