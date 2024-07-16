<?php

namespace Luthfi\AutoCommand\task;

use pocketmine\scheduler\Task;
use pocketmine\Server;

class AutoCommandTask extends Task {

    private $plugin;
    private $command;

    public function __construct($plugin, string $command) {
        $this->plugin = $plugin;
        $this->command = $command;
    }

    public function onRun(): void {
        Server::getInstance()->dispatchCommand(Server::getInstance()->getConsoleSender(), $this->command);
    }
}
