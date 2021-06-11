ToDoList with PHP

 How to run:
  - Start MySQL service, personally I used WSL2 so the command would be "sudo service mysql start"
  - Open MySQL as a root user "mysql -u root -p [insert your password here for root user]"
  - Either create a new user that will interact with database or continue as a root user
  - Create a database and name it 'ToDoList'
  - Upload 'db_todo.sql' file in 'ToDoList' database to create tables
  - Change username and password in DbConnection.php file to what your credentials will be to connect to the database
  - Launch the built-in web server with command - "php -S localhost:8000"
  - Install composer with command - "composer install"
  - Then execute the command - "composer dumpautoload -o"


  Pictures are located in the screenshot folder with all the views.