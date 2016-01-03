<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160103002658 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE BlogPost ADD media_id INT DEFAULT NULL, DROP media');
        $this->addSql('ALTER TABLE BlogPost ADD CONSTRAINT FK_4BC03615EA9FDD75 FOREIGN KEY (media_id) REFERENCES media__media (id)');
        $this->addSql('CREATE INDEX IDX_4BC03615EA9FDD75 ON BlogPost (media_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE BlogPost DROP FOREIGN KEY FK_4BC03615EA9FDD75');
        $this->addSql('DROP INDEX IDX_4BC03615EA9FDD75 ON BlogPost');
        $this->addSql('ALTER TABLE BlogPost ADD media VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, DROP media_id');
    }
}
