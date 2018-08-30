<?php

interface CommandInterface 
{
    public function execute();
}

class HelloCommand implements CommandInterface
{
    private $_output;

    public function __construct(Receiver $console) {
        $this->_output = $console;
    }

    public function execute() {
        $this->_output->write('Hello World!');
    }
}

class Receiver
{
    private $date = true;

    private $output = [];

    public function write(string $str) 
    {
        if($this->date) {
            $str .= date('Y-m-d');
        }

        $this->output[] = $str;
    }

    public function getOutput() {
        return join("\n", $this->output);
    }

    public function enableDate() {
        $this->date = true;
    }

    public function disableDate() {
        $this->date = false;
    }  
}

class Invoker {
    private $command;

    public function setCommand(CommandInterface $cmd) {
        $this->command = $cmd;
    }

    public function run() {
        $this->command->execute();
    }
}

$inv = new Invoker;
$rec = new Receiver;

$inv->setCommand(new HelloCommand($rec));
$inv->run();
?>