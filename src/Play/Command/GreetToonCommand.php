<?php

namespace Play\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\ArrayInput;

class GreetToonCommand extends Command
{
  protected function configure()
  {
    $this->setName('demo:greet:toon')
         ->setDescription('Greet Toon')
         ->addOption('yell', null, InputOption::VALUE_NONE, 'Yell in uppercase');
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $command = $this->getApplication()->find('demo:greet');


    $arguments = array(
      'name' => 'Toon',
      'last_name' => 'Ketels',
      '--yell' => $input->getOption('yell')
    );

    $input = new ArrayInput($arguments);
    $returncode = $command->run($input, $output);
  }
}
