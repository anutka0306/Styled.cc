<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200206062301 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, price_model_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, text LONGTEXT DEFAULT NULL, link VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_7CC7DA2C1BC38CF0 (price_model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video_price_service (video_id INT NOT NULL, price_service_id INT NOT NULL, INDEX IDX_81C17EBE29C1004E (video_id), INDEX IDX_81C17EBE59D4A6E2 (price_service_id), PRIMARY KEY(video_id, price_service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C1BC38CF0 FOREIGN KEY (price_model_id) REFERENCES price__model (id)');
        $this->addSql('ALTER TABLE video_price_service ADD CONSTRAINT FK_81C17EBE29C1004E FOREIGN KEY (video_id) REFERENCES video (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE video_price_service ADD CONSTRAINT FK_81C17EBE59D4A6E2 FOREIGN KEY (price_service_id) REFERENCES price__services (id) ON DELETE CASCADE');
       
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE video_price_service DROP FOREIGN KEY FK_81C17EBE29C1004E');
        $this->addSql('DROP TABLE video');
        $this->addSql('DROP TABLE video_price_service');
    }
}
