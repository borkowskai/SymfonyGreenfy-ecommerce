<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200404222002 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE company_address ADD client_id INT DEFAULT NULL, ADD order_number_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE company_address ADD CONSTRAINT FK_2D1C755619EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE company_address ADD CONSTRAINT FK_2D1C75568C26A5E8 FOREIGN KEY (order_number_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_2D1C755619EB6921 ON company_address (client_id)');
        $this->addSql('CREATE INDEX IDX_2D1C75568C26A5E8 ON company_address (order_number_id)');
        $this->addSql('ALTER TABLE daily_inventory ADD flower_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE daily_inventory ADD CONSTRAINT FK_3029532C2C09D409 FOREIGN KEY (flower_id) REFERENCES flower (id)');
        $this->addSql('CREATE INDEX IDX_3029532C2C09D409 ON daily_inventory (flower_id)');
        $this->addSql('ALTER TABLE flower ADD color_id INT DEFAULT NULL, ADD size_id INT DEFAULT NULL, ADD plant_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE flower ADD CONSTRAINT FK_A7D7C1DA7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE flower ADD CONSTRAINT FK_A7D7C1DA498DA827 FOREIGN KEY (size_id) REFERENCES size (id)');
        $this->addSql('ALTER TABLE flower ADD CONSTRAINT FK_A7D7C1DABFC546EA FOREIGN KEY (plant_type_id) REFERENCES plant_type (id)');
        $this->addSql('CREATE INDEX IDX_A7D7C1DA7ADA1FB5 ON flower (color_id)');
        $this->addSql('CREATE INDEX IDX_A7D7C1DA498DA827 ON flower (size_id)');
        $this->addSql('CREATE INDEX IDX_A7D7C1DABFC546EA ON flower (plant_type_id)');
        $this->addSql('ALTER TABLE `order` ADD client_id INT DEFAULT NULL, ADD payment_id INT NOT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939819EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993984C3A3BB FOREIGN KEY (payment_id) REFERENCES payment_type (id)');
        $this->addSql('CREATE INDEX IDX_F529939819EB6921 ON `order` (client_id)');
        $this->addSql('CREATE INDEX IDX_F52993984C3A3BB ON `order` (payment_id)');
        $this->addSql('ALTER TABLE order_line ADD order_number_id INT DEFAULT NULL, ADD flower_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE18C26A5E8 FOREIGN KEY (order_number_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE12C09D409 FOREIGN KEY (flower_id) REFERENCES flower (id)');
        $this->addSql('CREATE INDEX IDX_9CE58EE18C26A5E8 ON order_line (order_number_id)');
        $this->addSql('CREATE INDEX IDX_9CE58EE12C09D409 ON order_line (flower_id)');
        $this->addSql('ALTER TABLE wish ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE wish ADD CONSTRAINT FK_D7D174C919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_D7D174C919EB6921 ON wish (client_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE company_address DROP FOREIGN KEY FK_2D1C755619EB6921');
        $this->addSql('ALTER TABLE company_address DROP FOREIGN KEY FK_2D1C75568C26A5E8');
        $this->addSql('DROP INDEX IDX_2D1C755619EB6921 ON company_address');
        $this->addSql('DROP INDEX IDX_2D1C75568C26A5E8 ON company_address');
        $this->addSql('ALTER TABLE company_address DROP client_id, DROP order_number_id');
        $this->addSql('ALTER TABLE daily_inventory DROP FOREIGN KEY FK_3029532C2C09D409');
        $this->addSql('DROP INDEX IDX_3029532C2C09D409 ON daily_inventory');
        $this->addSql('ALTER TABLE daily_inventory DROP flower_id');
        $this->addSql('ALTER TABLE flower DROP FOREIGN KEY FK_A7D7C1DA7ADA1FB5');
        $this->addSql('ALTER TABLE flower DROP FOREIGN KEY FK_A7D7C1DA498DA827');
        $this->addSql('ALTER TABLE flower DROP FOREIGN KEY FK_A7D7C1DABFC546EA');
        $this->addSql('DROP INDEX IDX_A7D7C1DA7ADA1FB5 ON flower');
        $this->addSql('DROP INDEX IDX_A7D7C1DA498DA827 ON flower');
        $this->addSql('DROP INDEX IDX_A7D7C1DABFC546EA ON flower');
        $this->addSql('ALTER TABLE flower DROP color_id, DROP size_id, DROP plant_type_id');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939819EB6921');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993984C3A3BB');
        $this->addSql('DROP INDEX IDX_F529939819EB6921 ON `order`');
        $this->addSql('DROP INDEX IDX_F52993984C3A3BB ON `order`');
        $this->addSql('ALTER TABLE `order` DROP client_id, DROP payment_id');
        $this->addSql('ALTER TABLE order_line DROP FOREIGN KEY FK_9CE58EE18C26A5E8');
        $this->addSql('ALTER TABLE order_line DROP FOREIGN KEY FK_9CE58EE12C09D409');
        $this->addSql('DROP INDEX IDX_9CE58EE18C26A5E8 ON order_line');
        $this->addSql('DROP INDEX IDX_9CE58EE12C09D409 ON order_line');
        $this->addSql('ALTER TABLE order_line DROP order_number_id, DROP flower_id');
        $this->addSql('ALTER TABLE wish DROP FOREIGN KEY FK_D7D174C919EB6921');
        $this->addSql('DROP INDEX IDX_D7D174C919EB6921 ON wish');
        $this->addSql('ALTER TABLE wish DROP client_id');
    }
}
