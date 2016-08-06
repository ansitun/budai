<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160807030018 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Product ADD image_url2 VARCHAR(511) DEFAULT NULL, ADD image_url3 VARCHAR(511) DEFAULT NULL, ADD image_url4 VARCHAR(511) DEFAULT NULL');
        $this->addSql('ALTER TABLE User CHANGE user_type user_type ENUM(\'adm\', \'ven\', \'cust\')');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Product DROP image_url2, DROP image_url3, DROP image_url4');
        $this->addSql('ALTER TABLE User CHANGE user_type user_type VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
    }
}
