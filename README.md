## Spis treści
* [Project description](#project-description)
* [Used technogies](#used-technologies)
* [ENV Symfony](#env-symfony)
* [Project start](#project-start)
* [Commands CLI](#commands-cli)

## Project description
Project was created for recruitment requests. In this application after fullfill form you are going to receive reaport about locals. 

### Used technogies 

- Php v. >=7.1.3
- MySQL 8.0.21
- MariaDB v. 10.5.4
- Symfony 4.4

#### ENV Symfony
It is necessary to connect to basic database.
  
DATABASE_URL="mysql://root:@127.0.0.1:3306/symfony"
    
#### Project start

Seed database using : php bin/console doctrine:fixtures:load

Form will display after enter on front page passing application url.


    Readme created 2021-12-06
