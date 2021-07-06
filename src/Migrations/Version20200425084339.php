<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200425084339 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Добавление таблицы салонов и связующих таблиц';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE salon (id INT AUTO_INCREMENT NOT NULL, address VARCHAR(255) NOT NULL, working_hours_from VARCHAR(10) NOT NULL, working_hours_to VARCHAR(10) NOT NULL, name VARCHAR(255) NOT NULL, metro VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, alias VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salon_price_brand (salon_id INT NOT NULL, price_brand_id INT NOT NULL, INDEX IDX_528CFCC34C91BDE4 (salon_id), INDEX IDX_528CFCC32643EB1F (price_brand_id), PRIMARY KEY(salon_id, price_brand_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salon_price_model (salon_id INT NOT NULL, price_model_id INT NOT NULL, INDEX IDX_994B77424C91BDE4 (salon_id), INDEX IDX_994B77421BC38CF0 (price_model_id), PRIMARY KEY(salon_id, price_model_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salon_price_service (salon_id INT NOT NULL, price_service_id INT NOT NULL, INDEX IDX_34273524C91BDE4 (salon_id), INDEX IDX_342735259D4A6E2 (price_service_id), PRIMARY KEY(salon_id, price_service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE salon_price_brand ADD CONSTRAINT FK_528CFCC34C91BDE4 FOREIGN KEY (salon_id) REFERENCES salon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salon_price_brand ADD CONSTRAINT FK_528CFCC32643EB1F FOREIGN KEY (price_brand_id) REFERENCES price__brand (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salon_price_model ADD CONSTRAINT FK_994B77424C91BDE4 FOREIGN KEY (salon_id) REFERENCES salon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salon_price_model ADD CONSTRAINT FK_994B77421BC38CF0 FOREIGN KEY (price_model_id) REFERENCES price__model (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salon_price_service ADD CONSTRAINT FK_34273524C91BDE4 FOREIGN KEY (salon_id) REFERENCES salon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salon_price_service ADD CONSTRAINT FK_342735259D4A6E2 FOREIGN KEY (price_service_id) REFERENCES price__services (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE salon_price_brand DROP FOREIGN KEY FK_528CFCC34C91BDE4');
        $this->addSql('ALTER TABLE salon_price_model DROP FOREIGN KEY FK_994B77424C91BDE4');
        $this->addSql('ALTER TABLE salon_price_service DROP FOREIGN KEY FK_34273524C91BDE4');
        $this->addSql('DROP TABLE salon');
        $this->addSql('DROP TABLE salon_price_brand');
        $this->addSql('DROP TABLE salon_price_model');
        $this->addSql('DROP TABLE salon_price_service');
    }
}
