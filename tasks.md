# Changes for Assignment 3
## General
[x] change SQL to prepared statements  
[x] if user is not logged in and tries to access any other page, redirect to login.php  

## index.php
[x] if user is logged in, show last 10 posts of user  
[x] if user is not logged in, redirect to log in page  

## profile.php
[x] if user is logged in, retrieve and display user info  
[x] if user is not logged in, redirect to log in page  

## register.php
[x] add 'password' and 'confirm password' fields (error if they do not match)  
[x] store password in a table named 'users_passwords'  
[] check user input with JS before sending to server  
[] check if new user's email exists in the database (error if it does)  

## navigation menu
[x] if user is logged in, they will see index, profile and logout  
[x] if a user is not logged in, they will see index, login and register  
[] an admin will see index, profile, logout and userlist  

## users_passwords
[X] create a table with two columns, student_ID (primary key, integer length 10) and password (VARCHAR length 255 characters)  

## login.php
[x] when loggin in, check if email and password match  
[x] if successful, redirect to index.php  
[x] notify user if they do not have an account (prompt to visit register.php)  

## users_permissions
[] create a table with two columns, student_ID (primary key, integer length 10) and account_type (integer of length 1) (default 1)  

## user_list.php
[] display student id, first name, last name, email and program of every user  
[] only admins will have access  