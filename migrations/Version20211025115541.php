<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211025115541 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE emprunteur (id INT AUTO_INCREMENT NOT NULL, category_emprunteur_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, nom_famille_enfant VARCHAR(255) NOT NULL, prenom_enfant VARCHAR(255) NOT NULL, nom_famille_parent VARCHAR(255) NOT NULL, nom_famille_salarie_lgo VARCHAR(255) DEFAULT NULL, prenom_salarie_lgo VARCHAR(255) DEFAULT NULL, service_lgo VARCHAR(255) DEFAULT NULL, structure_partenaire VARCHAR(255) DEFAULT NULL, groupe_partenaire VARCHAR(255) DEFAULT NULL, INDEX IDX_952067DEEE5F257C (category_emprunteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE emprunteur ADD CONSTRAINT FK_952067DEEE5F257C FOREIGN KEY (category_emprunteur_id) REFERENCES category_emprunteur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE emprunteur');
    }
}
