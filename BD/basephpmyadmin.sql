DROP SCHEMA IF EXISTS APPLIETUDIANT;
CREATE SCHEMA APPLIETUDIANT; 
USE APPLIETUDIANT;


create table utilisateur(
    iduser INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    user_name TEXT NOT NULL,
    email TEXT NOT NULL,
    pwd TEXT NOT NULL,
    role TEXT NOT NULL
);

CREATE TABLE STAGE (
    
    libelle TEXT NOT NULL DEFAULT "TELECOM",
    etat  TEXT NOT NULL DEFAULT "dossier envoyé",
    StageAnnee  TEXT NOT NULL DEFAULT "3eme annee",
    StagiaireCivil TEXT NOT NULL,
    StagiaireNumero INT NOT NULL,
    StagiaireNom TEXT NOT NULL,
    StagiairePrenom TEXT NOT NULL,
    StagiaireDateNais DATE NOT NULL,
    StagiaireVilleNais TEXT NOT NULL,
    StagiaireNation TEXT NOT NULL,
    StagiaireMail TEXT NOT NULL,
    StagiaireTel INT NOT NULL,
    StagiaireFax INT NOT NULL,
    StagiaireBatiment INT  NOT NULL,
    StagiaireAdresse TEXT NOT NULL,
    StagiaireCP INT NOT NULL,
    StagiaireVille TEXT NOT NULL,
    StagiairePays TEXT NOT NULL,
    ContactUrgenceNom TEXT NOT NULL,
    ContactUrgenceTel INT NOT NULL,
    AssuranceNom TEXT NOT NULL,
    AssuranceNumero INT NOT NULL,
    AssuranceCaissePrimaire TEXT NOT NULL,
    TrouveStage TEXT NOT NULL,
    TrouveStageAutre TEXT NOT NULL,
    Duree TEXT NOT NULL,
    DureeUnite TEXT NOT NULL,
    NombreHeureSemaine INT NOT NULL,
    DateDebut DATE NOT NULL,
    DateFin DATE NOT NULL,
    LieuBat INT NOT NULL,
    LieuAdresse TEXT NOT NULL,
    LieuCP INT NOT NULL,
    LieuVille TEXT NOT NULL,
    LieuPays TEXT  NOT NULL,
    DateDebut2 DATE NOT NULL,
    DateFin2 DATE NOT NULL,
    LieuBat2 INT NOT NULL,
    LieuAdresse2 TEXT  NOT NULL,
    LieuCP2 INT NOT NULL,
    LieuVille2 TEXT  NOT NULL,
    LieuPays2 TEXT  NOT NULL,
    IngCivil TEXT  NOT NULL,
    IngQualite TEXT  NOT NULL,
    IngNom TEXT  NOT NULL,
    Ingprenom TEXT  NOT NULL,
    IngTel INT NOT NULL,
    IngFax INT NOT NULL,
    IngMail TEXT  NOT NULL,
    StageTel INT NOT NULL,
    StageFax INT NOT NULL,
    StageMail TEXT  NOT NULL,
    StageTitre TEXT  NOT NULL,
    StageSujet TEXT  NOT NULL,
    StageHoraire TIME NOT NULL,
    ConfidRap INT NOT NULL,
    ConfidSout INT NOT NULL,
    StageGrat INT NOT NULL,
    StageAutres TEXT  NOT NULL,
    Ent TEXT  NOT NULL,
    EntNom TEXT  NOT NULL,
    EntBatiment INT NOT NULL,
    EntSIREN INT NOT NULL,
    EntAdresse TEXT  NOT NULL,
    EntCP INT NOT NULL,
    EntVille  TEXT  NOT NULL,
    EntPays  TEXT  NOT NULL,
    EntActivite TEXT  NOT NULL,
    RadmCivil TEXT  NOT NULL,
    RadmQualite  TEXT  NOT NULL,
    RAdmNom TEXT  NOT NULL,
    RAdmPrenom TEXT  NOT NULL,
    RAdmTel INT NOT NULL,
    RAdmFax INT NOT NULL,
    RAdmMail TEXT  NOT NULL,
    RSecCivil TEXT  NOT NULL,
    RSecQualite TEXT  NOT NULL,
    RSecNom TEXT  NOT NULL,
    RSecPrenom  TEXT  NOT NULL,
    RSecTel INT  NOT NULL,
    RSecFax INT  NOT NULL,
    RSecMail TEXT  NOT NULL,
    StageNumero INT  NOT NULL,
    DateSignature DATE NOT NULL,
    date_enr  DATE NOT NULL,


       CONSTRAINT pk1 PRIMARY KEY (StagiaireNumero)
);




insert into stage (
StagiaireCivil,StagiaireNumero,StagiaireNom,StagiairePrenom,StagiaireDateNais,StagiaireVilleNais,
StagiaireNation,StagiaireMail,StagiaireTel,StagiaireFax,StagiaireBatiment,StagiaireAdresse,StagiaireCP,StagiaireVille,
StagiairePays,ContactUrgenceNom,ContactUrgenceTel,AssuranceNom,AssuranceNumero,AssuranceCaissePrimaire,TrouveStage,TrouveStageAutre,
Duree,DureeUnite,NombreHeureSemaine,DateDebut,DateFin,LieuBat,LieuAdresse,LieuCP,LieuVille,LieuPays,DateDebut2,DateFin2,
LieuBat2,LieuAdresse2,LieuCP2,LieuVille2,LieuPays2,IngCivil,IngQualite,IngNom,Ingprenom,IngTel,IngFax,IngMail,StageTel,
StageFax,StageMail,StageTitre,StageSujet,StageHoraire,ConfidRap,ConfidSout,StageGrat,StageAutres,Ent,EntNom,EntBatiment,
EntSIREN,EntAdresse,EntCP,EntVille,EntPays,EntActivite,RadmCivil,RadmQualite,RAdmNom,RAdmPrenom,RAdmTel,RAdmFax,RAdmMail,
RSecCivil,RSecQualite,RSecNom,RSecPrenom,RSecTel,RSecFax,RSecMail,StageNumero,DateSignature,date_enr
)
values (
"Mme", 11925709,"BEN CHEIKH", "Makerem","1996-06-21","sayada",
"tunisienne","makerem.bencheikh@gmail.com",0666747857,666666,104,"rue eugenie le guillernice",94290,"vlr",
"France","JALLED",0635324741,"assurance",0123659874,"Caisse","oui","oui","6 mois", "3 mois",30,"2021-03-15","2021-09-13",
12,"rue saint-genois",59800,"Lille","France","2021-06-21","2021-06-20",3,"rue des princesses",78430,"louviciennes","France",
"Mme","x","Ktari","Sarah",0761897262,99999999,"sarahktari@gmail.com","0123659874",02365478,"bencheikhMakerem@outlook.fr",
"Developpement application web","une application qui permet et facilite le suivi de stage des etudiants","",
12,13,900,"rien","Entreprise","xxxxx",6,023654,"rue normandie",91490,"les ulis","France","developpement","Mr","x","Morel",
"Julien",010362544,7896541,"MorelJulien@gmail.com","Mme","y","Bardot","Melanie",0163984568,336699,"melaniebardot@gmail.com",
22,"2021-02-23","2021-02-24"

),
(
"Mr", 11297405,"BEN TAARIT ", "Hakim","1998-01-01","tunis",
"francaise","hakimtaarit@gmail.com",0666747850,666676,14,"rue eugenie le guillernice",94290,"vlg",
"France","JEAN",0635324741,"assurance",0123659874,"Caisse","oui","oui","6 mois", "3 mois",30,"2021-04-15","2021-07-13",
12,"rue saint-genois",59800,"Lille","France","2021-07-21","2021-10-20",3,"rue des princesses",78430,"louviciennes","France",
"Mme","x","Ktari","Sofia",0761897262,99999999,"sofiaktari@gmail.com","0123659874",02365478,"bentaarithakim@gmail.com",
"Developpement application web","une application qui permet et facilite le suivi de stage des etudiants","",
11,14,900,"rien","Entreprise","xxxxx",6,023654,"rue normandie",91490,"les ulis","France","developpement","Mr","x","Morel",
"Julien",010362544,7896541,"MorelJulien@gmail.com","Mme","y","Bardot","Melanie",0163984568,336699,"melaniebardot@gmail.com",
22,"2021-02-23","2021-02-24"

),

(
"Mme", 11927400,"DHIFLI", "Hela","1998-01-01","tunis",
"tunisienne","dhiflihela@gmail.com",0666747850,666676,14,"rue eugenie le guillernice",94290,"vlg",
"France","JEAN",0635324741,"assurance",0123659874,"Caisse","oui","oui","6 mois", "3 mois",30,"2021-04-15","2021-07-13",
12,"rue saint-genois",59800,"Lille","France","2021-07-21","2021-10-20",3,"rue des princesses",78430,"louviciennes","France",
"Mme","x","Ktari","Sofia",0761897262,99999999,"sofiaktari@gmail.com","0123659874",02365478,"hela_dhifli@gmail.com",
"Developpement application web","une application qui permet et facilite le suivi de stage des etudiants","",
11,14,900,"rien","Entreprise","xxxxx",6,023654,"rue normandie",91490,"les ulis","France","developpement","Mr","x","Morel",
"Julien",010362544,7896541,"MorelJulien@gmail.com","Mme","y","Bardot","Melanie",0163984568,336699,"melaniebardot@gmail.com",
22,"2021-02-23","2021-02-24"

),
(
"Mr", 11928405,"DIALLO", "BOCAR","1998-01-01","tunis",
"tunisienne","dbocar@gmail.com",0666747850,666676,14,"rue eugenie le guillernice",94290,"vlg",
"France","JEAN",0635324741,"assurance",0123659874,"Caisse","oui","oui","6 mois", "3 mois",30,"2021-04-15","2021-07-13",
12,"rue saint-genois",59800,"Lille","France","2021-07-21","2021-10-20",3,"rue des princesses",78430,"louviciennes","France",
"Mme","x","Ktari","Sofia",0761897262,99999999,"sofiaktari@gmail.com","0123659874",02365478,"bocar_diallo@gmail.com",
"Developpement application web","une application qui permet et facilite le suivi de stage des etudiants","",
11,14,900,"rien","Entreprise","xxxxx",6,023654,"rue normandie",91490,"les ulis","France","developpement","Mr","x","Morel",
"Julien",010362544,7896541,"MorelJulien@gmail.com","Mme","y","Bardot","Melanie",0163984568,336699,"melaniebardot@gmail.com",
22,"2021-02-23","2021-02-24"

);


select * from stage
