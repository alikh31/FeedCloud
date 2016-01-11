 Reflective Essay 

# Introduction 

This document explains the methodology used for implementing this project as well as comparing the implementation with the initial goals that was set at the beginning. 

This project is a prototype web application based on YII library, written in PHP which help the student to add information about the feedbacks and their analysis over their feedbacks. The prototype application does not have the feature to extract the student information for the personal tutors although it should be included in the final product.

# Objectives of the application

Development of the following application starts with the below functional and non-functional requirements:

- Having the ability for creating a new user in the application, the password needs to be stored as SHA215 and salted so the data base is not storing the password itself
- After login the user should be able to create a new academic year adding module to it and define feedback to each module, this information needs to be stored in the database appropriate with the name of the user who creating them with the access control over not serving information to the users who does not have ownership.
- User should be able to add SWOT analysis and action plan to the feedback, it's been assumed in this application that the user can add multiple feedbacks and SWOT analysis to a feedback.
- All entities should be editable and removable.
- The application should be able to run in different platforms, mobiles and devices.

# Database

## Design

In order to fulfill the requirement of the project database scheme has designed having seven tables demonstrated as following:

### User Table

Holding information about the users in the system, user name, password, name. this table does not have a foreign key to any other tables. There is an Admin user in the table which have administration access to all the information in web application.

### Academic Year Table

Holding information about the academic years, having a foreign key to the student id which is the owner of the academic year, also hold the information about the year and title of the academic year.

### Module Table

Information about the Modules define in the system, have a single foreign key to the academic year which each row belongs to, also holding a column for the title of the module.

### Feedback table 

Holding information about the feedback and the feedback files, having a foreign key to the Module owning each row,

### SWOT Type table

Has an entity of type which includes, strength weakness, opportunities and treats.

### SWOT Analysis table 

Having two foreign key to SWOT type and the feedback, holding the information about the analysis description.

### Action plan table

Has foreign key to the feedback as well and holds the information about the action plan 


## Implementation

For the implementation of the database SQLlite has been chosen for few reasons, first this is the prototype of the application so the data coming to the data base are limited having file base database means the deployment procedure can be highly simplified and database is portable easily in case the environment needs MySql and SqlServer.

# Back-end design and implementation

The model used to implement this project is MVC, model views and controllers. this is the model that Yii has used to render the pages, it means there are models on top of the database layer which are responsible to accessing the data from database and controllers are the brain of the application controlling the access and preparing the information base on the request and delivering them into the views or requester, views are the part that user interacts with and asks the controllers about the needed information.

The access control for all information has been set to have delete, edit and view access just for the owner of the data and administrator, administrator has a different view when log in which gives all the information plus the right to delete and edit the data. Administrator user in application is accessible by user name `admin` and password `alikh`.

When users logs in can see all the information about academic year, module, feed back and analysis all in the dashboard, also there is an navigator available to explore through the data, all the entities have and hyper link to delete and edit that information. 

# Front-end design and implementation

For having an easy to implement and compatible with different platform front-end, twitter bootstrap has been used, the library is widely using in the industry, also for logos ans font library called `font-awesome ` has used.

In the desktop view of the application the navigation is placed in the left side of the view for can be scrolled down if there are too many items in the menu, also all the menus, academic year, module, are expanded by default for the convenience of use.

In case of use in mobile device the menu is hidden by default and user needs to click to have the menu expanded, due to the small size of the screen, for different type of SWOT analysis different color has chosen so give a better user experience, the whole design has been as simple as possible for ease of use.

# Conclusion

Final product of this projects meets all its initial objectives, can handle multiple users in a same time with acceptable performance. it is suggested in case of expanding this project the SQLlite database would be migrated to MySQL which can handle bigger data and is more scalable using clustering.

The framework chosen for this project was outdated, it is also suggested to update the framework to version 2.0.