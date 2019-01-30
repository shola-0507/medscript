# medscript

Sample Web Application for Medscript built with Laravel backend, with the following features.

1) Ability to register company staffs with different roles (Administrator, Doctor, and Nurse)
User data to capture: First Name, Last Name, Email and Role 

2) Search and display results any staff, by any of the 4 criteria mentioned above (first name, last name, email or role)

3) Ability to only view staffs in each respective role I.E. give me all staffs with a doctor role.

4) Ability to view all created staffs in a tabular responsive format

5) Ability to view and update each staff’s profile.

6) Ability to delete any of the created staffs.

The application core functionality allows users register by filling in basic deatils and selecting a role- Nurse, Doctor or Administrator.

After running the migration tables, using php artisan migrate, visit the '/roles/create' endpoint in your browser to add new roles for users.

After which a user can register and have full access to other features on the app.

