DROP SCHEMA IF EXISTS APPLIETUDIANT;
CREATE SCHEMA APPLIETUDIANT; 
USE APPLIETUDIANT;

CREATE TABLE RESPONSABLE (
    idResp INT NOT NULL,
    Nom TEXT NOT NULL,
    Prenom TEXT NOT NULL,
    PosteActuel TEXT NOT NULL,
    AdresseMail TEXT NOT NULL,
    NumTelephone INT NOT NULL,
    Bureau TEXT NOT NULL,
    CONSTRAINT pk1 PRIMARY KEY (idResp)
);

CREATE TABLE ETUDIANT (
    NumEtudiant INT NOT NULL,
    Nom TEXT NOT NULL,
    Prenom TEXT NOT NULL,
    DateNaissance DATE NOT NULL,
    AnneeEtude TEXT NOT NULL,
    CONSTRAINT pk2 PRIMARY KEY (NumEtudiant)
);

CREATE TABLE NOTATION (
    IdEntreprise INT NOT NULL,
    IdStage INT NOT NULL,
    NoteRapport INT NOT NULL,
    NoteOral INT NOT NULL,
    CONSTRAINT pk3 PRIMARY KEY (idEntreprise)
);

CREATE TABLE TUTEUR (
    IdTuteur INT NOT NULL,
    Nom TEXT NOT NULL,
    Prenom TEXT NOT NULL,
    PosteActuel TEXT NOT NULL,
    IdEntreprise INT NOT NULL,
    CONSTRAINT pk4 PRIMARY KEY (IdTuteur),
    CONSTRAINT fk1 FOREIGN KEY (IdEntreprise)
        REFERENCES NOTATION (IdEntreprise)
);

CREATE TABLE STAGE (
    idStage INT NOT NULL,
    Intitule TEXT NOT NULL,
    DateDebut DATE NOT NULL,
    DateFin DATE NOT NULL,
    NumEtudiant INT NOT NULL,
    IdTuteur INT NOT NULL,
    IdResp INT NOT NULL,
    CONSTRAINT pk5 PRIMARY KEY (idStage),
    CONSTRAINT fk2 FOREIGN KEY (NumEtudiant)
        REFERENCES ETUDIANT (NumEtudiant),
	CONSTRAINT fk3 FOREIGN KEY (IdTuteur)
        REFERENCES TUTEUR (IdTuteur),
	CONSTRAINT fk4 FOREIGN KEY (IdResp)
        REFERENCES RESPONSABLE (IdResp)
);

CREATE TABLE ENTREPRISE (
    idEntreprise INT NOT NULL,
    NomEntreprise TEXT NOT NULL,
    Adresse TEXT NOT NULL,
    Domaine TEXT NOT NULL,
    CONSTRAINT pk6 PRIMARY KEY (idEntreprise)
);


INSERT INTO ETUDIANT (NumEtudiant, Nom, Prenom,DateNaissance,AnneeEtude) VALUES  
        (11925709, 'BEN CHEIKH', 'Makerem', '1998-01-01', 'TELECOM 2'),
		(11709480, 'BEN TAARIT', 'Hakim', '1998-07-02', 'TELECOM 2'),
		(11927420, 'DHIFLI', 'Hela', '1998-01-01', 'TELECOM 2'),
		(11927927, 'DIALLO', 'Bocar', '1998-01-01', 'TELECOM 2');

INSERT INTO RESPONSABLE (idResp, Nom, Prenom,PosteActuel,AdresseMail,NumTelephone,Bureau) VALUES 
        (1, 'Boussetta', 'Khaled', 'Responsable Telecom', 'khaled.boussetta@univ-paris13.fr', 0149404062, 'E218');
        
INSERT INTO NOTATION (IdEntreprise, IdStage, NoteRapport,NoteOral) VALUES  
        (1, 1, 15, 15);

INSERT INTO TUTEUR (IdTuteur, Nom, Prenom,PosteActuel,IdEntreprise) VALUES  
        (6, 'MOREL', 'Julien', 'Ingenieur Informatique', 1),
		(2, 'DUPOND', 'Eric', 'Architecte réseau', 1),
        (3,'PIERRE', 'Antoine', 'Service de recherche', 1),
        (5,'JEAN', 'Christophe', 'Service études', 1 );

INSERT INTO STAGE (idStage, Intitule, DateDebut,DateFin,NumEtudiant,IdTuteur,IdResp) VALUES  
        (5, 'Developpement application web', '2021-03-01', '2021-09-01', 11925709,6,1);

INSERT INTO ENTREPRISE (idEntreprise, NomEntreprise, Adresse,Domaine) VALUES  
        (2, 'Orange', '78 Rue Olivier de Serres, 75015 Paris, France', 'Telecommunications');


