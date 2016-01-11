# Deployment Documentation

In this project all effort where gathered to have the deployment process as simple as possible, in order to deploy the following project two essential tools are needed:

- PHP server version 5.6
- GIT source code tool

For the purpose of this project a public repository in git hub website has been created with the following URL:

`https://github.com/alikh31/FeedCloud`

Which contains the following items:

- source code for the application 
- all the Javascript and CSS file needed as well as the picture used
- SQLlite DB
- YII framework that has been used
- Documentation for the project

There are two ways possible to get the code and run it on the server.

In the first method it is possible to make a SSH connection with the server machine in the terminal windows using a command like:

`ssh user@serverip`

then download the servers source code:

`wget https://github.com/alikh31/FeedCloud.git`

unzip the file into the web directory of PHP:

`unzip FeedCloud.zip /Application/PHP/www`

and application should be ready to run, using SQLlite had an major improvement on deployment procedure as there is no need to set up the data base, and it is ready to use after extracting the source code.



Second to install git shell in the server, redirect to PHP web root folder inside the git terminal, run the following code:

`git clone https://github.com/alikh31/FeedCloud.git`

which will save a clone of the application source inside the web root folder. The advantage of this method is if later on there are any change withing the code in the main repository there is no need to redeploy the server but to run the command for `git pull origin master`.

Its possible to add the URL of the application to Google search engine by going to `http://www.google.com/addurl/?continue=/addurl` and add the application's URL to the Google's database. it is also possible to add the site map to `http://www.google.com/webmasters/tools`.

