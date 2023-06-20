drop database generique_heritage_sony_music;
drop database if exists heritage_sony_music;
create database heritage_sony_music;
use heritage_sony_music;


create table user(
    iduser int(3) not null auto_increment,
    nom varchar(100),
    email varchar(255),
    mdp varchar(255),
    telephone varchar(50),
    role enum("admin", "artiste", "partenaire", "agent", "label", "dirigeant"),
    primary key (iduser)
);

create table dirigeant(
    iduser int(3) not null,
    fonction varchar(100) not null,
    primary key(iduser),
    foreign key(iduser) references user(iduser)
);

drop procedure if exists insertDirigeant;
delimiter $
create procedure insertDirigeant(IN p_nom varchar(100), IN p_email varchar(250), IN p_mdp varchar(250), p_telephone varchar(50), IN p_role varchar(50) , IN p_fonction varchar(100)) 
Begin 
        Declare p_iduser int(3); 
        
        insert into user values (null, p_nom, p_email, p_mdp, p_telephone, p_role); 
        select iduser into p_iduser 
        from user 
        where nom = p_nom and email=p_email and mdp=p_mdp and telephone =p_telephone and role= p_role; 
        insert into dirigeant values (p_iduser, p_fonction);
End $
delimiter ;


create table label(
    iduser int(3) not null,
    adresse varchar(250),
    nbEmployes int(6),
    primary key (iduser),
    foreign key (iduser) references user(iduser)
);


create table partenaire(
    iduser int(3) not null auto_increment,
    adresse varchar(250),
    sigle varchar(50),
    url varchar(250),
    nbSites int(6),
    statut enum("physique", "digital"),
    primary key (iduser),
    foreign key (iduser) references user(iduser)
);

create table agent(
    iduser int(3) not null,
    prenom varchar(100),
    dateEmbauche date,
    idlabel int(3) not null,
    primary key (iduser),
    foreign key (idlabel) references label(iduser),
    foreign key (iduser) references user(iduser)
);

create table artiste(
    iduser int(3) not null,
    prenom varchar(100),
    nomDeScene varchar(50),
    typePrincipal varchar(50),
    idagent int(3) not null,
    images varchar(250),
    primary key (iduser),
    foreign key (idagent) references agent(iduser),
    foreign key (iduser) references user(iduser)
);

create table album(
    idalbum int(3) not null auto_increment,
    nom varchar(50),
    anneeSortie int,
    idartiste int(3) not null,
    primary key (idalbum),
    foreign key (idartiste) references artiste(iduser)
);

create table categorie(
    idcategorie int(3) not null auto_increment,
    type varchar(50),
    primary key (idcategorie)
);

create table chanson(
    idchanson int(3) not null auto_increment,
    titre varchar(50),
    sortie date,
    duree varchar(50),
    idcategorie int(3) not null,
    idalbum int(3) not null,
    primary key(idchanson),
    foreign key (idcategorie) references categorie(idcategorie),
    foreign key (idalbum) references album(idalbum)
);

create table vente(
    idvente int(3) not null auto_increment,
    nbVente int(6) not null,
    prixParVente float,
    date date,
    type enum("physique", "digitale"),
    idpartenaire int(3) not null,
    idalbum int(3) not null,
    primary key (idvente),
    foreign key (idpartenaire) references partenaire(iduser),
    foreign key (idalbum) references album(idalbum)
);

    --Procédures d'insert
----Insertion de label
drop procedure if exists insertLabel;
delimiter $
create procedure insertLabel(IN p_nom varchar(100), IN p_email varchar(250), IN p_mdp varchar(250), p_telephone varchar(50), IN p_role varchar(50) , IN p_adresse varchar(250), IN p_nbEmployes int(6)) 
Begin 
        Declare p_iduser int(3); 
        
        insert into user values (null, p_nom, p_email, p_mdp, p_telephone, p_role); 
        select iduser into p_iduser 
        from user 
        where nom = p_nom and email=p_email and mdp=p_mdp and telephone =p_telephone and role= p_role; 
        insert into label values (p_iduser, p_adresse, p_nbEmployes);
End $
delimiter ; 


----Insertion de Partenaire
drop procedure if exists insertPartenaire;
delimiter $
create procedure insertPartenaire (IN p_nom varchar(100), IN p_email varchar(250), IN p_mdp varchar(250), p_telephone varchar(50), IN p_role varchar(50) , IN p_adresse varchar(250), IN p_sigle varchar(50), IN p_url varchar(250), p_nbSites int(6), p_statut varchar(50)) 
Begin 
        Declare p_iduser int(3); 
        
        insert into user values (null, p_nom, p_email, p_mdp, p_telephone, p_role); 
        select iduser into p_iduser 
        from user 
        where nom = p_nom and email=p_email and telephone =p_telephone and role= p_role; 
        insert into partenaire values (p_iduser, p_adresse, p_sigle, p_url, p_nbSites, p_statut);
End $
delimiter ;
----Insertion d'Agent
drop procedure if exists insertAgent;

delimiter $
create procedure insertAgent (IN p_nom varchar(100), IN p_email varchar(250), IN p_mdp varchar(250), p_telephone varchar(50), IN p_role varchar(50) , IN p_prenom varchar(250), IN p_dateEmbauche date, IN p_idlabel int(3)) 
Begin 
        Declare p_iduser int(3); 
        
        insert into user values (null, p_nom, p_email, p_mdp, p_telephone, p_role); 
        select iduser into p_iduser 
        from user 
        where nom = p_nom and email=p_email and telephone =p_telephone and role= p_role; 
        insert into agent values (p_iduser, p_prenom, p_dateEmbauche, p_idlabel);
End $
delimiter  ;

----Insertion d'Artiste
drop procedure if exists insertArtiste;

delimiter $
create procedure insertArtiste (IN p_nom varchar(100), IN p_email varchar(250), IN p_mdp varchar(250), p_telephone varchar(50), IN p_role varchar(50) , IN p_prenom varchar(50), IN p_nomDeScene varchar(50), IN p_typePrincipal varchar(50), IN p_idagent int(3), IN p_images varchar(250)) 
Begin 
        Declare p_iduser int(3); 
        
        insert into user values (null, p_nom, p_email, p_mdp, p_telephone, p_role); 
        select iduser into p_iduser 
        from user 
        where nom = p_nom and email=p_email and telephone =p_telephone and role= p_role; 
        insert into artiste values (p_iduser, p_prenom, p_nomDeScene, p_typePrincipal, p_idagent, p_images);
End $
delimiter  ;
    --Procédures de suppression
----Suppression de Label
drop procedure if exists deleteLabel;
delimiter $
create procedure deleteLabel(IN p_iduser int(3)) 
Begin 
        delete from label where iduser = p_iduser ;     
        delete from user where iduser = p_iduser;   
End $
delimiter ;

----Suppression de Partenaire
drop procedure if exists deletePartenaire;
delimiter $
create procedure deletePartenaire(IN p_iduser int(3)) 
Begin 
        delete from partenaire where iduser = p_iduser ;     
        delete from user where iduser = p_iduser;   
End $
delimiter ;

----Suppression d'Agent
drop procedure if exists deleteAgent;
delimiter $
create procedure deleteAgent(IN p_iduser int(3)) 
Begin 
        delete from agent where iduser = p_iduser ;     
        delete from user where iduser = p_iduser;   
End $
delimiter ;

----Suppression d'Artiste
drop procedure if exists deleteArtiste;
delimiter $
create procedure deleteArtiste(IN p_iduser int(3)) 
Begin 
        delete from artiste where iduser = p_iduser ;     
        delete from user where iduser = p_iduser;   
End $
delimiter ;

    --Procédures d'édition
----Edition de Label
drop procedure if exists updateLabel;
delimiter $
create procedure updateLabel(IN p_iduser int(3), IN p_nom varchar(100), IN p_email varchar(250), IN p_mdp varchar(250), p_telephone varchar(50), IN p_role varchar(50) , IN p_adresse varchar(250), IN p_nbEmployes int(6))
Begin
    update user set nom = p_nom, email = p_email, mdp=p_mdp, telephone = p_telephone, role =p_role 
        where iduser = p_iduser ; 

    update label set adresse = p_adresse, nbEmployes= p_nbEmployes where iduser = p_iduser ;
End $
delimiter ;

----Edition de Partenaire
drop procedure if exists updatePartenaire;
delimiter $
create procedure updatePartenaire(IN p_iduser int(3), IN p_nom varchar(100), IN p_email varchar(250), IN p_mdp varchar(250), p_telephone varchar(50), IN p_role varchar(50) , IN p_adresse varchar(250), IN p_sigle varchar(50), IN p_url varchar(250), p_nbSites int(6), p_statut varchar(50))
Begin
    update user set nom = p_nom, email = p_email, mdp=p_mdp, telephone = p_telephone, role =p_role 
        where iduser = p_iduser ; 

    update partenaire set adresse = p_adresse, sigle= p_sigle, url= p_url, nbSites= p_nbSites, statut= p_statut where iduser = p_iduser ;
End $
delimiter ;

----Edition d'Agent
drop procedure if exists updateAgent;
delimiter $
create procedure updateAgent(IN p_iduser int(3), IN p_nom varchar(100), IN p_email varchar(250), IN p_mdp varchar(250), p_telephone varchar(50), IN p_role varchar(50) , IN p_prenom varchar(250), IN p_dateEmbauche date, IN p_idlabel int(3))
Begin
    update user set nom = p_nom, email = p_email, mdp = p_mdp, telephone = p_telephone, role =p_role 
        where iduser = p_iduser ; 

    update agent set prenom= p_prenom, dateEmbauche= p_dateEmbauche, idlabel= p_idlabel where iduser = p_iduser ;
End $
delimiter ;

----Edition d'Artiste
drop procedure if exists updateArtiste;
delimiter $
create procedure updateArtiste(IN p_iduser int(3), IN p_nom varchar(100), IN p_email varchar(250), IN p_mdp varchar(50), p_telephone varchar(50), IN p_role varchar(50) , IN p_prenom varchar(50), IN p_nomDeScene varchar(50), IN p_typePrincipal varchar(50), IN p_idagent int(3), IN p_images varchar(250))
Begin
    update user set nom = p_nom, email = p_email, mdp = p_mdp, telephone = p_telephone, role =p_role 
        where iduser = p_iduser ; 

    update artiste set prenom= p_prenom, nomDeScene= p_nomDeScene, typePrincipal= p_typePrincipal, idagent= p_idagent, images =p_images where iduser = p_iduser ;
End $
delimiter ;


    --Vues des Procédures
--Label
drop view if exists vueLabels;
create view vueLabels as (
	select u.*, l.adresse, l.nbEmployes from user u, label l where u.iduser=l.iduser
);

--Partenaire
drop view if exists vuePartenaires;
create view vuePartenaires as (
	select u.*, p.adresse, p.sigle, p.url, p.nbSites, p.statut from user u, partenaire p where u.iduser=p.iduser
);

--Agent
drop view if exists vueAgents;
create view vueAgents as (
	select u.*, a.prenom, a.dateEmbauche, a.idlabel from user u, agent a where u.iduser=a.iduser
);

--Artiste
drop view if exists vueArtistes;
create view vueArtistes as (
	select u.*, a.prenom, a.nomDeScene, a.typePrincipal, a.idagent, a.images from user u, artiste a where u.iduser=a.iduser
);


/*Création d'un admin, cet utilisateur n'existe que dans la table User*/
insert into user values(null, "Admin", "admin@gmail.com", "123", "0668571291", "admin");
/*Création d'une catégorie*/
insert into categorie values (null, "RAP FR"), (null, "POP");

/*Création de chaque User*/
call insertLabel("DUGIMONT", "pdugimont@gmail.com", "12345", "0668571291", "label", "Vitry-sur-Seine", 250);
call insertPartenaire("CHARDON", "jchardon@gmail.com", "234", "76493475", "partenaire", "Paris", "jc", "juliachardon.fr", 10, "physique");
call insertAgent("Dugimont", "garancedugimont@gmail.com", "1234", "0668571291", "agent", "Garance", "2022-12-12", 2);
call insertArtiste("MENDY", "dmendy@gmail.com", "4567", "875745745", "artiste", "David", "DaveLeBg", "Rap FR", 4, "DaveLeBg.png");


/*Création de l'album pour l'artiste créé et d'une chanson*/
insert into album values(null, "Balade sur la plage", 2021, 5);
insert into chanson values(null, "Coucou c'est moi, Dave", "2021-04-16", "2m55", 1, 1);
/*Enregistrement des ventes pour cet album*/
insert into vente values(null, 25000, 2.33, now(), "physique", 3, 1);


create view vueCAVentes as(
    select va.nomDeScene, SUM(v.prixParVente*v.nbVente) as CA from vente v, album alb, vueArtistes va where v.idalbum=alb.idalbum and alb.idartiste=va.iduser ORDER BY CA desc
);
create view vueNbVentes as(
    select va.nomDeScene, SUM(v.nbVente) as nbVentesTotale from vente v, album alb, vueArtistes va where v.idalbum=alb.idalbum and alb.idartiste=va.iduser and v.type="digitale" ORDER BY nbVentesTotale desc
);

call insertDirigeant("GARCIA", "cgarcia@gmail.com", "12345", "0654325809", "dirigeant", "PDG");
call insertArtiste("LEVY", "dlvey@gmail.com", "5678", "98569876", "artiste", "Dan", "Dannn", "Rock", 4, '');
insert into album values(null, "Calo", 2023, 7);
insert into chanson values(null, "CaloTitre", now(), "2m36", 2, 2);
insert into vente values(null, 4567, 5.67, now(), "digitale", 3, 2);