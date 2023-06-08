-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema devwave
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema devwave
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `devwave` DEFAULT CHARACTER SET utf8mb3 ;
USE `devwave` ;

-- -----------------------------------------------------
-- Table `devwave`.`album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devwave`.`album` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `year` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `devwave`.`artist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devwave`.`artist` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `devwave`.`album_artist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devwave`.`album_artist` (
  `artist_id` INT NOT NULL,
  `album_id` INT NOT NULL,
  PRIMARY KEY (`artist_id`, `album_id`),
  INDEX `fk_artist_has_album_album1_idx` (`album_id` ASC) VISIBLE,
  INDEX `fk_artist_has_album_artist1_idx` (`artist_id` ASC) VISIBLE,
  CONSTRAINT `fk_artist_has_album_album1`
    FOREIGN KEY (`album_id`)
    REFERENCES `devwave`.`album` (`id`),
  CONSTRAINT `fk_artist_has_album_artist1`
    FOREIGN KEY (`artist_id`)
    REFERENCES `devwave`.`artist` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `devwave`.`poll`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devwave`.`poll` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` VARCHAR(45) NOT NULL,
  `theme` VARCHAR(45) NOT NULL,
  `question` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `devwave`.`answer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devwave`.`answer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `nb_vote` VARCHAR(45) NOT NULL,
  `poll_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_answer_poll1_idx` (`poll_id` ASC) VISIBLE,
  CONSTRAINT `fk_answer_poll1`
    FOREIGN KEY (`poll_id`)
    REFERENCES `devwave`.`poll` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `devwave`.`song`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devwave`.`song` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `year` VARCHAR(45) NOT NULL,
  `duration` VARCHAR(45) NOT NULL,
  `album_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_song_album1_idx` (`album_id` ASC) VISIBLE,
  CONSTRAINT `fk_song_album1`
    FOREIGN KEY (`album_id`)
    REFERENCES `devwave`.`album` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `devwave`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devwave`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `tel` VARCHAR(45) NULL DEFAULT NULL,
  `picture_path` VARCHAR(100) NOT NULL,
  `access_type` VARCHAR(45) NOT NULL DEFAULT 'reader',
  `firstname` VARCHAR(60) NOT NULL,
  `email_verified_at` TIMESTAMP NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `lastname` VARCHAR(60) NOT NULL,
  `username` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `devwave`.`chosen_song`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devwave`.`chosen_song` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` VARCHAR(45) NOT NULL,
  `nb_vote` VARCHAR(45) NOT NULL,
  `user_id` INT NOT NULL,
  `song_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_chosen_song_user1_idx` (`user_id` ASC, `user_group_id` ASC) VISIBLE,
  INDEX `fk_chosen_song_song1_idx` (`song_id` ASC) VISIBLE,
  CONSTRAINT `fk_chosen_song_song1`
    FOREIGN KEY (`song_id`)
    REFERENCES `devwave`.`song` (`id`),
  CONSTRAINT `fk_chosen_song_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `devwave`.`users` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `devwave`.`contest`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devwave`.`contest` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` VARCHAR(45) NOT NULL,
  `title` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `devwave`.`contest_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devwave`.`contest_user` (
  `contest_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`contest_id`, `user_id`),
  INDEX `fk_contest_has_user_user1_idx` (`user_id` ASC) VISIBLE,
  INDEX `fk_contest_has_user_contest1_idx` (`contest_id` ASC) VISIBLE,
  CONSTRAINT `fk_contest_has_user_contest1`
    FOREIGN KEY (`contest_id`)
    REFERENCES `devwave`.`contest` (`id`),
  CONSTRAINT `fk_contest_has_user_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `devwave`.`users` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `devwave`.`failed_jobs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devwave`.`failed_jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` VARCHAR(255) NOT NULL,
  `connection` TEXT NOT NULL,
  `queue` TEXT NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `exception` LONGTEXT NOT NULL,
  `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `failed_jobs_uuid_unique` (`uuid` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `devwave`.`migrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devwave`.`migrations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `devwave`.`password_reset_tokens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devwave`.`password_reset_tokens` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `devwave`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devwave`.`password_resets` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  INDEX `password_resets_email_index` (`email` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `devwave`.`personal_access_tokens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devwave`.`personal_access_tokens` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` VARCHAR(255) NOT NULL,
  `tokenable_id` BIGINT UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `token` VARCHAR(64) NOT NULL,
  `abilities` TEXT NULL DEFAULT NULL,
  `last_used_at` TIMESTAMP NULL DEFAULT NULL,
  `expires_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `personal_access_tokens_token_unique` (`token` ASC) VISIBLE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type` ASC, `tokenable_id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `devwave`.`random_sentence`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devwave`.`random_sentence` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sentence` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `devwave`.`user_has_poll`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `devwave`.`user_has_poll` (
  `user_id` INT NOT NULL,
  `poll_id` INT NOT NULL,
  `user_status` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`user_id`, `poll_id`),
  INDEX `fk_user_has_poll_poll1_idx` (`poll_id` ASC) VISIBLE,
  INDEX `fk_user_has_poll_user1_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_user_has_poll_poll1`
    FOREIGN KEY (`poll_id`)
    REFERENCES `devwave`.`poll` (`id`),
  CONSTRAINT `fk_user_has_poll_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `devwave`.`users` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
