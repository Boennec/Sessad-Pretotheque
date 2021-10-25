<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211025073557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE localisation_article DROP FOREIGN KEY FK_66766DFFC68BE09C');
        $this->addSql('CREATE TABLE category_emprunteur (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('DROP TABLE localisation');
        //$this->addSql('DROP TABLE localisation_article');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE localisation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, nom_enfant VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, prenom_enfant VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, etablissement VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, poste_occupe VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, date_debut DATETIME DEFAULT NULL, date_fin DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE localisation_article (localisation_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_66766DFFC68BE09C (localisation_id), INDEX IDX_66766DFF7294869C (article_id), PRIMARY KEY(localisation_id, article_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        //$this->addSql('ALTER TABLE localisation_article ADD CONSTRAINT FK_66766DFF7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        //$this->addSql('ALTER TABLE localisation_article ADD CONSTRAINT FK_66766DFFC68BE09C FOREIGN KEY (localisation_id) REFERENCES localisation (id) ON DELETE CASCADE');
        //$this->addSql('DROP TABLE category_emprunteur');
    }
}
