CREATE OR REPLACE TABLE users
	(
		username varchar(16) PRIMARY KEY,
		password_hash varchar(255) default ''
	);