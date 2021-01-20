<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210120220041 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(100) NOT NULL, email VARCHAR(255) NOT NULL, login VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, similar_color VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_address (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, company_name VARCHAR(200) DEFAULT NULL, street VARCHAR(200) NOT NULL, street_number INT NOT NULL, appart_number VARCHAR(100) DEFAULT NULL, city VARCHAR(255) NOT NULL, zipcode VARCHAR(200) NOT NULL, country VARCHAR(150) NOT NULL, phone VARCHAR(100) NOT NULL, is_delivery TINYINT(1) DEFAULT NULL, INDEX IDX_2D1C755619EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_order (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, delivery_customer_address_id INT DEFAULT NULL, payment_type_id INT DEFAULT NULL, num_order VARCHAR(255) DEFAULT NULL, date_order DATE DEFAULT NULL, INDEX IDX_3B1CE6A319EB6921 (client_id), INDEX IDX_3B1CE6A3DDC9FC85 (delivery_customer_address_id), INDEX IDX_3B1CE6A3DC058279 (payment_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE daily_inventory (id INT AUTO_INCREMENT NOT NULL, flower_id INT DEFAULT NULL, daily_level INT DEFAULT NULL, date_of_inventory DATE DEFAULT NULL, INDEX IDX_3029532C2C09D409 (flower_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flower (id INT AUTO_INCREMENT NOT NULL, color_id INT DEFAULT NULL, size_id INT DEFAULT NULL, plant_type_id INT DEFAULT NULL, name VARCHAR(200) NOT NULL, photo VARCHAR(255) DEFAULT NULL, price_excl_vat NUMERIC(10, 2) DEFAULT NULL, price_vat NUMERIC(10, 2) DEFAULT NULL, reorder_quantity INT DEFAULT NULL, reorder_level INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_A7D7C1DA7ADA1FB5 (color_id), INDEX IDX_A7D7C1DA498DA827 (size_id), INDEX IDX_A7D7C1DABFC546EA (plant_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_line (id INT AUTO_INCREMENT NOT NULL, flower_id INT DEFAULT NULL, customer_order_id INT DEFAULT NULL, quantity INT NOT NULL, actual_price_excl_vat NUMERIC(10, 2) DEFAULT NULL, actual_price_vat NUMERIC(10, 2) DEFAULT NULL, INDEX IDX_9CE58EE12C09D409 (flower_id), INDEX IDX_9CE58EE1A15A2E17 (customer_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment_type (id INT AUTO_INCREMENT NOT NULL, payment_type VARCHAR(100) DEFAULT NULL, payment_limit NUMERIC(10, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plant_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(200) DEFAULT NULL, plant_family VARCHAR(200) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE size (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tva (id INT AUTO_INCREMENT NOT NULL, tvavalue NUMERIC(10, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, first_name VARCHAR(100) DEFAULT NULL, last_name VARCHAR(150) DEFAULT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wish (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, flower_id INT DEFAULT NULL, INDEX IDX_D7D174C919EB6921 (client_id), INDEX IDX_D7D174C92C09D409 (flower_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company_address ADD CONSTRAINT FK_2D1C755619EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE customer_order ADD CONSTRAINT FK_3B1CE6A319EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE customer_order ADD CONSTRAINT FK_3B1CE6A3DDC9FC85 FOREIGN KEY (delivery_customer_address_id) REFERENCES company_address (id)');
        $this->addSql('ALTER TABLE customer_order ADD CONSTRAINT FK_3B1CE6A3DC058279 FOREIGN KEY (payment_type_id) REFERENCES payment_type (id)');
        $this->addSql('ALTER TABLE daily_inventory ADD CONSTRAINT FK_3029532C2C09D409 FOREIGN KEY (flower_id) REFERENCES flower (id)');
        $this->addSql('ALTER TABLE flower ADD CONSTRAINT FK_A7D7C1DA7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE flower ADD CONSTRAINT FK_A7D7C1DA498DA827 FOREIGN KEY (size_id) REFERENCES size (id)');
        $this->addSql('ALTER TABLE flower ADD CONSTRAINT FK_A7D7C1DABFC546EA FOREIGN KEY (plant_type_id) REFERENCES plant_type (id)');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE12C09D409 FOREIGN KEY (flower_id) REFERENCES flower (id)');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE1A15A2E17 FOREIGN KEY (customer_order_id) REFERENCES customer_order (id)');
        $this->addSql('ALTER TABLE wish ADD CONSTRAINT FK_D7D174C919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE wish ADD CONSTRAINT FK_D7D174C92C09D409 FOREIGN KEY (flower_id) REFERENCES flower (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE company_address DROP FOREIGN KEY FK_2D1C755619EB6921');
        $this->addSql('ALTER TABLE customer_order DROP FOREIGN KEY FK_3B1CE6A319EB6921');
        $this->addSql('ALTER TABLE wish DROP FOREIGN KEY FK_D7D174C919EB6921');
        $this->addSql('ALTER TABLE flower DROP FOREIGN KEY FK_A7D7C1DA7ADA1FB5');
        $this->addSql('ALTER TABLE customer_order DROP FOREIGN KEY FK_3B1CE6A3DDC9FC85');
        $this->addSql('ALTER TABLE order_line DROP FOREIGN KEY FK_9CE58EE1A15A2E17');
        $this->addSql('ALTER TABLE daily_inventory DROP FOREIGN KEY FK_3029532C2C09D409');
        $this->addSql('ALTER TABLE order_line DROP FOREIGN KEY FK_9CE58EE12C09D409');
        $this->addSql('ALTER TABLE wish DROP FOREIGN KEY FK_D7D174C92C09D409');
        $this->addSql('ALTER TABLE customer_order DROP FOREIGN KEY FK_3B1CE6A3DC058279');
        $this->addSql('ALTER TABLE flower DROP FOREIGN KEY FK_A7D7C1DABFC546EA');
        $this->addSql('ALTER TABLE flower DROP FOREIGN KEY FK_A7D7C1DA498DA827');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE company_address');
        $this->addSql('DROP TABLE customer_order');
        $this->addSql('DROP TABLE daily_inventory');
        $this->addSql('DROP TABLE flower');
        $this->addSql('DROP TABLE order_line');
        $this->addSql('DROP TABLE payment_type');
        $this->addSql('DROP TABLE plant_type');
        $this->addSql('DROP TABLE size');
        $this->addSql('DROP TABLE tva');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE wish');
    }
}
