<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210608155201 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pay (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, payment_date DATETIME NOT NULL, payment_grounds LONGTEXT NOT NULL, payment_status INT NOT NULL, amount DOUBLE PRECISION NOT NULL, ticket_number VARCHAR(255) NOT NULL, INDEX IDX_FE8F223C19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seller (id INT AUTO_INCREMENT NOT NULL, pay_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, contact_phone_number VARCHAR(255) NOT NULL, flooz_phone_number VARCHAR(255) NOT NULL, INDEX IDX_FB1AD3FC918501AB (pay_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pay ADD CONSTRAINT FK_FE8F223C19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE seller ADD CONSTRAINT FK_FB1AD3FC918501AB FOREIGN KEY (pay_id) REFERENCES pay (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pay DROP FOREIGN KEY FK_FE8F223C19EB6921');
        $this->addSql('ALTER TABLE seller DROP FOREIGN KEY FK_FB1AD3FC918501AB');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE pay');
        $this->addSql('DROP TABLE seller');
    }
}
