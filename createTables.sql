drop table ChildInfo;
drop table AccountData;
create or replace table AccountData(
    idAccount int not null auto_increment,
    username varchar(30) not null,
    password varchar(30) not null,
    primary key (idAccount)
);

create or replace table ChildInfo(
    idAccount int not null,
    idInfo int not null auto_increment,
    nameChild varchar(30) not null,
    surnameChild varchar(30) not null,
    dateOfBirth date not null,
    sex varchar(10) not null,
    email varchar(30) not null,
    weight varchar(11) not null,
    height varchar(11) not null,
    primary key (idInfo),
    foreign key (idAccount) references AccountData(idAccount)
);