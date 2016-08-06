<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160806195747 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, status_id SMALLINT NOT NULL, name VARCHAR(100) DEFAULT NULL, description TEXT DEFAULT NULL, last_update_date_time DATETIME DEFAULT NULL, created_date_time DATETIME NOT NULL, price NUMERIC(10, 2) DEFAULT NULL, discount_price NUMERIC(10, 2) DEFAULT NULL, tax NUMERIC(10, 2) DEFAULT NULL, sku VARCHAR(100) NOT NULL, key_words TEXT DEFAULT NULL, image_url VARCHAR(511) DEFAULT NULL, thumbnail_url VARCHAR(511) DEFAULT NULL, INDEX IDX_D34A04AD6BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_category (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, category_id INT NOT NULL, user_id INT NOT NULL, name VARCHAR(100) DEFAULT NULL, last_update_date_time DATETIME DEFAULT NULL, created_date_time DATETIME NOT NULL, INDEX IDX_CDFC73564584665A (product_id), INDEX IDX_CDFC735612469DE2 (category_id), INDEX IDX_CDFC7356A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE product_category ADD CONSTRAINT FK_CDFC73564584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_category ADD CONSTRAINT FK_CDFC735612469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product_category ADD CONSTRAINT FK_CDFC7356A76ED395 FOREIGN KEY (user_id) REFERENCES User (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_category DROP FOREIGN KEY FK_CDFC73564584665A');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_category');
    }
}
