# Online Voting System
# Introduction
The Online Voting System is a web-based application that allows users to register, log in, and participate in voting. It includes separate sections for voters and administrators to manage the election process.

# Features
User Registration and Login.

Admin Login.

Voter and Admin Sections.

Secure Password Handling.

Database Connectivity.

# Data Base
In database make Voting_db database to store the users info, admin datails, elections details, voting details, candidates details, result of voting.
In the Voting database make tables

Tables:

![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/37e0499c-5a26-463e-9c19-b9721bc24e32)

Admin Panel Table: Make a adminPanel table with attributes admin_no(integer)(Auto Increment), admin_id(varchar), admin_password(varchar).
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/e5fa2bfc-b761-4976-a19a-d28dd1e0c3e5)

User Details table: Make a usersreg_db table with attributes user_id(integer)(Auto Increment), user_name(varchar), users_email(varchar), users_gender(varchar), users_district(varchar), users_password(varchar).
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/5dd6d15b-a447-4d52-aa4d-aa7f5fd63961)

Id Request table: In this users have to send a request to generate id for cast vote. Admin first allow the user to cast vote by sending id.
Make a id_request_tbl table with attributes id(integer)(Auto Increment), users_name(varchar), users_email(varchar), users_district(varchar). 
![image](https://github.com/Modak-NeelKamal/Online_Voting_System/assets/160403495/d913b1ba-3284-47d8-9bdc-f91d9bf91c49)
