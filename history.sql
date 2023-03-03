/*
This file is used to keep an history of ALL sql modification
faut creer une table projet avant en se connectant au 127.0.0.1:55432 en utilisant root:password
*/
use projet;

create table categories
(
    productCategory int auto_increment
        primary key,
    catName         varchar(255) not null
);

create table articles
(
    shoeId               varchar(128) not null
        primary key,
    brand                varchar(128) not null,
    category             varchar(128) not null,
    colorway             varchar(255) null,
    `condition`          varchar(128) null,
    countryOfManufacture varchar(128) null,
    description          text         null,
    gender               varchar(128) null,
    imageUrl             text         null,
    name                 varchar(128) null,
    productCategory      int          not null,
    releaseDate          date         null,
    retailPrice          int          null,
    shoe                 varchar(128) null,
    shortDescription     text         null,
    title                varchar(255) null,
    tags                 varchar(255) null,
    constraint articles_categories_null_fk
        foreign key (productCategory) references categories (productCategory)
);

create table stocks
(
    id       int auto_increment
        primary key,
    shoeId   varchar(128) null,
    shoeSize int          null,
    quantity int          null,
    constraint stocks_articles_null_fk
        foreign key (shoeId) references articles (shoeId)
);


create table projet.users
(
    id        int auto_increment,
    username  varchar(255) not null,
    email     varchar(255) not null,
    password  varchar(255) not null,
    firstName varchar(255) not null,
    lastName  varchar(255) not null,
    zipcode   varchar(16)  not null,
    city      varchar(255) not null,
    address   varchar(255) not null,
    role      bool,
    constraint users_pk
        primary key (id)
);
