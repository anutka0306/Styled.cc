<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200426070726 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $classes = [
            1 => 1200,
            2 => 1250,
            3 => 1300,
        ];
        $this->addSql('CREATE TABLE price__class (id INT AUTO_INCREMENT NOT NULL, price_of_hour INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        foreach ($classes as $id => $price_of_hour) {
            $this->addSql('REPLACE INTO price__class SET id = ?,price_of_hour = ?',[$id,$price_of_hour]);
        }

        $this->addSql('ALTER TABLE price__brand ADD CONSTRAINT FK_DBF3BD94ED4B199F FOREIGN KEY (class) REFERENCES price__class (id)');
        $this->addSql('CREATE INDEX IDX_DBF3BD94ED4B199F ON price__brand (class)');

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE price__brand DROP FOREIGN KEY FK_DBF3BD94ED4B199F');
        $this->addSql('DROP TABLE price__class');
    }
}
