<?php

namespace Rover\Tests;

use PHPUnit\Framework\TestCase;
use Rover\MarsRover;

final class MarsRoverTest extends TestCase
{
    private $rover;

    public function setUp()
    {
        $this->rover = new MarsRover(0, 0, 'N');
    }

    public function test_that_it_starts_at_zero_zero()
    {
        $this->rover->move([]);
        self::assertEquals([0, 0], $this->rover->getPosition());
    }

    public function test_that_it_moves_from_initial_position()
    {
        $this->rover->move(['F']);
        self::assertEquals([0, 1], $this->rover->getPosition());
    }

    public function test_that_it_moves_backwards()
    {
        $this->rover->move(['F', 'B']);
        self::assertEquals([0, 0], $this->rover->getPosition());
    }

    public function test_that_it_moves_right()
    {
        $this->rover->move(['R']);
        self::assertEquals([0, 0], $this->rover->getPosition());
    }

    public function test_that_it_moves_forward_and_right()
    {
        $this->rover->move(['F', 'R', 'F']);
        self::assertEquals([1, 1], $this->rover->getPosition());
    }

    public function test_that_it_moves_forward_and_right_and_left_and_right()
    {
        $this->rover->move(['F', 'R', 'F', 'R', 'F']);
        self::assertEquals([1, 0], $this->rover->getPosition());
    }

    public function test_that_it_moves_in_any_direction()
    {
        $this->rover->move(['F', 'R', 'R', 'L', 'F', 'R', 'B', 'B']);
        self::assertEquals([1, 3], $this->rover->getPosition());
    }

    public function test_that_grid_wraps_around()
    {
        $this->rover->move(['B']);
        self::assertEquals([0, 255], $this->rover->getPosition());
    }

    public function test_that_it_stops_at_obstacles()
    {
        $this->rover->setObstacles([[2,2]]);
        $this->rover->move(['F','F','R','F','F']);
        self::assertEquals([1,2], $this->rover->getPosition());
    }

    public function test_that_it_stops_after_meeting_first_obstacle()
    {
        $this->rover->setObstacles([[2,2]]);
        $this->rover->move(['F','F','R','F','F','B']);
        self::assertEquals([1,2], $this->rover->getPosition());
    }

    public function test_that_it_only_accepts_existing_direction()
    {
        self::expectException(\Exception::class);
        $rover = new MarsRover(0, 0, 'X');
    }

    public function test_that_it_only_accepts_valid_coordinates()
    {
        self::expectException(\Exception::class);
        $rover = new MarsRover(-1, 0, 'N');
    }
}
