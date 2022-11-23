<?php


namespace Freedom\App\Console\Commands;


use Freedom\Modules\Command\CommandDispatcher;

class SayHiCommand extends CommandDispatcher
{
    public function handle()
    {
        echo 'Hi';
        return 0;
    }
}
