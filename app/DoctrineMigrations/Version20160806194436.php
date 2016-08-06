<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160806194436 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, status_id SMALLINT NOT NULL, name VARCHAR(100) DEFAULT NULL, description TEXT DEFAULT NULL, last_update_date_time DATETIME DEFAULT NULL, created_date_time DATETIME NOT NULL, INDEX IDX_64C19C16BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id SMALLINT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, value VARCHAR(4) NOT NULL, string_value VARCHAR(20) NOT NULL, last_update_date_time DATETIME DEFAULT NULL, created_date_time DATETIME NOT NULL, INDEX status_idx (string_value, value), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C16BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C16BF700BD');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE status');
    }
}
