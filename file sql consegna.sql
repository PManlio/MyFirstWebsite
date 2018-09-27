-- create database eserc;
use eserc;
-- username: root, nessuna password
/*
create table CLIENTE(
CODICE INTEGER auto_increment PRIMARY KEY,
	CITTA VARCHAR(20),
	INDIRIZZO VARCHAR(30),
	TELEFONO VARCHAR(10),
	N_SITI INTEGER,
	SPESA_TOTALE INTEGER
)Engine='InnoDB';


create table SVILUPPATORE(
	PIVA VARCHAR(10) PRIMARY KEY,
    NOME VARCHAR(15),
    COGNOME VARCHAR(15),
    TELEFONO VARCHAR(15)
)Engine='InnoDB';

create table LAYOUT(
	ID INTEGER auto_increment PRIMARY KEY,
    COSTO_TOTALE INTEGER,
    SVILUPPATORE VARCHAR(10),
    INDEX new_sviluppatore(SVILUPPATORE),
    FOREIGN KEY (SVILUPPATORE) REFERENCES SVILUPPATORE(PIVA)
)Engine='InnoDB';


create table SITO_WEB(
	CODICE INTEGER AUTO_INCREMENT PRIMARY KEY,
    URL VARCHAR(50),
    DATA_PUBBLICAZIONE date,
    CLIENTE INTEGER,
    LAYOUT INTEGER,
    INDEX new_cliente(CLIENTE),
    INDEX new_layout(LAYOUT),
    FOREIGN KEY (CLIENTE) REFERENCES CLIENTE(CODICE),
    FOREIGN KEY (LAYOUT) REFERENCES LAYOUT(ID)
)Engine='InnoDB';


create table VISITATORE(
	IP VARCHAR(15),
    DATA DATE,
    PRIMARY KEY (IP,DATA)
)Engine='InnoDB';

create table VISITA(
	IP VARCHAR(15),
    DATA DATE,
    SITO INTEGER,
    INDEX new_sito1(SITO),
	INDEX new_visitatore(IP,data),
    FOREIGN KEY (SITO) REFERENCES SITO_WEB(CODICE),
    FOREIGN KEY (IP,DATA) REFERENCES VISITATORE(IP,DATA),
    PRIMARY KEY(IP,DATA,SITO)
)Engine='InnoDB';

create table MODULO(
	ID INTEGER auto_increment PRIMARY KEY,
    NOME VARCHAR(20),
    FUNZIONE VARCHAR(100),
    COSTO INTEGER
)Engine='InnoDB';


create table COMPONENTE(
	ID_LAYOUT INTEGER,
    ID_MODULO INTEGER,
    INDEX new_id_layout (ID_LAYOUT),
    INDEX new_id_modulo (ID_MODULO),
    FOREIGN KEY (ID_LAYOUT) REFERENCES LAYOUT(ID),
    FOREIGN KEY (ID_MODULO) REFERENCES MODULO(ID),
    PRIMARY KEY(ID_LAYOUT,ID_MODULO)
)Engine='InnoDB';

create table users(
	username varchar(20) primary key,
    password varchar(20),
    type integer(3))engine = 'InnoDB';
-- type può essere 1 2 o 3, ossia Cliente (1), Sviluppatore (2), Admin (3);

delimiter //
create trigger aggiorna_cliente
after insert on sito_web
for each row
begin
update CLIENTE C set C.SPESA_TOTALE = coalesce(SPESA_TOTALE, 0) + (select COSTO_TOTALE from LAYOUT where ID=NEW.LAYOUT) where C.CODICE = NEW.CLIENTE;
update CLIENTE CL set N_SITI = coalesce(N_SITI, 0) + 1 where CL.CODICE = NEW.CLIENTE;
end //
delimiter ;

delimiter //
create trigger aggiorna_costo_layout
after insert on componente
for each row
begin
update LAYOUT set COSTO_TOTALE = coalesce(COSTO_TOTALE,0) + (select COSTO from MODULO where ID =NEW.ID_MODULO) where ID = NEW.ID_LAYOUT;
end //
delimiter ; */

-- insert into users(username, password, type) values ('manlio', 'manlio', 3);
-- insert into users(username, password, type) values ('alice', 'alice', 3);
select * from sviluppatore;