# PHP-and-MySQL

This program creates an database named cst8238.

The database is populated using a form that creates employee accounts in the ‘Employee’ table of the database. The form, creates two types of employee account 
      (i)ITDeveloper (Designation = ’ITDeveloper’, Admin Code = 111)
      (ii) Manager (Designation = ’Manager’, Admin Code = 999).
      
After the information has been submitted to the database, the user is redirected to the ‘ViewAllEmployees.php’ page.


The form Login.php allows the user to log into the application, it accepts the employee’s EmailAddress and Password as credentials and uses an SQL Query to determine 
wether the person has an account or not. If the user has an account, redirect the user to ‘ViewAllEmployees.php’ otherwise displays an error message.

The ViewAllEmployees.php page pulls information from the Database and displaysit to the user.

The form SelectAccount.php allows Managers to update information of existing employees.

Admin.php page ensures that the current user is a manager before giving access to SelectAccount.php.

After clicking on the ‘Edit Employee’ button, the Manager is redirected to the form UpdateAccount.php which allows the Manager to update the information of the
corresponding employee.

After clicking on the ‘Update Record’ button, the information of the corresponding employee is updated into the Employee table of the database
and a success/error message will be displayed in UpdateComplete.php.

Note:
      This program can be tetsted on EasyPHP.



