# Online Voting System
# Introduction
The Online Voting System is a web-based application that allows users to register, log in, and participate in voting. It includes separate sections for voters and administrators to manage the election process.
# Features
User Registration and Login.

Admin Login.

Voter and Admin Sections.

Secure Password Handling.

Database Connectivity.

# Local Host Server 

# Installation
1. Install a Local Server Environment
Download and install XAMPP.
2. Place the Project in the Server Directory :
   C:\xampp\htdocs\Online-Voting-System (repository)
3. Configure the Database:
   
   Open phpMyAdmin from your XAMPP/WAMP control panel.
   Create a new database, e.g., project_db.
   Import the database dump file:
   Locate the .sql file in the project directory.
   Use the Import feature in phpMyAdmin to upload the file.
   Update the database configuration in the project:
   Open the configuration file (e.g., config.php or .env) in the project and set the database credentials:
   php
   Copy code
   $db_host = 'localhost';
   $db_user = 'root'; // Default for XAMPP/WAMP
   $db_password = ''; // Default is empty
   $db_name = 'project_db';

4. Start the Server
   Launch the XAMPP control panel.
   Start the Apache and MySQL services.
   Open a browser and navigate to:
   
   http://localhost/your-repository

# Application
Users and Administration
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/59c21a8e-621c-4e2f-a642-52c276da35da)

# Registration :
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/aee82f81-4e91-4016-8ef9-e59002a4b335)

# Login :
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/e02d7088-7e23-49be-9b73-9ce048e2fb0d)

# About :
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/15f234ad-90ea-453d-906d-d4de65fcec51)

# Developers Details :
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/5fc2e02a-87aa-4893-9d3b-7049c022524f)

# Users Application :
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/11f9aa0a-da06-4120-b2a4-5866d1b78e3f)
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/48312e6f-0b6a-4149-aae5-4342ca1fe796)

# ID Generator :
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/b45e75d2-eb9a-4d9c-8aeb-e6d8fed4c1a0)
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/fc7f56b3-9238-4c29-9691-636b1e722fc7)
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/0f56af5a-0766-4676-9e73-9895f85b3e58)

# Election :
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/db2236db-1e44-430a-91b2-240ab3d80eb6)

# Vote :
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/659b62f0-0890-444f-a51e-1090ccd4f4aa)
Cast your Vote :
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/7316f2b4-06dc-46b8-ba53-ab405b4cdcca)

# Result of Voting :
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/facb4bce-a49d-49a2-80c2-bf0a244e4a21)

# Logout 

# Admin Panel :
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/5b8e9312-2d8d-49c6-a00d-894dacc8cd62)

# Admin Welcome Page :
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/54f45d97-ec81-4d67-87b3-12e6d1c9e8dd)

# User Id Request :
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/3c25c67d-d666-4041-acbb-e316eabcf423)

# Add Election :
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/cc1748a5-b6b7-4594-9702-9e70784e213c)

# Add Candidate :
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/07d1d022-969d-4b34-a8f2-1df938844da5)

# Add Candidate Details : 
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/1f9f8f7d-0103-4e17-b1ff-38b90b793ffa)

# Data Base
 
# php my admin Database : 

In database make Voting_db database to store the users info, admin datails, elections details, voting details, candidates details, result of voting.
In the Voting database make tables

# Tables :

![image](https://github.com/user-attachments/assets/1abdc40b-645b-4641-937f-13ef3d2090ca)

Admin Panel Table : Make a adminPanel table with attributes admin_no(integer)(Auto Increment), admin_id(varchar), admin_password(varchar).

User Details table : Make a usersreg_db table with attributes user_id(integer)(Auto Increment), user_name(varchar), users_email(varchar), users_gender(varchar), users_district(varchar), users_password(varchar).


Id Request table : In this users have to send a request to generate id for cast vote. Admin first allow the user to cast vote by sending id.
Make a id_request_tbl table with attributes id(integer)(Auto Increment), users_name(varchar), users_email(varchar), users_district(varchar). 


In generated id store in User Registration table with a added attribute usergenaratedid(varchar) will display in Id generated section in user application

election Detail Table : Make a table name elections_tbl. Admin add the election details for user to vote with attributes election_id(integer)(Auto Increment), elections_name(varchar), elections_start_date(date), elections_end_date(varchar) :


Candidates Details Table : Make a table name candidates_tbl. Cadidates details are stored by admin that users are voted for the election name with attributes candidates_id(integer)(Auto Increment), candidates_name(varchar), election_name(varchar), total_votes(integer) :


Result table: Make a table name results_tbl. User votes are stored to in table with attributes id(integer)(Auto Increment), users_email(varchar), candidates_details(varchar), elections_name(varchar) :

