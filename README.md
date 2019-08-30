Mars Rover Kata
===============
Source: Widespread kata, generally attributed to the Dallas Hack Club.

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

