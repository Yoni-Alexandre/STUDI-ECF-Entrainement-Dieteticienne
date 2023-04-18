<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230418150058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF083B016C1');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0EA724598');
        $this->addSql('DROP INDEX IDX_8F91ABF083B016C1 ON avis');
        $this->addSql('DROP INDEX IDX_8F91ABF0EA724598 ON avis');
        $this->addSql('ALTER TABLE avis DROP recette_id_id, DROP patient_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis ADD recette_id_id INT NOT NULL, ADD patient_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF083B016C1 FOREIGN KEY (recette_id_id) REFERENCES recette (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0EA724598 FOREIGN KEY (patient_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8F91ABF083B016C1 ON avis (recette_id_id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF0EA724598 ON avis (patient_id_id)');
    }
}
