<?php

namespace Rover;

final class MarsRover
{
    const x = 0;
    const y = 1;
    const GRID_SIZE = 256;
    private $position;
    private $direction;
    private $obstacles;
    private $stopped;
    const directions = [[1, self::y], [1, self::x], [-1, self::y], [-1, self::x]];
    const compassBearings = ['N' => 0, 'E' => 1, 'S' => 2, 'W' => 3];

    /**
     * MarsRover constructor.
     * @param int $x
     * @param int $y
     * @param int $bearing
     * @throws \Exception
     */
    public function __construct(int $x, int $y, string $bearing)
    {
        if ($x < 0 || $x >= self::GRID_SIZE || $y < 0 || $y >= self::GRID_SIZE) {
            throw new \Exception('Illegal position');
        }
        $this->position = [self::x => $x, self::y => $y];
        if (!array_key_exists($bearing, self::compassBearings)) {
            throw new \Exception('Non-existent bearing');
        }
        $this->direction = self::compassBearings[$bearing];
        $this->obstacles = [];
        $this->stopped = false;
    }

    public function move($commands)
    {
        foreach ($commands as $command) {
            $this->handleCommand($command);
            if ($this->stopped) break;
        }
    }

    public function getPosition()
    {
        return $this->position;
    }

    private function handleCommand($command)
    {
        if ($command == 'F') {
            $this->moveSteps(1);
        }
        if ($command == 'B') {
            $this->moveSteps(-1);
        }
        if ($command == 'R') {
            $this->turnRight();
        }
        if ($command == 'L') {
            $this->turnLeft();
        }
    }

    private function turnLeft()
    {
        $this->turnRight();
        $this->turnRight();
        $this->turnRight();
    }

    private function turnRight()
    {
        $this->direction = ($this->direction + 1) % 4;
    }

    private function moveSteps($steps)
    {
        list($direction, $axis) = self::directions[$this->direction];
        $this->position[$axis] += $steps * $direction;
        $this->wrapAround();

        $this->stopAtObstacle($steps);
    }

    public function setObstacles(array $obstacles)
    {
        $this->obstacles = $obstacles;
    }

    private function wrapAround()
    {
        $this->position = array_map(function ($coordinate) {
            return ($coordinate + self::GRID_SIZE) % self::GRID_SIZE;
        }, $this->position);
    }

    private function stopAtObstacle($steps)
    {
        if (in_array($this->position, $this->obstacles)) {
            $this->moveSteps($steps * -1);
            $this->stopped = true;
        }
    }
}
