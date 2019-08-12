
    
 CREATE TABLE users(
    userid int(256) not null PRIMARY KEY AUTO_INCREMENT,
    userfirst varchar(256) not null,
    userlast varchar(256) not null,
    username varchar(256) not null,
    useremail varchar(256) not null,
    mobileno number(255) not null,
    userpwd varchar(256) not null
);

   
 CREATE TABLE product(
    productid int(255) not null PRIMARY KEY AUTO_INCREMENT,
    userid int(255) not null,
    pdname varchar(256) not null,
    modelnum varchar(256) not null,
    pdtype varchar(256) not null,
    pdyop varchar(256) not null,
    pdwarranty number(255) not null,
    pdcost number(255) not null,
    pdmax number(25) not null,
    pddes varchar(256) not null,
    pdstatus varchar(25) not null
);