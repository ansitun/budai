<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160807020956 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE OrderBasket (id INT AUTO_INCREMENT NOT NULL, order_id INT NOT NULL, product_id INT NOT NULL, status_id SMALLINT NOT NULL, quantity INT DEFAULT NULL, last_update_date_time DATETIME DEFAULT NULL, created_date_time DATETIME NOT NULL, INDEX IDX_AAD042FB8D9F6D38 (order_id), INDEX IDX_AAD042FB4584665A (product_id), INDEX IDX_AAD042FB6BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Rating (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, product_id INT NOT NULL, status_id SMALLINT NOT NULL, rating SMALLINT NOT NULL, description TEXT DEFAULT NULL, last_update_date_time DATETIME DEFAULT NULL, created_date_time DATETIME NOT NULL, INDEX IDX_DF252314A76ED395 (user_id), INDEX IDX_DF2523144584665A (product_id), INDEX IDX_DF2523146BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Comment (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, product_id INT NOT NULL, status_id SMALLINT NOT NULL, title VARCHAR(100) DEFAULT NULL, description TEXT DEFAULT NULL, last_update_date_time DATETIME DEFAULT NULL, created_date_time DATETIME NOT NULL, INDEX IDX_5BC96BF0A76ED395 (user_id), INDEX IDX_5BC96BF04584665A (product_id), INDEX IDX_5BC96BF06BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Address (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, first_name VARCHAR(50) DEFAULT NULL, last_name VARCHAR(50) DEFAULT NULL, street VARCHAR(100) DEFAULT NULL, land_mark VARCHAR(100) DEFAULT NULL, city VARCHAR(100) DEFAULT NULL, state VARCHAR(100) DEFAULT NULL, country VARCHAR(100) DEFAULT NULL, zip_code INT DEFAULT NULL, phone INT DEFAULT NULL, created_date_time DATETIME NOT NULL, INDEX IDX_C2F3561DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Product (id INT AUTO_INCREMENT NOT NULL, status_id SMALLINT NOT NULL, name VARCHAR(100) DEFAULT NULL, description TEXT DEFAULT NULL, last_update_date_time DATETIME DEFAULT NULL, created_date_time DATETIME NOT NULL, price NUMERIC(10, 2) DEFAULT NULL, discount_price NUMERIC(10, 2) DEFAULT NULL, tax NUMERIC(10, 2) DEFAULT NULL, sku VARCHAR(100) NOT NULL, key_words TEXT DEFAULT NULL, image_url VARCHAR(511) DEFAULT NULL, thumbnail_url VARCHAR(511) DEFAULT NULL, INDEX IDX_1CF73D316BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ShoppingCart (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, user_id INT NOT NULL, quantity INT DEFAULT NULL, last_update_date_time DATETIME DEFAULT NULL, created_date_time DATETIME NOT NULL, INDEX IDX_2B2F00824584665A (product_id), INDEX IDX_2B2F0082A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `Order` (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, address_id INT NOT NULL, sku VARCHAR(30) NOT NULL, total_price NUMERIC(10, 2) DEFAULT NULL, discounted_price NUMERIC(10, 2) DEFAULT NULL, last_update_date_time DATETIME DEFAULT NULL, created_date_time DATETIME NOT NULL, INDEX IDX_34E8BC9CA76ED395 (user_id), INDEX IDX_34E8BC9CF5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Category (id INT AUTO_INCREMENT NOT NULL, status_id SMALLINT NOT NULL, name VARCHAR(100) DEFAULT NULL, description TEXT DEFAULT NULL, last_update_date_time DATETIME DEFAULT NULL, created_date_time DATETIME NOT NULL, INDEX IDX_FF3A7B976BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ProductCategory (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, category_id INT NOT NULL, user_id INT NOT NULL, last_update_date_time DATETIME DEFAULT NULL, created_date_time DATETIME NOT NULL, INDEX IDX_D26EBFC44584665A (product_id), INDEX IDX_D26EBFC412469DE2 (category_id), INDEX IDX_D26EBFC4A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Status (id SMALLINT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, value VARCHAR(4) NOT NULL, string_value VARCHAR(20) NOT NULL, last_update_date_time DATETIME DEFAULT NULL, created_date_time DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE OrderBasket ADD CONSTRAINT FK_AAD042FB8D9F6D38 FOREIGN KEY (order_id) REFERENCES `Order` (id)');
        $this->addSql('ALTER TABLE OrderBasket ADD CONSTRAINT FK_AAD042FB4584665A FOREIGN KEY (product_id) REFERENCES Product (id)');
        $this->addSql('ALTER TABLE OrderBasket ADD CONSTRAINT FK_AAD042FB6BF700BD FOREIGN KEY (status_id) REFERENCES Status (id)');
        $this->addSql('ALTER TABLE Rating ADD CONSTRAINT FK_DF252314A76ED395 FOREIGN KEY (user_id) REFERENCES User (id)');
        $this->addSql('ALTER TABLE Rating ADD CONSTRAINT FK_DF2523144584665A FOREIGN KEY (product_id) REFERENCES Product (id)');
        $this->addSql('ALTER TABLE Rating ADD CONSTRAINT FK_DF2523146BF700BD FOREIGN KEY (status_id) REFERENCES Status (id)');
        $this->addSql('ALTER TABLE Comment ADD CONSTRAINT FK_5BC96BF0A76ED395 FOREIGN KEY (user_id) REFERENCES User (id)');
        $this->addSql('ALTER TABLE Comment ADD CONSTRAINT FK_5BC96BF04584665A FOREIGN KEY (product_id) REFERENCES Product (id)');
        $this->addSql('ALTER TABLE Comment ADD CONSTRAINT FK_5BC96BF06BF700BD FOREIGN KEY (status_id) REFERENCES Status (id)');
        $this->addSql('ALTER TABLE Address ADD CONSTRAINT FK_C2F3561DA76ED395 FOREIGN KEY (user_id) REFERENCES User (id)');
        $this->addSql('ALTER TABLE Product ADD CONSTRAINT FK_1CF73D316BF700BD FOREIGN KEY (status_id) REFERENCES Status (id)');
        $this->addSql('ALTER TABLE ShoppingCart ADD CONSTRAINT FK_2B2F00824584665A FOREIGN KEY (product_id) REFERENCES Product (id)');
        $this->addSql('ALTER TABLE ShoppingCart ADD CONSTRAINT FK_2B2F0082A76ED395 FOREIGN KEY (user_id) REFERENCES User (id)');
        $this->addSql('ALTER TABLE `Order` ADD CONSTRAINT FK_34E8BC9CA76ED395 FOREIGN KEY (user_id) REFERENCES User (id)');
        $this->addSql('ALTER TABLE `Order` ADD CONSTRAINT FK_34E8BC9CF5B7AF75 FOREIGN KEY (address_id) REFERENCES Address (id)');
        $this->addSql('ALTER TABLE Category ADD CONSTRAINT FK_FF3A7B976BF700BD FOREIGN KEY (status_id) REFERENCES Status (id)');
        $this->addSql('ALTER TABLE ProductCategory ADD CONSTRAINT FK_D26EBFC44584665A FOREIGN KEY (product_id) REFERENCES Product (id)');
        $this->addSql('ALTER TABLE ProductCategory ADD CONSTRAINT FK_D26EBFC412469DE2 FOREIGN KEY (category_id) REFERENCES Category (id)');
        $this->addSql('ALTER TABLE ProductCategory ADD CONSTRAINT FK_D26EBFC4A76ED395 FOREIGN KEY (user_id) REFERENCES User (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Order DROP FOREIGN KEY FK_34E8BC9CF5B7AF75');
        $this->addSql('ALTER TABLE OrderBasket DROP FOREIGN KEY FK_AAD042FB4584665A');
        $this->addSql('ALTER TABLE Rating DROP FOREIGN KEY FK_DF2523144584665A');
        $this->addSql('ALTER TABLE Comment DROP FOREIGN KEY FK_5BC96BF04584665A');
        $this->addSql('ALTER TABLE ShoppingCart DROP FOREIGN KEY FK_2B2F00824584665A');
        $this->addSql('ALTER TABLE ProductCategory DROP FOREIGN KEY FK_D26EBFC44584665A');
        $this->addSql('ALTER TABLE OrderBasket DROP FOREIGN KEY FK_AAD042FB8D9F6D38');
        $this->addSql('ALTER TABLE ProductCategory DROP FOREIGN KEY FK_D26EBFC412469DE2');
        $this->addSql('ALTER TABLE Rating DROP FOREIGN KEY FK_DF252314A76ED395');
        $this->addSql('ALTER TABLE Comment DROP FOREIGN KEY FK_5BC96BF0A76ED395');
        $this->addSql('ALTER TABLE Address DROP FOREIGN KEY FK_C2F3561DA76ED395');
        $this->addSql('ALTER TABLE ShoppingCart DROP FOREIGN KEY FK_2B2F0082A76ED395');
        $this->addSql('ALTER TABLE Order DROP FOREIGN KEY FK_34E8BC9CA76ED395');
        $this->addSql('ALTER TABLE ProductCategory DROP FOREIGN KEY FK_D26EBFC4A76ED395');
        $this->addSql('ALTER TABLE OrderBasket DROP FOREIGN KEY FK_AAD042FB6BF700BD');
        $this->addSql('ALTER TABLE Rating DROP FOREIGN KEY FK_DF2523146BF700BD');
        $this->addSql('ALTER TABLE Comment DROP FOREIGN KEY FK_5BC96BF06BF700BD');
        $this->addSql('ALTER TABLE Product DROP FOREIGN KEY FK_1CF73D316BF700BD');
        $this->addSql('ALTER TABLE Category DROP FOREIGN KEY FK_FF3A7B976BF700BD');
        $this->addSql('DROP TABLE OrderBasket');
        $this->addSql('DROP TABLE Rating');
        $this->addSql('DROP TABLE Comment');
        $this->addSql('DROP TABLE Address');
        $this->addSql('DROP TABLE Product');
        $this->addSql('DROP TABLE ShoppingCart');
        $this->addSql('DROP TABLE `Order`');
        $this->addSql('DROP TABLE Category');
        $this->addSql('DROP TABLE ProductCategory');
        $this->addSql('DROP TABLE Status');
    }
}
