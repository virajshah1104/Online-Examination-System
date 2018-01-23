# Online-Examination-System

The **Online Examination System website** is a simple website that conducts a quiz consisting of ten questions within a specified time limit.

##Working:

-The Main Page need to be loaded which requests the user to enter his/her name and has a **Begin Test** button which redirects control to the main examination page.
-As soon as the test begins , a timer of 5 minute starts and the user must finish answering all the ten questions within the time specified.
-All questions are compulsary and if the user runs out of time , an auto-submit redirects control to the result page.
-The result page displays the **Final Score Out of 10** that the user has scored .It also displays a table showing the correct answers alog with the ones the user has selected and the points recieved accordingly.
-The user can re-attempt the test by clicking on **Back to Home Page** button.

##Steps:

-Install all the codes namely : **MainPage.php,TestPage.php,Result.php.**
-A working xampp/wamp/apache software is required for the database connections.
-These Pages must be moved to the location : **C -> Xampp -> htdocs. **(location may change if software is wamp/apache).
-Download the **Examination.sql** file.
-Open localhost and import the database.
-Change root and password for localhost in the codes according the to the values of your phpMyAdmin.
-Run the MainPage.php via localhost and the code should function correctly.
