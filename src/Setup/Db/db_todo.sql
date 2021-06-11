SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE tasks (
    id int(6) unsigned AUTO_INCREMENT PRIMARY KEY,
    title nvarchar(50) NOT NULL,
    details nvarchar(255) NULL,
    added_time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    done int DEFAULT 0
) 