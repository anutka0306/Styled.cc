<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210507131325 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE before_after (id INT AUTO_INCREMENT NOT NULL, price_model_id INT NOT NULL, before_img VARCHAR(255) DEFAULT NULL, after_img VARCHAR(255) DEFAULT NULL, modify_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL on update CURRENT_TIMESTAMP, INDEX IDX_4459C2111BC38CF0 (price_model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE before_after_price_service (before_after_id INT NOT NULL, price_service_id INT NOT NULL, INDEX IDX_64AEC4BD90DE50AF (before_after_id), INDEX IDX_64AEC4BD59D4A6E2 (price_service_id), PRIMARY KEY(before_after_id, price_service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, main_city TINYINT(1) DEFAULT \'0\' NOT NULL, code VARCHAR(255) DEFAULT \'\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE config (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, value VARCHAR(255) DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX name (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, brand_id INT DEFAULT NULL, model_id INT DEFAULT NULL, service_id INT DEFAULT NULL, price_category_id INT DEFAULT NULL, path VARCHAR(250) DEFAULT NULL, text TEXT DEFAULT NULL, sort INT NOT NULL, images TEXT DEFAULT NULL, published TINYINT(1) DEFAULT \'1\' NOT NULL, modify_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL on update CURRENT_TIMESTAMP, name VARCHAR(250) DEFAULT NULL, h1 VARCHAR(250) DEFAULT NULL, meta_title VARCHAR(250) DEFAULT NULL, meta_description TEXT DEFAULT NULL, rating_value DOUBLE PRECISION DEFAULT \'4.8\' NOT NULL, rating_count INT UNSIGNED DEFAULT 12 NOT NULL, page_type VARCHAR(255) NOT NULL, INDEX IDX_FEC530A9727ACA70 (parent_id), INDEX IDX_FEC530A944F5D008 (brand_id), INDEX IDX_FEC530A97975B7E7 (model_id), INDEX IDX_FEC530A9ED5CA9E6 (service_id), INDEX IDX_FEC530A9159FD1F4 (price_category_id), UNIQUE INDEX path (path), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE counter (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, count INT DEFAULT 0 NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE day_of_week (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE district (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(255) DEFAULT \'\' NOT NULL, INDEX IDX_31C154878BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faq (id INT AUTO_INCREMENT NOT NULL, autor VARCHAR(250) NOT NULL, text TEXT NOT NULL, email_autor VARCHAR(250) NOT NULL, date INT NOT NULL, otvet_admin TEXT NOT NULL, count_views INT NOT NULL, count_like INT NOT NULL, count_dislike INT NOT NULL, published TINYINT(1) NOT NULL, modify_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL on update CURRENT_TIMESTAMP, name VARCHAR(250) DEFAULT NULL, h1 VARCHAR(250) DEFAULT NULL, meta_title VARCHAR(250) DEFAULT NULL, meta_description TEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE models_cyrillic (id INT AUTO_INCREMENT NOT NULL, parent_id INT NOT NULL, name_en VARCHAR(256) NOT NULL, name_ru VARCHAR(256) NOT NULL, INDEX parent_id (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE naschiraboty (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, meta_title VARCHAR(255) NOT NULL, meta_description VARCHAR(255) NOT NULL, text LONGTEXT NOT NULL, sum INT NOT NULL, sort INT NOT NULL, short_text LONGTEXT NOT NULL, client_name VARCHAR(255) NOT NULL, modify_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL on update CURRENT_TIMESTAMP, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE naschiraboty_price_service (naschiraboty_id INT NOT NULL, price_service_id INT NOT NULL, INDEX IDX_ED89FEEE52A1D855 (naschiraboty_id), INDEX IDX_ED89FEEE59D4A6E2 (price_service_id), PRIMARY KEY(naschiraboty_id, price_service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, date INT NOT NULL, name VARCHAR(255) NOT NULL, meta_title VARCHAR(255) NOT NULL, meta_description VARCHAR(255) NOT NULL, text LONGTEXT NOT NULL, sort INT NOT NULL, images LONGTEXT DEFAULT NULL, short_text LONGTEXT NOT NULL, count_views INT NOT NULL, count_like INT NOT NULL, count_dislike INT NOT NULL, modify_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL on update CURRENT_TIMESTAMP, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE our_works (id INT AUTO_INCREMENT NOT NULL, price_model_id INT NOT NULL, INDEX IDX_378B4B511BC38CF0 (price_model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE our_works_price_service (our_works_id INT NOT NULL, price_service_id INT NOT NULL, INDEX IDX_D5AF833262D84DE6 (our_works_id), INDEX IDX_D5AF833259D4A6E2 (price_service_id), PRIMARY KEY(our_works_id, price_service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price__brand (id INT AUTO_INCREMENT NOT NULL, class INT NOT NULL, name VARCHAR(255) NOT NULL, increase INT NOT NULL, position INT NOT NULL, name_rus VARCHAR(255) DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, popular TINYINT(1) DEFAULT \'0\' NOT NULL, photo VARCHAR(255) DEFAULT NULL, modify_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL on update CURRENT_TIMESTAMP, INDEX IDX_DBF3BD94ED4B199F (class), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price__categories (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, meta_description_template LONGTEXT DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, INDEX IDX_5E61FA06727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price__class (id INT AUTO_INCREMENT NOT NULL, price_of_hour INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price__model (id INT AUTO_INCREMENT NOT NULL, class INT NOT NULL, brand_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, name_rus VARCHAR(255) DEFAULT NULL, popular TINYINT(1) DEFAULT \'0\' NOT NULL, type INT DEFAULT 0 NOT NULL, modify_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL on update CURRENT_TIMESTAMP, INDEX IDX_10343615ED4B199F (class), INDEX brand_id (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price__services (id INT AUTO_INCREMENT NOT NULL, price_category_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, hours DOUBLE PRECISION DEFAULT \'1.0\' NOT NULL, published TINYINT(1) NOT NULL, slug VARCHAR(255) DEFAULT NULL, pagetitle VARCHAR(255) DEFAULT NULL, INDEX IDX_DE4397F5159FD1F4 (price_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reviews (id INT AUTO_INCREMENT NOT NULL, autor VARCHAR(255) NOT NULL, date INT NOT NULL, text LONGTEXT NOT NULL, ocenka INT NOT NULL, published TINYINT(1) NOT NULL, name VARCHAR(250) DEFAULT NULL, h1 VARCHAR(250) DEFAULT NULL, meta_title VARCHAR(250) DEFAULT NULL, meta_description TEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, modify_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL on update CURRENT_TIMESTAMP, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salon (id INT AUTO_INCREMENT NOT NULL, city_id INT DEFAULT NULL, address VARCHAR(255) NOT NULL, working_hours_from VARCHAR(10) NOT NULL, working_hours_to VARCHAR(10) NOT NULL, name VARCHAR(255) NOT NULL, metro VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, alias VARCHAR(255) DEFAULT NULL, wa_phone VARCHAR(255) DEFAULT NULL, yandex_target VARCHAR(255) DEFAULT NULL, mango_id INT DEFAULT NULL, yandex_map_link LONGTEXT DEFAULT NULL, yandex_navigator_link LONGTEXT DEFAULT NULL, google_map_link LONGTEXT DEFAULT NULL, slogan VARCHAR(255) DEFAULT NULL, text LONGTEXT DEFAULT NULL, video_link VARCHAR(255) DEFAULT NULL, published TINYINT(1) DEFAULT \'1\' NOT NULL, modify_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL on update CURRENT_TIMESTAMP, INDEX IDX_F268F4178BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salon_price_brand (salon_id INT NOT NULL, price_brand_id INT NOT NULL, INDEX IDX_528CFCC34C91BDE4 (salon_id), INDEX IDX_528CFCC32643EB1F (price_brand_id), PRIMARY KEY(salon_id, price_brand_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salon_price_model (salon_id INT NOT NULL, price_model_id INT NOT NULL, INDEX IDX_994B77424C91BDE4 (salon_id), INDEX IDX_994B77421BC38CF0 (price_model_id), PRIMARY KEY(salon_id, price_model_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salon_price_service (salon_id INT NOT NULL, price_service_id INT NOT NULL, INDEX IDX_34273524C91BDE4 (salon_id), INDEX IDX_342735259D4A6E2 (price_service_id), PRIMARY KEY(salon_id, price_service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salon_district (salon_id INT NOT NULL, district_id INT NOT NULL, INDEX IDX_4C829E7F4C91BDE4 (salon_id), INDEX IDX_4C829E7FB08FA272 (district_id), PRIMARY KEY(salon_id, district_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salon_subway_station (salon_id INT NOT NULL, subway_station_id INT NOT NULL, INDEX IDX_90842E924C91BDE4 (salon_id), INDEX IDX_90842E927D13ACAD (subway_station_id), PRIMARY KEY(salon_id, subway_station_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE special_offer (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT DEFAULT NULL, old_price INT NOT NULL, new_price INT NOT NULL, published TINYINT(1) NOT NULL, ordering INT NOT NULL, slug VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, modify_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL on update CURRENT_TIMESTAMP, name VARCHAR(250) DEFAULT NULL, h1 VARCHAR(250) DEFAULT NULL, meta_title VARCHAR(250) DEFAULT NULL, meta_description TEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subway_line (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, name VARCHAR(255) NOT NULL, hex_color VARCHAR(7) DEFAULT NULL, INDEX IDX_83D8D2C18BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subway_station (id INT AUTO_INCREMENT NOT NULL, subway_line_id INT NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(255) DEFAULT \'\' NOT NULL, INDEX IDX_1F68494CCD2AC4BF (subway_line_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, price_model_id INT DEFAULT NULL, category_id INT DEFAULT NULL, text LONGTEXT DEFAULT NULL, link VARCHAR(255) NOT NULL, name VARCHAR(250) DEFAULT NULL, h1 VARCHAR(250) DEFAULT NULL, meta_title VARCHAR(250) DEFAULT NULL, meta_description TEXT DEFAULT NULL, rating_value DOUBLE PRECISION DEFAULT \'4.8\' NOT NULL, rating_count INT UNSIGNED DEFAULT 12 NOT NULL, image VARCHAR(255) DEFAULT NULL, modify_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL on update CURRENT_TIMESTAMP, INDEX IDX_7CC7DA2C1BC38CF0 (price_model_id), INDEX IDX_7CC7DA2C12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video_price_service (video_id INT NOT NULL, price_service_id INT NOT NULL, INDEX IDX_81C17EBE29C1004E (video_id), INDEX IDX_81C17EBE59D4A6E2 (price_service_id), PRIMARY KEY(video_id, price_service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video_category (id INT AUTO_INCREMENT NOT NULL, alias VARCHAR(255) NOT NULL, modify_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL on update CURRENT_TIMESTAMP, name VARCHAR(250) DEFAULT NULL, h1 VARCHAR(250) DEFAULT NULL, meta_title VARCHAR(250) DEFAULT NULL, meta_description TEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE working_day (id INT AUTO_INCREMENT NOT NULL, day_of_week_id INT NOT NULL, salon_id INT NOT NULL, working_hours_from VARCHAR(10) DEFAULT NULL, working_hours_to VARCHAR(10) DEFAULT NULL, day_off TINYINT(1) DEFAULT \'0\' NOT NULL, INDEX IDX_41EBDDE8139A4A41 (day_of_week_id), INDEX IDX_41EBDDE84C91BDE4 (salon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE before_after ADD CONSTRAINT FK_4459C2111BC38CF0 FOREIGN KEY (price_model_id) REFERENCES price__model (id)');
        $this->addSql('ALTER TABLE before_after_price_service ADD CONSTRAINT FK_64AEC4BD90DE50AF FOREIGN KEY (before_after_id) REFERENCES before_after (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE before_after_price_service ADD CONSTRAINT FK_64AEC4BD59D4A6E2 FOREIGN KEY (price_service_id) REFERENCES price__services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A9727ACA70 FOREIGN KEY (parent_id) REFERENCES content (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A944F5D008 FOREIGN KEY (brand_id) REFERENCES price__brand (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A97975B7E7 FOREIGN KEY (model_id) REFERENCES price__model (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A9ED5CA9E6 FOREIGN KEY (service_id) REFERENCES price__services (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A9159FD1F4 FOREIGN KEY (price_category_id) REFERENCES price__categories (id)');
        $this->addSql('ALTER TABLE district ADD CONSTRAINT FK_31C154878BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE naschiraboty_price_service ADD CONSTRAINT FK_ED89FEEE52A1D855 FOREIGN KEY (naschiraboty_id) REFERENCES naschiraboty (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE naschiraboty_price_service ADD CONSTRAINT FK_ED89FEEE59D4A6E2 FOREIGN KEY (price_service_id) REFERENCES price__services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE our_works ADD CONSTRAINT FK_378B4B511BC38CF0 FOREIGN KEY (price_model_id) REFERENCES price__model (id)');
        $this->addSql('ALTER TABLE our_works_price_service ADD CONSTRAINT FK_D5AF833262D84DE6 FOREIGN KEY (our_works_id) REFERENCES our_works (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE our_works_price_service ADD CONSTRAINT FK_D5AF833259D4A6E2 FOREIGN KEY (price_service_id) REFERENCES price__services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE price__brand ADD CONSTRAINT FK_DBF3BD94ED4B199F FOREIGN KEY (class) REFERENCES price__class (id)');
        $this->addSql('ALTER TABLE price__categories ADD CONSTRAINT FK_5E61FA06727ACA70 FOREIGN KEY (parent_id) REFERENCES price__categories (id)');
        $this->addSql('ALTER TABLE price__model ADD CONSTRAINT FK_10343615ED4B199F FOREIGN KEY (class) REFERENCES price__class (id)');
        $this->addSql('ALTER TABLE price__model ADD CONSTRAINT FK_1034361544F5D008 FOREIGN KEY (brand_id) REFERENCES price__brand (id)');
        $this->addSql('ALTER TABLE price__services ADD CONSTRAINT FK_DE4397F5159FD1F4 FOREIGN KEY (price_category_id) REFERENCES price__categories (id)');
        $this->addSql('ALTER TABLE salon ADD CONSTRAINT FK_F268F4178BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE salon_price_brand ADD CONSTRAINT FK_528CFCC34C91BDE4 FOREIGN KEY (salon_id) REFERENCES salon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salon_price_brand ADD CONSTRAINT FK_528CFCC32643EB1F FOREIGN KEY (price_brand_id) REFERENCES price__brand (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salon_price_model ADD CONSTRAINT FK_994B77424C91BDE4 FOREIGN KEY (salon_id) REFERENCES salon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salon_price_model ADD CONSTRAINT FK_994B77421BC38CF0 FOREIGN KEY (price_model_id) REFERENCES price__model (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salon_price_service ADD CONSTRAINT FK_34273524C91BDE4 FOREIGN KEY (salon_id) REFERENCES salon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salon_price_service ADD CONSTRAINT FK_342735259D4A6E2 FOREIGN KEY (price_service_id) REFERENCES price__services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salon_district ADD CONSTRAINT FK_4C829E7F4C91BDE4 FOREIGN KEY (salon_id) REFERENCES salon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salon_district ADD CONSTRAINT FK_4C829E7FB08FA272 FOREIGN KEY (district_id) REFERENCES district (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salon_subway_station ADD CONSTRAINT FK_90842E924C91BDE4 FOREIGN KEY (salon_id) REFERENCES salon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salon_subway_station ADD CONSTRAINT FK_90842E927D13ACAD FOREIGN KEY (subway_station_id) REFERENCES subway_station (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subway_line ADD CONSTRAINT FK_83D8D2C18BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE subway_station ADD CONSTRAINT FK_1F68494CCD2AC4BF FOREIGN KEY (subway_line_id) REFERENCES subway_line (id)');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C1BC38CF0 FOREIGN KEY (price_model_id) REFERENCES price__model (id)');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C12469DE2 FOREIGN KEY (category_id) REFERENCES video_category (id)');
        $this->addSql('ALTER TABLE video_price_service ADD CONSTRAINT FK_81C17EBE29C1004E FOREIGN KEY (video_id) REFERENCES video (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE video_price_service ADD CONSTRAINT FK_81C17EBE59D4A6E2 FOREIGN KEY (price_service_id) REFERENCES price__services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE working_day ADD CONSTRAINT FK_41EBDDE8139A4A41 FOREIGN KEY (day_of_week_id) REFERENCES day_of_week (id)');
        $this->addSql('ALTER TABLE working_day ADD CONSTRAINT FK_41EBDDE84C91BDE4 FOREIGN KEY (salon_id) REFERENCES salon (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE before_after_price_service DROP FOREIGN KEY FK_64AEC4BD90DE50AF');
        $this->addSql('ALTER TABLE district DROP FOREIGN KEY FK_31C154878BAC62AF');
        $this->addSql('ALTER TABLE salon DROP FOREIGN KEY FK_F268F4178BAC62AF');
        $this->addSql('ALTER TABLE subway_line DROP FOREIGN KEY FK_83D8D2C18BAC62AF');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A9727ACA70');
        $this->addSql('ALTER TABLE working_day DROP FOREIGN KEY FK_41EBDDE8139A4A41');
        $this->addSql('ALTER TABLE salon_district DROP FOREIGN KEY FK_4C829E7FB08FA272');
        $this->addSql('ALTER TABLE naschiraboty_price_service DROP FOREIGN KEY FK_ED89FEEE52A1D855');
        $this->addSql('ALTER TABLE our_works_price_service DROP FOREIGN KEY FK_D5AF833262D84DE6');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A944F5D008');
        $this->addSql('ALTER TABLE price__model DROP FOREIGN KEY FK_1034361544F5D008');
        $this->addSql('ALTER TABLE salon_price_brand DROP FOREIGN KEY FK_528CFCC32643EB1F');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A9159FD1F4');
        $this->addSql('ALTER TABLE price__categories DROP FOREIGN KEY FK_5E61FA06727ACA70');
        $this->addSql('ALTER TABLE price__services DROP FOREIGN KEY FK_DE4397F5159FD1F4');
        $this->addSql('ALTER TABLE price__brand DROP FOREIGN KEY FK_DBF3BD94ED4B199F');
        $this->addSql('ALTER TABLE price__model DROP FOREIGN KEY FK_10343615ED4B199F');
        $this->addSql('ALTER TABLE before_after DROP FOREIGN KEY FK_4459C2111BC38CF0');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A97975B7E7');
        $this->addSql('ALTER TABLE our_works DROP FOREIGN KEY FK_378B4B511BC38CF0');
        $this->addSql('ALTER TABLE salon_price_model DROP FOREIGN KEY FK_994B77421BC38CF0');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C1BC38CF0');
        $this->addSql('ALTER TABLE before_after_price_service DROP FOREIGN KEY FK_64AEC4BD59D4A6E2');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A9ED5CA9E6');
        $this->addSql('ALTER TABLE naschiraboty_price_service DROP FOREIGN KEY FK_ED89FEEE59D4A6E2');
        $this->addSql('ALTER TABLE our_works_price_service DROP FOREIGN KEY FK_D5AF833259D4A6E2');
        $this->addSql('ALTER TABLE salon_price_service DROP FOREIGN KEY FK_342735259D4A6E2');
        $this->addSql('ALTER TABLE video_price_service DROP FOREIGN KEY FK_81C17EBE59D4A6E2');
        $this->addSql('ALTER TABLE salon_price_brand DROP FOREIGN KEY FK_528CFCC34C91BDE4');
        $this->addSql('ALTER TABLE salon_price_model DROP FOREIGN KEY FK_994B77424C91BDE4');
        $this->addSql('ALTER TABLE salon_price_service DROP FOREIGN KEY FK_34273524C91BDE4');
        $this->addSql('ALTER TABLE salon_district DROP FOREIGN KEY FK_4C829E7F4C91BDE4');
        $this->addSql('ALTER TABLE salon_subway_station DROP FOREIGN KEY FK_90842E924C91BDE4');
        $this->addSql('ALTER TABLE working_day DROP FOREIGN KEY FK_41EBDDE84C91BDE4');
        $this->addSql('ALTER TABLE subway_station DROP FOREIGN KEY FK_1F68494CCD2AC4BF');
        $this->addSql('ALTER TABLE salon_subway_station DROP FOREIGN KEY FK_90842E927D13ACAD');
        $this->addSql('ALTER TABLE video_price_service DROP FOREIGN KEY FK_81C17EBE29C1004E');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C12469DE2');
        $this->addSql('DROP TABLE before_after');
        $this->addSql('DROP TABLE before_after_price_service');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE config');
        $this->addSql('DROP TABLE content');
        $this->addSql('DROP TABLE counter');
        $this->addSql('DROP TABLE day_of_week');
        $this->addSql('DROP TABLE district');
        $this->addSql('DROP TABLE faq');
        $this->addSql('DROP TABLE models_cyrillic');
        $this->addSql('DROP TABLE naschiraboty');
        $this->addSql('DROP TABLE naschiraboty_price_service');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE our_works');
        $this->addSql('DROP TABLE our_works_price_service');
        $this->addSql('DROP TABLE price__brand');
        $this->addSql('DROP TABLE price__categories');
        $this->addSql('DROP TABLE price__class');
        $this->addSql('DROP TABLE price__model');
        $this->addSql('DROP TABLE price__services');
        $this->addSql('DROP TABLE reviews');
        $this->addSql('DROP TABLE salon');
        $this->addSql('DROP TABLE salon_price_brand');
        $this->addSql('DROP TABLE salon_price_model');
        $this->addSql('DROP TABLE salon_price_service');
        $this->addSql('DROP TABLE salon_district');
        $this->addSql('DROP TABLE salon_subway_station');
        $this->addSql('DROP TABLE special_offer');
        $this->addSql('DROP TABLE subway_line');
        $this->addSql('DROP TABLE subway_station');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE video');
        $this->addSql('DROP TABLE video_price_service');
        $this->addSql('DROP TABLE video_category');
        $this->addSql('DROP TABLE working_day');
    }
}
