CREATE TABLE users (
    id int AUTO_INCREMENT,
    username varchar(255),
    first_name varchar(255),
    last_name varchar(255),
    email varchar(255),
    password varchar(255),
    profile_pic varchar(255),
    created_at datetime,
    PRIMARY KEY (id)
);