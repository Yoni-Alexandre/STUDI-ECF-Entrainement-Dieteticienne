<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230421091539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE allergene ADD allergene_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE allergene ADD CONSTRAINT FK_93232AE54646AB2 FOREIGN KEY (allergene_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_93232AE54646AB2 ON allergene (allergene_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE allergene DROP FOREIGN KEY FK_93232AE54646AB2');
        $this->addSql('DROP INDEX IDX_93232AE54646AB2 ON allergene');
        $this->addSql('ALTER TABLE allergene DROP allergene_id');
    }
}
