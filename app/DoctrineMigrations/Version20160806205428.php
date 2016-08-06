<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160806205428 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE User CHANGE user_type user_type ENUM(\'adm\', \'ven\', \'cust\')');
        $this->addSql('INSERT INTO `Status` (`id`, `name`, `value`, `string_value`, `last_update_date_time`, `created_date_time`) VALUES(1, \'Active\', \'1000\', \'ACTIVE\', NULL, \'2016-08-06 20:44:28\'),(2, \'Inactive\', \'1001\', \'INACTIVE\', NULL, \'2016-08-06 20:44:49\'),(3, \'Deleted\', \'1002\', \'DELETED\', NULL, \'2016-08-06 20:45:04\'),(4, \'Blocked\', \'1003\', \'BLOCKED\', NULL, \'2016-08-06 20:45:18\'),(5, \'Featured\', \'1004\', \'FEATURED\', NULL, \'2016-08-06 20:45:41\'),(6, \'Latest\', \'1005\', \'LATEST\', NULL, \'2016-08-06 20:45:58\'),(7, \'Processing\', \'1006\', \'PROCESSING\', NULL, \'2016-08-06 20:46:16\'),(8, \'Delivered\', \'1007\', \'DELIVERED\', NULL, \'2016-08-06 20:46:38\'),(9, \'Out_of_Stock\', \'1008\', \'OUTOFSTOCK\', NULL, \'2016-08-06 20:47:04\'),(10, \'Initiated\', \'1009\', \'INITIATED\', NULL, \'2016-08-06 20:47:31\'),(11, \'Damaged\', \'1010\', \'DAMAGED\', NULL, \'2016-08-06 20:47:48\'),(12, \'Expired\', \'1011\', \'EXPIRED\', NULL, \'2016-08-06 20:47:57\')');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE User CHANGE user_type user_type VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
    }
}
