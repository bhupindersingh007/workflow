## Introduction
**WORKFLOW** - A Project Management SAAS application built with PHP, Laravel, Vite, Bootstrap & MySQL.

![WORKFLOW](https://github.com/bhupindersingh007/workflow/assets/63149405/a1cb4c88-6fdc-4455-891b-47af9eae940c)

## Features

- **User Authentication**: User can register, login and logout.
- **Projects**: A user with a valid workflow account can create a number of projects with unlimited tasks in it.
- **Tasks**: A project owner/creator can assign tasks to team members to complete the given task.
- **Comment System**: Task assignee and assignor can communicate with each other by (2 way) task comment system.
- **User Settings**: A user can update the account information like name, email and password.
- **Project Invitation**: A project owner can invite other users to be a part of the project.
- **Dashboard Widgets**: Summary of important information at the user dashbaord's home.
- **Notification System**: Built-in notification system when the task is updated, on new comment, new team member invitation and when user accepts or rejects invitation.
- **Search System**: Users can search projects, tasks, team members, invitations.

## Showcase

![Home Page](https://github.com/user-attachments/assets/b936c87a-7d3f-48f4-858f-53bd99797abd)

### Register & Login

![Register](https://github.com/user-attachments/assets/680bab00-0b7b-430b-a7d3-287ae89e72a5)

![Login](https://github.com/user-attachments/assets/2e491cf8-f973-4550-aab0-fdd6b8c0fb7e)

### Manage Projects

![All Projects](https://github.com/bhupindersingh007/workflow/assets/63149405/52fea8bc-cbb1-4c1b-af1c-f4744659395a)

![New Project](https://github.com/bhupindersingh007/workflow/assets/63149405/139fc651-5e5f-4618-a899-050f350c1209)

### Manage Tasks

![New Task](https://github.com/bhupindersingh007/workflow/assets/63149405/e91a048f-3dc5-4ecb-844f-956dca413b49)

![All Tasks](https://github.com/bhupindersingh007/workflow/assets/63149405/a188ff5c-de6b-448e-8c1f-036ecfd3bde3)

### Manage Invitations

![Inviate a Memeber](https://github.com/bhupindersingh007/workflow/assets/63149405/f02bc498-0a60-44f1-9754-840bdb43f20c)

![Invitations](https://github.com/bhupindersingh007/workflow/assets/63149405/355322a0-62e0-470e-84ea-976ce9b2bac9)

### Manage Team Members

![Team Members](https://github.com/bhupindersingh007/workflow/assets/63149405/75ba9497-081d-4edb-b87a-6a32a6e00b87)

### Manage Notifications

![Notifications](https://github.com/user-attachments/assets/a7a3024a-6e7b-4aa0-9ef8-5b7680993dc9)

### Manage Task Comments

![Task Comment](https://github.com/user-attachments/assets/ee467600-8970-4949-a23d-a9620edae8ae)

### Update Account

![Update Account](https://github.com/bhupindersingh007/workflow/assets/63149405/d3e18b84-9715-482d-a547-33caa9b7f114)

![Change Password](https://github.com/bhupindersingh007/workflow/assets/63149405/0885e1bc-ffec-47e3-8039-8d6bbd1cbbe0)

         
## Installation

**Requirements**: PHP >= 8.1, Composer, RDBMS (such as MySQL, MariaDB, PostgreSQL, etc.)

**Installation Steps:**

1. Clone the repository ```git clone https://github.com/bhupindersingh007/workflow.git``` or download zip.
2. Open the directory ```workflow``` in the terminal.
3. Install composer dependencies ```composer install```.
4. Make a new ```.env``` file and copy ```.env.example``` file to ```.env```.
5. Set the database configuration in the ``.env`` like ```DB_DATABASE, DB_USERNAME and DB_PASSWORD```.
7. Generate key: ```php artisan key:generate```.
8. Run ```php artisan migrate:refresh --seed```
9. Run ```npm i``` and ```npm build```.
10. Run the application: ```php artisan serve```.
    



## Technology Stack 

- [PHP 8.1](https://www.php.net/) - A popular general-purpose scripting language for web development.
- [Laravel 10](https://laravel.com/docs/10.x) - PHP fullstack web application framework.
- [Sanctum 3.2](https://laravel.com/docs/10.x/sanctum) - featherweight token based authentication system for SPAs.
- [MySQL 8.0](https://dev.mysql.com/doc/relnotes/mysql/8.0/en/) - The world's most popular open source relational database.
- [Feather Icons](https://feathericons.com) - Simply beautiful open source SVG icons.

