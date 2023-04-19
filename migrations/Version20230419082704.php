<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230419082704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recette_allergene CHANGE allergene_id allergene_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recette_allergene ADD CONSTRAINT FK_20F5442B4646AB2 FOREIGN KEY (allergene_id) REFERENCES allergene (id)');
        $this->addSql('CREATE INDEX IDX_20F5442B4646AB2 ON recette_allergene (allergene_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recette_allergene DROP FOREIGN KEY FK_20F5442B4646AB2');
        $this->addSql('DROP INDEX IDX_20F5442B4646AB2 ON recette_allergene');
        $this->addSql('ALTER TABLE recette_allergene CHANGE allergene_id allergene_id INT NOT NULL');
    }
}
