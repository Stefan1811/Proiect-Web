drop database Web;
create database Web;

create or replace table AccountParent(
    email varchar(30) not null,
    password varchar(30) not null,
    firstName varchar(30),
    lastName varchar(30),
    uuid varchar(36) not null,
    primary key (uuid)
);

create or replace table AccountChild(
    firstName varchar(30) not null,
    lastName varchar(30) not null,
    password varchar(30) not null,
    dateOfBirth date not null,
    sex varchar(10) not null,
    weight varchar(11) not null,
    height varchar(11) not null,
    uuid varchar(36) not null,
    primary key (uuid)
);

create or replace table medicalHistory(
    id int not null auto_increment,
    visitDescription varchar(1000),
    timeline boolean default false,
    uuid varchar(36) not null,
    uuidChild varchar(36) not null,
    dataInsert date,
    foreign key (uuidChild) references AccountChild(uuid),
    primary key (id)
);


create or replace table savedImages(
    id int not null auto_increment,
    uuidChild varchar(36) not null,
    imageName varchar(100),
    imagePath varchar(100),
    uuid varchar(36) not null,
    timeline boolean default false,
    dataInsert date,
    primary key (id),
    foreign key (uuidChild) references AccountChild(uuid)
);

create or replace table istoricHranire(
    id int not null auto_increment,
    masa varchar(100),
    dataHranire datetime,
    uuidChild varchar(36) not null,
    uuid varchar(36) not null,
    primary key (id),
    foreign key (uuidChild) references AccountChild(uuid)
);

create or replace table oreDeSomn(
    id int not null auto_increment,
    numarOreSomn int,
    dataSomn date,
    uuidChild varchar(36) not null,
    uuid varchar(36) not null,
    primary key (id),
    foreign key (uuidChild) references AccountChild(uuid)
);

create or replace table junctionParentChild(
    id int not null auto_increment,
    uuidParent varchar(36) not null,
    uuidChild varchar(36) not null,
    primary key (id),
    foreign key (uuidParent) references AccountParent(uuid),
    foreign key (uuidChild) references AccountChild(uuid)
);


create or replace table junctionFriends(
    id int not null auto_increment,
    uuidChild1 varchar(36) not null,
    uuidChild2 varchar(36) not null,
    relatie varchar(30) not null,
    primary key (id),
    foreign key (uuidChild1) references AccountChild(uuid),
    foreign key (uuidChild2) references AccountChild(uuid)
);


CREATE TRIGGER before_insert_parent
  BEFORE INSERT ON  AccountParent
  FOR EACH ROW
  SET new.uuid = uuid();

CREATE TRIGGER before_insert_child
  BEFORE INSERT ON  AccountChild
  FOR EACH ROW
  SET new.uuid = uuid();

CREATE TRIGGER before_insert_image
  BEFORE INSERT ON  savedImages
  FOR EACH ROW
  SET new.uuid = uuid(),
   new.dataInsert = now();

CREATE TRIGGER before_insert_hranire
  BEFORE INSERT ON  istoricHranire
  FOR EACH ROW
  SET new.uuid = uuid(),
  new.dataHranire = now(); 

CREATE TRIGGER before_insert_medical
  BEFORE INSERT ON  medicalHistory
  FOR EACH ROW
  SET new.uuid = uuid(),
  new.dataInsert = now();

create trigger before_insert_somn
    before insert on oreDeSomn
    for each ROw
    set new.uuid = uuid(),
    new.dataSomn = now();

