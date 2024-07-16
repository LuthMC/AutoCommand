<?php

namespace Luthfi\AutoCommand;

use pocketmine\plugin\PluginBase;
use Luthfi\AutoCommand\task\AutoCommandTask;

class Main extends PluginBase {

    public function onEnable(): void {
        $this->saveDefaultConfig();
        $commands = $this->getConfig()->get("commands", []);
        
        foreach ($commands as $commandConfig) {
            if ($commandConfig["enabled"]) {
                $command = $commandConfig["command"];
                $interval = $commandConfig["interval"] * 60 * 20;
                $this->getScheduler()->scheduleRepeatingTask(new AutoCommandTask($this, $command), $interval);
            }
        }
    }
}
