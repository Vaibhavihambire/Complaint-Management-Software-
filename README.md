# Complaint Management System for Companies/Industries

## Project Overview

The **Complaint Management System** is a user-friendly web platform that enables customers, employees, and stakeholders to submit, track, and resolve complaints. It enhances corporate transparency, improves customer engagement, and helps manage complaints efficiently with an admin panel and secure database.

## Technologies Used
- **Backend**: PHP (Yii2 Framework)
- **Frontend**: HTML, CSS, JavaScript (jQuery)
- **Database**: MySQL (XAMPP)
- **Web Server**: Apache (via XAMPP)

## Installation
Follow these steps to set up the project locally:

1. Clone the repository:
   ```bash
   git clone https://github.com/Vaibhavihambire/complaint-management-system.git
   ```

2. Install PHP from the official website: [PHP](https://www.php.net/)

3. Install XAMPP and start Apache and MySQL services.

4. Navigate to the project directory and install Yii2 dependencies:
   ```bash
   composer install
   ```
   Note : Make sure this project is in xampp/htdocs/this_project_folder 

5. Navigate to `localhost/phpmyadmin` on browser, create a database named `cms`, and import the `cms.sql` file from the `/database` folder.

6. Run the project in your browser:
   ```
   http://localhost/cms/web/
   ```

## Usage
- **User Registration/Login**: Users can log in, submit, and track complaints.
- **Admin Access**: Admins can log in to manage complaints, assign roles (engineers, employees, admins), and track complaint status.
- **Engineer Role**: Engineers can log in, take action on complaints and manage them.

## Contact
If you have any questions or need further assistance, feel free to reach out:
- **Email**: hambirevaibhavi21@gmail.com
- **GitHub**: Vaibhavihambire
