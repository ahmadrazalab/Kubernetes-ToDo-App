## Project is hosted in k8s cluster with 1 master and 1 worker node (AWS)

## Application Structure
- Application is hosted in worker node of k8 with 3-4 frontend container (ubuntu) and 1 backend container (mysql)




## Application 
- This is a 2 tier TODO Application 
    Enter Your Name > Task description > Select Date of Task
- Task Details Store in My Sql DB 

 
## DB 
## This should be execute in db to add tables and column (to store task data in database)
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_name VARCHAR(255) NOT NULL,
    task_description TEXT,
    task_date DATE
);