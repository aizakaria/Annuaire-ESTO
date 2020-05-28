/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  23/04/2020 20:19:47                      */
/*==============================================================*/


drop table if exists ADMIN;

drop table if exists CONCERNE;

drop table if exists ETUDIANT;

drop table if exists FILIERE;

drop table if exists UTILISATEUR;

/*==============================================================*/
/* Table : ADMIN                                                */
/*==============================================================*/
create table ADMIN
(
   ID_ADMIN             int not null AUTO_INCREMENT,
   LOGIN                varchar(100),
   PASSWORD             varchar(100),
   primary key (ID_ADMIN)
);

/*==============================================================*/
/* Table : CONCERNE                                             */
/*==============================================================*/
create table CONCERNE
(
   ID_UTILISATEUR       int not null,
   ID_FILIERE           int not null,
   primary key (ID_UTILISATEUR, ID_FILIERE)
);

/*==============================================================*/
/* Table : ETUDIANT                                             */
/*==============================================================*/
create table ETUDIANT
(
   ID_ETUDIANT          int not null AUTO_INCREMENT,
   ID_FILIERE           int not null,
   NOM_ETUDIANT         varchar(50),
   PRENOM_ETUDIANT      varchar(50),
   CNE_ETUDIANT         varchar(30),
   EMAIL_ETUDIANT       varchar(150),
   PASSWORDETUD         varchar(100),
   TELEPHONE_ETUDIANT   numeric(10,0),
   DESCRIPTION          char(30),
   primary key (ID_ETUDIANT)
);

/*==============================================================*/
/* Table : FILIERE                                              */
/*==============================================================*/
create table FILIERE
(
   ID_FILIERE           int not null AUTO_INCREMENT,
   NOM_FILIERE          varchar(150),
   primary key (ID_FILIERE)
);

/*==============================================================*/
/* Table : UTILISATEUR                                          */
/*==============================================================*/
create table UTILISATEUR
(
   ID_UTILISATEUR       int not null AUTO_INCREMENT,
   NOM_UTILISATEUR      char(50),
   PRENOM_UTILISATEUR   char(50),
   DESCRIPTION          char(30),
   EMAIL_UTILISATEUR    varchar(150),
   TELEPHONE_UTILISATEUR numeric(10,0),
   PPR                  varchar(100),
   PASSWORD_UTILIS      varchar(255),
   primary key (ID_UTILISATEUR)
);

alter table CONCERNE add constraint FK_CONCERNE foreign key (ID_FILIERE)
      references FILIERE (ID_FILIERE) on delete cascade on update cascade;

alter table CONCERNE add constraint FK_CONCERNE2 foreign key (ID_UTILISATEUR)
      references UTILISATEUR (ID_UTILISATEUR) on delete cascade on update cascade;

alter table ETUDIANT add constraint FK_APPARTIENT foreign key (ID_FILIERE)
      references FILIERE (ID_FILIERE) on delete cascade on update cascade;

