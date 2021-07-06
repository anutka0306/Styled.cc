<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200214062853 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE our_works (id INT AUTO_INCREMENT NOT NULL, price_model_id INT NOT NULL, INDEX IDX_378B4B511BC38CF0 (price_model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE our_works_price_service (our_works_id INT NOT NULL, price_service_id INT NOT NULL, INDEX IDX_D5AF833262D84DE6 (our_works_id), INDEX IDX_D5AF833259D4A6E2 (price_service_id), PRIMARY KEY(our_works_id, price_service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE our_works ADD CONSTRAINT FK_378B4B511BC38CF0 FOREIGN KEY (price_model_id) REFERENCES price__model (id)');
        $this->addSql('ALTER TABLE our_works_price_service ADD CONSTRAINT FK_D5AF833262D84DE6 FOREIGN KEY (our_works_id) REFERENCES our_works (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE our_works_price_service ADD CONSTRAINT FK_D5AF833259D4A6E2 FOREIGN KEY (price_service_id) REFERENCES price__services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE before_after DROP FOREIGN KEY FK_4459C2112643EB1F');
        $this->addSql('DROP INDEX IDX_4459C2112643EB1F ON before_after');
        $this->addSql('ALTER TABLE before_after DROP price_brand_id');
        
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE our_works_price_service DROP FOREIGN KEY FK_D5AF833262D84DE6');
        $this->addSql('DROP TABLE our_works');
        $this->addSql('DROP TABLE our_works_price_service');
        $this->addSql('ALTER TABLE before_after ADD price_brand_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE before_after ADD CONSTRAINT FK_4459C2112643EB1F FOREIGN KEY (price_brand_id) REFERENCES price__brand (id)');
        $this->addSql('CREATE INDEX IDX_4459C2112643EB1F ON before_after (price_brand_id)');
        $this->addSql('DROP INDEX name ON config');
        $this->addSql('CREATE UNIQUE INDEX name ON config (name)');
    }
}
