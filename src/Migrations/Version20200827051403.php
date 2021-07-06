<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200827051403 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Adding seo-fields to Reviews';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reviews ADD name VARCHAR(250) DEFAULT NULL, ADD h1 VARCHAR(250) DEFAULT NULL, ADD meta_title VARCHAR(250) DEFAULT NULL, ADD meta_description TEXT DEFAULT NULL, CHANGE autor autor VARCHAR(255) NOT NULL, CHANGE ocenka ocenka INT NOT NULL, CHANGE photo_name photo_name VARCHAR(255) NOT NULL, CHANGE published published TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reviews DROP name, DROP h1, DROP meta_title, DROP meta_description, CHANGE autor autor VARCHAR(250) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE ocenka ocenka TINYINT(1) DEFAULT \'5\' NOT NULL, CHANGE photo_name photo_name VARCHAR(250) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE published published TINYINT(1) DEFAULT \'1\' NOT NULL');
    }
}
