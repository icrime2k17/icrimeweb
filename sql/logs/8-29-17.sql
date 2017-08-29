ALTER TABLE `crime_reports` ADD `user_id` INT NOT NULL AFTER `crime`;

ALTER TABLE `crime_reports` ADD `date_reported` DATETIME NOT NULL AFTER `image`;

ALTER TABLE `crime_reports` ADD `is_flag` TINYINT(1) NOT NULL AFTER `status`;