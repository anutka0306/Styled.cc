<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210322161154 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE working_day (id INT AUTO_INCREMENT NOT NULL, day_of_week_id INT NOT NULL, salon_id INT NOT NULL, working_hours_from VARCHAR(10) DEFAULT NULL, working_hours_to VARCHAR(10) DEFAULT NULL, day_off TINYINT(1) DEFAULT \'0\' NOT NULL, INDEX IDX_41EBDDE8139A4A41 (day_of_week_id), INDEX IDX_41EBDDE84C91BDE4 (salon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE working_day ADD CONSTRAINT FK_41EBDDE8139A4A41 FOREIGN KEY (day_of_week_id) REFERENCES day_of_week (id)');
        $this->addSql('ALTER TABLE working_day ADD CONSTRAINT FK_41EBDDE84C91BDE4 FOREIGN KEY (salon_id) REFERENCES salon (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE working_day');
    }
}
