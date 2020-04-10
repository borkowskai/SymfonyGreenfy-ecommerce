<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200410135429 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE flower ADD description LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE wish ADD flower_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE wish ADD CONSTRAINT FK_D7D174C92C09D409 FOREIGN KEY (flower_id) REFERENCES flower (id)');
        $this->addSql('CREATE INDEX IDX_D7D174C92C09D409 ON wish (flower_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE flower DROP description');
        $this->addSql('ALTER TABLE wish DROP FOREIGN KEY FK_D7D174C92C09D409');
        $this->addSql('DROP INDEX IDX_D7D174C92C09D409 ON wish');
        $this->addSql('ALTER TABLE wish DROP flower_id');
    }
}
