<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200607092145 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Добавляем мета-тэги видео и категории';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE video_category (id INT AUTO_INCREMENT NOT NULL, alias VARCHAR(255) NOT NULL, modify_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL on update CURRENT_TIMESTAMP, name VARCHAR(250) DEFAULT NULL, h1 VARCHAR(250) DEFAULT NULL, meta_title VARCHAR(250) DEFAULT NULL, meta_description TEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('ALTER TABLE video ADD category_id INT DEFAULT NULL, ADD modify_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL on update CURRENT_TIMESTAMP, ADD h1 VARCHAR(250) DEFAULT NULL, ADD meta_title VARCHAR(250) DEFAULT NULL, ADD meta_description TEXT DEFAULT NULL, ADD rating_value DOUBLE PRECISION DEFAULT \'4.8\' NOT NULL, ADD rating_count INT UNSIGNED DEFAULT 12 NOT NULL, CHANGE name name VARCHAR(250) DEFAULT NULL');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C12469DE2 FOREIGN KEY (category_id) REFERENCES video_category (id)');
        $this->addSql('CREATE INDEX IDX_7CC7DA2C12469DE2 ON video (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C12469DE2');
        $this->addSql('DROP TABLE video_category');

        $this->addSql('DROP INDEX IDX_7CC7DA2C12469DE2 ON video');
        $this->addSql('ALTER TABLE video DROP category_id, DROP modify_date, DROP h1, DROP meta_title, DROP meta_description, DROP rating_value, DROP rating_count, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
