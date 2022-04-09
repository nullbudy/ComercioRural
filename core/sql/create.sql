CREATE DATABASE IF NOT EXISTS cr_db;
SET NAMES 'utf8'
CREATE TABLE IF NOT EXISTS cr_users(
	id int(11) NOT NULL auto_increment,
	rol int(5) NOT NULL DEFAULT 1,
  premium int(5) NOT NULL DEFAULT 1,
	username varchar(16) NOT NULL,
	email text NOT NULL,
	password text NOT NULL,
	tokenv text NOT NULL,
	reg_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
);

INSERT INTO `cr_users` (`rol`, `premium`, `username`, `email`, `password`, `tokenv`, `reg_date`) VALUES
(1, 1, 'admin', 'admin@conexionrural.com', 'b697bbc326031c5c09622c298d72a60ed925fef750d4991f1e5bafe199a75ea5', '0', '1970-01-01 00:00:00')
