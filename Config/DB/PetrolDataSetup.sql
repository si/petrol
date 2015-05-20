-- Create Petrol DEV database
CREATE TABLE 'petrol_dev';

-- Create Petrol user
CREATE USER 'petrol_man'@'localhost' IDENTIFIED BY 'Unl34d3d';

-- Give new Petrol user privileges to Petrol DEV database
GRANT ALL PRIVILEGES ON 'petrol_dev'.* TO 'petrol_man'@'localhost';