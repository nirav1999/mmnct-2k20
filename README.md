# mmnct-2k20
a website to get schedule,player details for cricket tournment for year 2020


INDEX

1.	Introduction

2.	Description and Functionalities

•	Home Page

•	League-Table page

•	Schedule page

•	Player Stats page

•	Team-info page

•	Login-signup modal

3.	Database Design

•	Tables

•	Relations

4.	Validation

5.	Session Management

6.	JQuery

7.	Conclusion
 




INTRODUCTION

•	The aim of this project is to design first mmnct (manoj memorial night cricket tournament) website, which will be for 2020 edition. The website is created using Frontend: HTML, CSS, Bootstrap and JQuery and Backend: PHP and XAMPP Server.


•	MMNCT (Manoj Memorial Night Cricket Tournament) is a cricket tournament, organized by the students with the help of SVNIT Board of Sports, SVNIT Hostel Office and BSA Alumni. his tournament was first started in 2006 in remembrance of a fellow student, Late Manoj Kumar, from Patna (Bihar).


•	The website will contain multiple pages, including a home page where admin can login to set the updated scorecard after scheduled match is played, league-table page where one can see the updated table for group A and group B, Schedule page in which can view the schedule of the matches including final, player stats page where one can a player details and team info page.


•	The feature of this website is it will a full description about ongoing tournament, it will the access to the admin to update the final scorecard for the match played and it will automatically update the league-table, it will see which has team has the higher score and add 3 points for that team, while 1 point for the draw. the admin can only access the final match after all matches are played which will reduce chance of making error.






Description and Functionalities


1.	Home Page


•	It is initial welcoming page.

•	It contains a navigation bar which highlights the home link as we are on the home page which I have done by using session functionalities of PHP where I have set the $_SESSION[‘on page’]=”home”; and had the condition that if on that page added the CSS class for the required.









•	Second, it contains a header tag which a mmnct logo with its announcing date. In this I have made use JQuery as hover the mouse on the mmnct logo is toggle with its alternative logo image.

•	The section tag contains the match detail which is randomly selected using random function.

 





























 
2.	League-Table Page


•	The league-table contains the points table for both the group which will helpful to decide who is on the top of the table.

•	The point table contains the name and logo of teams in the required descending of points.

 






















































 
3.	Schedule Page


•	The Schedule page has the time table for various matches including final which can accessed by a small navbar.

























•	When admin is logged in it can set scoreboard by just a click on the match.

 
































 
4.	Players Stats Page


•	This page will help in searching a player and search players according to the team. here, session used is $_SESSION[‘search’] = $_POST[‘byname’];

 

























































 
5.	Team-info Page


•  This page provides players names in a particular with their captions.


























6.	Sign-in and Log-in modal


•	This is done using bootstraps modal class with addition of validation of data using php.

 




























 
Database Design



1.	Tables

•	Users

•	Matches

•	Teams

•	Leaguetable

•	Leaguetable2

•	Players






























2.	Relations

•	The above image shows the relationship of various table where small ended side is the referenced key, while other end is the referencing key.
 









 
Validation



•	In this website the validation is done on the form and table like sign-up and login, where also in scorecard table so wickets are not above 10. Direct validation to email by specifying type equal to email. username is the primary key, so maintaining that uniqueness and giving output as “this username is in use” this is also in validation and validation also for incorrect password.




























Session Management

•	In this webpage, Session is mainly used in navigation to keep the track of the current page and also used to show the current user name.






•	Also, it is used in search-bar to remember the previous value that was searched.

 








 
JQuery

•	JQuery is used at the home page that as we hover the mouse on the mmnct logo it will toggle the image with another image.

•	In the showscorecard page in which the winning team will blink.

































Conclusion

•	It can thus be concluded how a sports tournament website is important to attract new fans, to give an update to the fans who can’t attend the match, lessen administration work and also reduce the use of the paper. For the making of this website, the code was mostly written in HTML, which was then styled through an external stylesheet CSS, its framework: bootstrap and JQuery. While Backend was done through PHP and XAMPP Server.
 









