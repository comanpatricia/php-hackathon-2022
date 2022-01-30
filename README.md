# PHP Hackathon
This document has the purpose of summarizing the main functionalities your application managed to achieve from a technical perspective. Feel free to extend this template to meet your needs and also choose any approach you want for documenting your solution.

## Problem statement
*Congratulations, you have been chosen to handle the new client that has just signed up with us.  You are part of the software engineering team that has to build a solution for the new client’s business.
Now let’s see what this business is about: the client’s idea is to build a health center platform (the building is already there) that allows the booking of sport programmes (pilates, kangoo jumps), from here referred to simply as programmes. The main difference from her competitors is that she wants to make them accessible through other applications that already have a user base, such as maybe Facebook, Strava, Suunto or any custom application that wants to encourage their users to practice sport. This means they need to be able to integrate our client’s product into their own.
The team has decided that the best solution would be a REST API that could be integrated by those other platforms and that the application does not need a dedicated frontend (no html, css, yeeey!). After an initial discussion with the client, you know that the main responsibility of the API is to allow users to register to an existing programme and allow admins to create and delete programmes.
When creating programmes, admins need to provide a time interval (starting date and time and ending date and time), a maximum number of allowed participants (users that have registered to the programme) and a room in which the programme will take place.
Programmes need to be assigned a room within the health center. Each room can facilitate one or more programme types. The list of rooms and programme types can be fixed, with no possibility to add rooms or new types in the system. The api does not need to support CRUD operations on them.
All the programmes in the health center need to fully fit inside the daily schedule. This means that the same room cannot be used at the same time for separate programmes (a.k.a two programmes cannot use the same room at the same time). Also the same user cannot register to more than one programme in the same time interval (if kangoo jumps takes place from 10 to 12, she cannot participate in pilates from 11 to 13) even if the programmes are in different rooms. You also need to make sure that a user does not register to programmes that exceed the number of allowed maximum users.
Authentication is not an issue. It’s not required for users, as they can be registered into the system only with the (valid!) CNP. A list of admins can be hardcoded in the system and each can have a random string token that they would need to send as a request header in order for the application to know that specific request was made by an admin and the api was not abused by a bad actor. (for the purpose of this exercise, we won’t focus on security, but be aware this is a bad solution, do not try in production!)
You have estimated it takes 4 weeks to build this solution. You have 3 days. Good luck!*

## Technical documentation
### Data and Domain model
The main entities: 
- admins (id, admin_username, token)
- appointments (id, cnp, room_number, time)
- programmes (id_progr, id_progr_type, maximum, rooms_id, start_time, end_time)
- progr_types (id_type, type)
- rooms (id_room, room_number, progr_type)
- users (id_type, type)

Relationships:
- user.cnp is foreign key for appointments.cnp
- rooms.room_number is foreign key for appointments.room_number
- progr_types.id_type is foreign key for programmes.id_progr_type
- rooms.id_room is foreign key for programmes.rooms_id
- progr_types.id_type is foreign key for rooms.progr_type
 
Mapping: see database.sql file for details and constraints

### Application architecture
I didn't use a specific architecture, neither laravel or symphony

###  Implementation
##### Functionalities

- [ ] Brew coffee \ I hope I won't surprise you but no coffee these days :(
- [x] Create programme \ you have to introduce the id_progr_type, the maximum, the rooms_id, the start_time, the end_time, the uniq identifier (primary key id_progr) is introduced automatically. If it works the the app will show "Programme created!", else you will se the message "Programme not created!". You can check the database to see the result or can paste "localhost/hackathon/api/admin/read_programme.php" to show all the programmes inserted. 
- [x] Delete programme \ You have to select the id_progr of the program you want to delete. If it works the the app will show "Programme deleted!", else you will se the message "Programme not deleted!". You can check the db to see the result.
- [x] Update programme \ Go update or change the programmes stored into database just by typing all the data you want to store a certain id.
- [X] See the users list \ You can see all the informations about users.
- [X] Admin create an user \ You can create an account just by using cnp with an empty value. This is used to store cnps which will be lately used by users when login.
- [X] Insert an admin \ You have to insert the admin_username which will automatically be hashed with md5 into database and the token which must be empty. While inserted the token get an random token which will be used in header when an admin wants to login.
- [X] See the admins list \ All you can see will be the hashed values from admin username and random values for the tokens.
- [X] See the rooms \ You can see the rooms and the type of programme which every room can facilitate. You can not add, change or modify the rooms.
- [X] See the types of programmes \ You can see the all the types of programmes. You can not add, change or modify these types.
- [ ] Book a programme \ not yet :)


##### Business rules
Validations:
- data type check: the unique identifiers; the fields that store the cnp, the room number, the maximum of participants are numeric data
- code check: the cnp introduced when register to a program must already be stored in the users tabel
- range check: the maximum of participants for each programme can not be exceeded
- format check: when storing all the fields about timing (start_time, end_time, time)
- uniqueness check: the primary key of every entity 

##### 3rd party libraries (if applicable)
Sorry, next time maybe.

##### Environment
| Name | Choice |
| ------ | ------ |
| Operating system (OS) | Windows 10 |
| Database  | MySQL 5.7.31|
| Web server| Chrome |
| PHP | 7.3.21 |
| IDE | Visual Studio Code |

### Testing
phpmyadmin, postman, wamp64

## Feedback
1. Have you ever been involved in a similar experience? If so, how was this one different? No, I haven't. Being my first time in this kind of "hackathon" I can simply say that I didn't knew until now how much I can learn in three days.
2. Do you think this type of selection process is suitable for you? Yes. You can see what I achieved in only three days while talking about APIs because I never used them before.
3. What's your opinion about the complexity of the requirements? To be honest, it is more complex than expected.
4. What did you enjoy the most? The chance that I could participate. Experience never goes down.
5. What was the most challenging part of this anti hackathon? The fact that after I read the requirements, I thought that I will have nothing to upload/push.
6. Do you think the time limit was suitable for the requirements? Of course not. As you mentioned, I estimated it will take 4 weeks to build the solution. :)
7. Did you find the resources you were sent on your email useful? Yes, everything on point.
8. Is there anything you would like to improve to your current implementation? My skills.
9. What would you change regarding this anti hackathon? I was thinking about a certain requirement meaning it could contain exactly the entities you want us to create, because I think it is "munca de chinez batran" to decide what is really important to create and what is not.

