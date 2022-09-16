Wp-bulk-message-sender V1.1.1


REQUIREMENTS

in oreder to use this software the programs below need to be runing on computer

1-PHP
2-MySQL
3-NodeJS
4- ookamiiixd’s baileys-api



installization of required API:

git clone https://github.com/ookamiiixd/baileys-api.git
cd baileys-api
npm run start

after the install the baileys-api you need to extract the sources.zip to the folder where php files default running folder for xampp C:\xampp\htdocs\

after the extractation is complate copy the contents of the sql.txt and run it on sql it will set the database for usage.

edit the config.php file and it's ready to use

open http://localhost/Wp-bulk-message-sender/index.php and product is ready for usage.

USAGE:
first of all start the baileys-api
in index page there is a CREATE SESSION button click that and create session
than goto persons page add some person with name than goto groups and add groups and edit groups(group-person)
than (optionally) goto the documents page and add some images (it can be used to send messages with)
finally goto send message page it sends messages to the group of numbers optionally with or withouth images

New relase notes :

in order to use the software config.php must be edited.
In index page there is a new button which is creating a session
