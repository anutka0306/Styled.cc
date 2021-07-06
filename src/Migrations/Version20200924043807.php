<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200924043807 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Adding field modify_date to before_after';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE before_after ADD modify_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL on update CURRENT_TIMESTAMP');
        $this->addSql('UPDATE before_after set before_img = ?, after_img = ?', [
            'before.jpg',
            'after.jpg',
        ]);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE before_after DROP modify_date');
    }
}
