<?php

require_once  __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Play\Command\GreetCommand;

class ListCommandTest extends \PHPUnit_Framework_TestCase
{
  public function testExecute()
  {
    $application = new Application();
    $application->add(new GreetCommand());

    $command = $application->find('demo:greet');
    $commandTester = new CommandTester($command);
    $commandTester->execute(array(
      'command' => $command->getName(),
      'name' => "Toon"
    ));

    $this->assertRegExp('/Toon/', $commandTester->getDisplay());

    $commandTester->execute(array(
      'command' => $command->getName(),
      'name' => "Toon",
      'last_name' => "Ketels"
    ));

    $this->assertRegExp('/Hello Toon Ketels/', $commandTester->getDisplay());
  }
}

