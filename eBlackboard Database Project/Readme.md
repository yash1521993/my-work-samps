#Instructions for running the project

-->run XAMPP application, start Apache and MySQL servers in XAMPP control panel.

-->extract the files and import the blackboard.sql file to mysql server in localhost.

-->Copy the db project folder to XAMPP>htdocs folder.

-->type in browser "localhost/db project" to get the home page of e-blackboard website.

	-->Admin tab takes you to the admin login page where admin can login.

			-->After login, admin gets 3 tabs - Student DB, Teacher DB, Parent DB
				-->	Student DB tab allows to add,delete,update and search student details
				--> Teacher DB tab 
					--> allows to add,delete,update and search teahcer details
					--> courses can be added for the existing teacher ids using the hyperlink - "click here to add COURSES and CLASSES"
				--> Parent DB tab allows to add,delete,update and search parent detail
				--> Log-Off tab is to logout from the session/account
	-->MY Blackboard tab or Enter now button takes to the login page for teacher/student/parent to login.
			
			-->Teacher login will directs to the uploads page where teacher can upload materials, attendance, attendance and view the uploaded files.
			-->Student login will direct to page where student can view all the uploaded materials, attendance and grades.
			-->Parent login will direct to page where parent can access student attendance and grades.
			-->Log-Off tab will logout the actor(teacher/student/parent) from their account.
	
--> Changes to the Database can be checked in "localhost/phpmyadmin"