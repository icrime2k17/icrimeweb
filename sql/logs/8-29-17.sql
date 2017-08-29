ALTER TABLE `crime_reports` ADD `user_id` INT NOT NULL AFTER `crime`;

ALTER TABLE `crime_reports` ADD `date_reported` DATETIME NOT NULL AFTER `image`;