<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211027072754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD date_acquisition DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849557294869C');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955F0840037');
        $this->addSql('ALTER TABLE reservation CHANGE emprunteur_id emprunteur_id INT NOT NULL, CHANGE article_id article_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849557294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955F0840037 FOREIGN KEY (emprunteur_id) REFERENCES emprunteur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP date_acquisition');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955F0840037');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849557294869C');
        $this->addSql('ALTER TABLE reservation CHANGE emprunteur_id emprunteur_id INT DEFAULT NULL, CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955F0840037 FOREIGN KEY (emprunteur_id) REFERENCES emprunteur (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849557294869C FOREIGN KEY (article_id) REFERENCES article (id)');
    }
}
