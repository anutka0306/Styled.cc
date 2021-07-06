<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200425111938 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Добавление дополнительных полей салона';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE salon ADD wa_phone VARCHAR(255) DEFAULT NULL, ADD mango_id INT DEFAULT NULL, ADD yandex_target VARCHAR(255) DEFAULT NULL,  ADD yandex_map_link LONGTEXT DEFAULT NULL, ADD yandex_navigator_link LONGTEXT DEFAULT NULL, ADD google_map_link LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE salon DROP wa_phone, DROP yandex_target, DROP mango_id, DROP yandex_map_link, DROP yandex_navigator_link, DROP google_map_link');
    }
}
