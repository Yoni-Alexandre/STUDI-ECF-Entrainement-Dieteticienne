<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230425000600 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recette ADD regime_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB639035E7D534 FOREIGN KEY (regime_id) REFERENCES regime (id)');
        $this->addSql('CREATE INDEX IDX_49BB639035E7D534 ON recette (regime_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB639035E7D534');
        $this->addSql('DROP INDEX IDX_49BB639035E7D534 ON recette');
        $this->addSql('ALTER TABLE recette DROP regime_id');
    }
}
