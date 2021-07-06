<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200825163108 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'adding relation between naschiraboty and priceServices';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE naschiraboty_price_service (naschiraboty_id INT NOT NULL, price_service_id INT NOT NULL, INDEX IDX_ED89FEEE52A1D855 (naschiraboty_id), INDEX IDX_ED89FEEE59D4A6E2 (price_service_id), PRIMARY KEY(naschiraboty_id, price_service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE naschiraboty_price_service ADD CONSTRAINT FK_ED89FEEE52A1D855 FOREIGN KEY (naschiraboty_id) REFERENCES naschiraboty (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE naschiraboty_price_service ADD CONSTRAINT FK_ED89FEEE59D4A6E2 FOREIGN KEY (price_service_id) REFERENCES price__services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE faq CHANGE published published TINYINT(1) NOT NULL, CHANGE count_views count_views INT NOT NULL, CHANGE count_like count_like INT NOT NULL, CHANGE count_dislike count_dislike INT NOT NULL');
        $this->addSql('ALTER TABLE naschiraboty DROP category');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE naschiraboty_price_service');
        $this->addSql('ALTER TABLE naschiraboty ADD category VARCHAR(150) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
    }
}
