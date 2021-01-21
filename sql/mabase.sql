DROP DATABASE IF EXISTS maBase;
CREATE DATABASE maBase;
USE maBase;

drop table if exists utilisateur;
drop table if exists produits;
drop table if exists commande;


create table utilisateur(
	id INT PRIMARY KEY not null auto_increment,
	login VARCHAR(50) not null,
	password VARCHAR(50) not null);

create table produits(
	categorie VARCHAR(50) not null,
	img VARCHAR(50) not null,
    titre VARCHAR(50) not null,
	ref VARCHAR(5) PRIMARY KEY not null,
    prix VARCHAR(10) not null,
	stock INT);
    
create table commande(
	DateCommande datetime,
	refProduit VARCHAR(5),
    idUtilisateur INT,
	quantite INT not null,
    valider boolean not null default 0,
	CONSTRAINT pk_constraint_Commande PRIMARY KEY (refProduit, idUtilisateur));
    

alter table commande
add constraint fk_commande_refProduit FOREIGN KEY (refProduit) references produits(ref);
alter table commande
add constraint fk_commande_idUtilisateur FOREIGN KEY (idUtilisateur) references utilisateur(id);
