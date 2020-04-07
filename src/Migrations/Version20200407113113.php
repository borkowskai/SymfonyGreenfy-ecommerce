<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200407113113 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE company_address ADD client_id INT DEFAULT NULL, CHANGE client is_delivery TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE company_address ADD CONSTRAINT FK_2D1C755619EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_2D1C755619EB6921 ON company_address (client_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE company_address DROP FOREIGN KEY FK_2D1C755619EB6921');
        $this->addSql('DROP INDEX IDX_2D1C755619EB6921 ON company_address');
        $this->addSql('ALTER TABLE company_address DROP client_id, CHANGE is_delivery client TINYINT(1) DEFAULT NULL');
    }
}
