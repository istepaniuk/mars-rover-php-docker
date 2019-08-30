Mars Rover Kata
===============
Source: Widespread kata, generally attributed to the Dallas Hack Club.

<img src="https://upload.wikimedia.org/wikipedia/commons/d/d8/NASA_Mars_Rover.jpg" alt="drawing" width="500"/>

## Setup
* Clone this repository and run `./setup.sh` in it. You only need to do this once.
* Running `./run-tests.sh` will run the tests in the 'tests' folder.
* Add your tests in `tests/MarsRoverTests.php`
* Make the tests pass by editing `src/MarsRover.php`
* Refactor, rinse and repeat.

## Your Task
You’re part of the team that explores Mars by sending remotely controlled vehicles to the surface of the planet.
Develop an API that translates the commands sent from earth to instructions that are understood by the rover.

## Description
* You are given the initial starting point (x,y) of a rover and the initial direction (N,S,E,W) it is facing, also called bearing.
* The rover receives a character array of commands.
* The commands are used to move forward and backward (F,B) and to turn left or right by 90 degrees (L, R).
* The coordinate system is such that the grid wraps around its edges. (planets are spheres after all)
* Given a list of coordinates that represent obstacles, the rover must stop at the last possible position and report the obstacle.

### Rules
* TDD as if you mean it. No Excuses!

