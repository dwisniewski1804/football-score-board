# football-score-board
Library for storing and displaying football games scores.
## My feelings after completing the task:
1. The task took between 2 and 3 hours in sum.
2. I started from a tests written first in each iteration: as the TDD rules say.
3. I made hundreds of iterations before I was satisfied with the code made by myself.
4. I did not have so much opportunities before to use TDD so it was fun and I really liked the task.
5. Since it was easy from the technical side and easy to understand from the business rules side, I could focus to follow TDD and the design process. You will not see it in the commits history but I promise I was following it. 
6. I was not sure if I can use external libraries but using Doctrine\Collections seems to be the best way to not invent the wheel once again. Obviously I had to install PHP Unit aswell to perform tests.
7. Initially I wanted to use Object-Value also for results (GameResult) but at the end I decided to keep it simple since there is just 2 fields inside. If in the future we would introduce penalties in the score then I would use the class instead of primitives.
8. I created Team class since it's really likely that at some point we will want to have team structure more complete than just one primitive variable (or field in the ScoreBoard class).

I hope You will enjoy reviewing it. 

## Guidelines:
• Keep it simple. Stick to the requirements and try to implement the simplest
solution you can possibly think of that works and don't forget about edge cases.
- Use an in-memory store solution (for example just use collections to store
the information you might require).
• We are NOT looking for a REST API, a Web Service or Microservice. Just
a simple implementation.
-  Focus on Quality. Use Test-Driven Development (TDD), pay attention to
OO design, Clean Code and adherence to SOLID principles.
-  Approach. Code the solution according to your standards. Please share your
solution with a link to a source control repository (e.g. GitHub, GitLab,
BitBucket) as we would like you to see your progress (your commit history is
important)
- Add a README.md file where you can make notes of any assumption or
things you would like to mention to us about your solution.

## Football World Cup Score Board:
You are working on a sports data company. And we would like you to develop a new
Live Football World Cup Score Board that shows matches and scores.
The boards support the following operations:
1. Start a game. When a game starts, it should capture (being initial score 0-0)
a. Home team
b. Away Team
2. Finish a game. It will remove a match from the scoreboard.
3. Update score. Receiving the pair score; home team score and away team score
updates a game score
4. Get a summary of games by total score. Those games with the same total score
will be returned ordered by the most recently added to our system.
As an example, being the current data in the system:
a. Mexico - Canada: 0 – 5
b. Spain - Brazil: 10 – 2
c. Germany - France: 2 – 2
d. Uruguay - Italy: 6 – 6
e. Argentina - Australia: 3 - 1
The summary would provide with the following information:
1. Uruguay 6 - Italy 6
2. Spain 10 - Brazil 2
3. Mexico 0 - Canada 5
4. Argentina 3 - Australia 1
5. Germany 2 - France
