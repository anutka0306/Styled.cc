<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200827041941 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Adding seo-fields to FAQ';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE faq ADD h1 VARCHAR(250) DEFAULT NULL, ADD meta_title VARCHAR(250) DEFAULT NULL, ADD meta_description TEXT DEFAULT NULL, CHANGE name name VARCHAR(250) DEFAULT NULL');

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE faq DROP h1, DROP meta_title, DROP meta_description, CHANGE name name VARCHAR(250) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
    }
}
