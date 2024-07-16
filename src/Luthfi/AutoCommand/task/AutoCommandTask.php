<?php

namespace Luthfi\AutoCommand\task;

use pocketmine\scheduler\Task;
use pocketmine\Server;

class AutoCommandTask extends Task {

    private $command;

    public function __construct(string $command) {
        $this->command = $command;
    }

    public function onRun(): void {
        Server::getInstance()->getCommandSender()->sendMessage($this->command);
    }
}
