Feature: Bowling game
    In order to save me from doing it in my head
    As a 10-pin bowler
    I want the program to calculate my bowling score for me

    Scenario: Calculate score for gutter game
        Given I have started a new game of 10-pin bowling
        When I roll 20 gutter balls
        Then my score is 0 points

    Scenario: Calculate score for perfect game
        Given I have started a new game of 10-pin bowling
        When I roll 12 strikes
        Then my score is 300 points

    Scenario: Calculate score for all ones
        Given I have started a new game of 10-pin bowling
        When I knock over 1 pin 20 times
        Then my score is 20 points

    Scenario: Calculate score for one spare and 3
        Given I have started a new game of 10-pin bowling
        When I knock over 5 pins
        And I knock over 5 pins
        And I knock over 3 pins
        And I roll 17 gutter balls
        Then my score is 16 points

    Scenario: Calculate score for one strike and 3 and 4
        Given I have started a new game of 10-pin bowling
        When I roll 1 strike
        And I knock over 3 pins
        And I knock over 4 pins
        And I roll 16 gutter balls
        Then my score is 24 points
