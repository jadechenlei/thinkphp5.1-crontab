<?php
/**
 * Created by wwwscm.com
 * Author: chenlei
 * Date: 2019/4/11
 * Time: 15:39
 */

namespace leistar\cron;

use Cron\CronExpression;
use Jenssegers\Date\Date;
use think\console\Command;
use think\console\Input;
use think\console\Output;
use yunwuxin\cron\ManagesFrequencies;

abstract class Task extends Command
{
    use ManagesFrequencies;

    /** @var \DateTimeZone|string 时区 */
    public $timezone;

    /** @var string 任务周期 */
    public $expression = '* * * * * *';

    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->schedule();
    }

    /**
     * 配置任务执行时间
     */
    abstract function schedule();
    /**
     * 配置任务执行时间
     */
    abstract function configure();

    /**
     * 脚本执行入口。子类需重写该类。并实现父类中的功能
     */
    protected function execute(Input $input, Output $output)
    {
        if (!$this->isDue()) {
            exit;
        }
    }

    /**
     * 是否到期执行
     * @return bool
     */
    private function isDue()
    {
        $date = Date::now($this->timezone);
        return CronExpression::factory($this->expression)->isDue($date->toDateTimeString());
    }
}