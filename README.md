<img src="https://media.giphy.com/media/QMHoU66sBXqqLqYvGO/giphy.gif">

# Wunderlist

A task list is a list of tasks to be completed, such as chores or steps toward completing a project. The goal of this project is to build a platform for the lists that will help you completing a project. This project is built mainly by php and html. You can visit the finished site here, maybe or follow the instructions below to open it on a local php-server. 

# Installation

1. Clone this repo and open it with a code-editor of your choice. 
2. Open a localhost in your terminal by writing: php -S localhost:8000. 
3. Visit the localhost in your browser.
4. Get organized.

# Code Review

Code review written by [Alice Nyberg](https://github.com/alicenyberg).

1. all-tasks.php:18 - When clicking the checkbox it does not stay as completed, maybe try some other solution for that?

2. all-tasks.php:22 - The delete/x-button looks very big under the checkbox, try to make it a bit smaller or make the checkbox bigger.

3. change-email.php - Great job with comments in your code, easy to navigate in this file for example. I can see that you didn’t
do that in all your files, a picky thing but why not add some in all files!

4. tip - Consider using a bigger font size in mobile view, now it’s a bit small I think! 

5. when I’m logged in and clicking on a list there Is a warning under “your tasks”.

6. same thing when I try to edit a task, I get warnings on line 21, 29-31 and 36 in edit-task.php. And if I then try to edit my task it doesn’t change.

7. i see you have two files named database.db. The one in your root seems to be empty, consider remove unused files!

8. edit-list.php:28 - The delete and update button is very close to each other which makes it easy for the user to accidentally press the wrong button. Maybe add som space between them?

9. lists.php:16 - There are labels missing in your forms, try to use labels for better accessibility! 

10. good job splitting up all your files! Easy to navigate and not too much in every file, I like! 

# Testers

Tested by the following people:

1. Sophie Wulff
2. Emma Hansson

# Wunderlist +

[Oliver Davis](https://github.com/DavisDavisDavis/Wunderlist-2) added two features: 

1. Welcome mail
2. Mark all tasks in a list as completed with one click 
