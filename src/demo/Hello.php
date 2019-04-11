<?php
/**
 * Created by wwwscm.com
 * Author: chenlei
 * Date: 2019/4/11
 * Time: 9:27
 */

namespace app\common\command;


use leistar\cron\Task;
use think\console\Input;
use think\console\input\Argument;
use think\console\input\Option;
use think\console\Output;

class Hello extends Task
{
    public function schedule()
    {
        $this->everyFiveMinutes();
    }
    protected function configure()
    {
        $this->setName('hello')
            ->addArgument('name', Argument::OPTIONAL, "your name")
            ->addOption('city', null, Option::VALUE_REQUIRED, 'city name')
            ->setDescription('Say Hello');
    }

    protected function execute(Input $input, Output $output)
    {
        parent::execute($input, $output);
        $name = trim($input->getArgument('name'));
        $name = $name ?: 'thinkphp';

        if ($input->hasOption('city')) {
            $city = PHP_EOL . 'From ' . $input->getOption('city');
        } else {
            $city = '';
        }
        //sleep(30);
        $output->writeln("Hello," . $name . '!' . $city);
    }


}