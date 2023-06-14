<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614163511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE author2 (id INT AUTO_INCREMENT NOT NULL, name LONGTEXT NOT NULL, surname LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book2 (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, name LONGTEXT NOT NULL, year LONGTEXT NOT NULL, INDEX IDX_4BC05B94F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE book2 ADD CONSTRAINT FK_4BC05B94F675F31B FOREIGN KEY (author_id) REFERENCES author2 (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book2 DROP FOREIGN KEY FK_4BC05B94F675F31B');
        $this->addSql('DROP TABLE author2');
        $this->addSql('DROP TABLE book2');
    }
}
