<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200423092012 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE customer_order (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, delivery_customer_address_id INT DEFAULT NULL, payment_type_id INT DEFAULT NULL, num_order VARCHAR(255) DEFAULT NULL, date_order DATE DEFAULT NULL, INDEX IDX_3B1CE6A319EB6921 (client_id), INDEX IDX_3B1CE6A3DDC9FC85 (delivery_customer_address_id), INDEX IDX_3B1CE6A3DC058279 (payment_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE customer_order ADD CONSTRAINT FK_3B1CE6A319EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE customer_order ADD CONSTRAINT FK_3B1CE6A3DDC9FC85 FOREIGN KEY (delivery_customer_address_id) REFERENCES company_address (id)');
        $this->addSql('ALTER TABLE customer_order ADD CONSTRAINT FK_3B1CE6A3DC058279 FOREIGN KEY (payment_type_id) REFERENCES payment_type (id)');
        $this->addSql('ALTER TABLE company_address DROP FOREIGN KEY FK_2D1C755619EB6921');
        $this->addSql('DROP INDEX IDX_2D1C755619EB6921 ON company_address');
        $this->addSql('ALTER TABLE company_address DROP client_id');
        $this->addSql('ALTER TABLE order_line ADD customer_order_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE1A15A2E17 FOREIGN KEY (customer_order_id) REFERENCES customer_order (id)');
        $this->addSql('CREATE INDEX IDX_9CE58EE1A15A2E17 ON order_line (customer_order_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE order_line DROP FOREIGN KEY FK_9CE58EE1A15A2E17');
        $this->addSql('DROP TABLE customer_order');
        $this->addSql('ALTER TABLE company_address ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE company_address ADD CONSTRAINT FK_2D1C755619EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_2D1C755619EB6921 ON company_address (client_id)');
        $this->addSql('DROP INDEX IDX_9CE58EE1A15A2E17 ON order_line');
        $this->addSql('ALTER TABLE order_line DROP customer_order_id');
    }
}
