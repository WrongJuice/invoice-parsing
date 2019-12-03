<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191203122100 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE notes (id INT AUTO_INCREMENT NOT NULL, sa_bande_dessinee_id INT NOT NULL, valeur INT NOT NULL, INDEX IDX_11BA68C32B6F29F (sa_bande_dessinee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, sa_bande_dessinee_id INT NOT NULL, auteur VARCHAR(25) NOT NULL, contenu VARCHAR(250) NOT NULL, INDEX IDX_67F068BC32B6F29F (sa_bande_dessinee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bande_dessinee (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(50) NOT NULL, auteur VARCHAR(50) NOT NULL, description VARCHAR(250) NOT NULL, genre VARCHAR(25) NOT NULL, sous_genre VARCHAR(25) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE notes ADD CONSTRAINT FK_11BA68C32B6F29F FOREIGN KEY (sa_bande_dessinee_id) REFERENCES bande_dessinee (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC32B6F29F FOREIGN KEY (sa_bande_dessinee_id) REFERENCES bande_dessinee (id)');
        $this->addSql('DROP TABLE test');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE notes DROP FOREIGN KEY FK_11BA68C32B6F29F');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC32B6F29F');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, test VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE notes');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE bande_dessinee');
    }
}
