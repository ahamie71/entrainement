<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221004072649 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achats DROP FOREIGN KEY FK_9920924E6C83CD9F');
        $this->addSql('ALTER TABLE offre_categorie DROP FOREIGN KEY FK_15F57ECB6C83CD9F');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, companie_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, datedepublication DATE NOT NULL, datededebut DATE NOT NULL, datedefin DATE NOT NULL, tarif DOUBLE PRECISION NOT NULL, depart DATE NOT NULL, destination VARCHAR(255) NOT NULL, adressehotel VARCHAR(255) NOT NULL, INDEX IDX_AF86866F9DC4CE1F (companie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F9DC4CE1F FOREIGN KEY (companie_id) REFERENCES companie (id)');
        $this->addSql('ALTER TABLE offres DROP FOREIGN KEY FK_C6AC35446AE4741E');
        $this->addSql('DROP TABLE offres');
        $this->addSql('DROP INDEX IDX_9920924E6C83CD9F ON achats');
        $this->addSql('ALTER TABLE achats CHANGE offres_id offre_id INT NOT NULL');
        $this->addSql('ALTER TABLE achats ADD CONSTRAINT FK_9920924E4CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id)');
        $this->addSql('CREATE INDEX IDX_9920924E4CC8505A ON achats (offre_id)');
        $this->addSql('ALTER TABLE offre_categorie DROP FOREIGN KEY FK_15F57ECBA21214B7');
        $this->addSql('DROP INDEX IDX_15F57ECB6C83CD9F ON offre_categorie');
        $this->addSql('DROP INDEX IDX_15F57ECBA21214B7 ON offre_categorie');
        $this->addSql('ALTER TABLE offre_categorie CHANGE offres_id offre_id INT NOT NULL, CHANGE categories_id categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre_categorie ADD CONSTRAINT FK_15F57ECB4CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id)');
        $this->addSql('ALTER TABLE offre_categorie ADD CONSTRAINT FK_15F57ECBBCF5E72D FOREIGN KEY (categorie_id) REFERENCES catégorie (id)');
        $this->addSql('CREATE INDEX IDX_15F57ECB4CC8505A ON offre_categorie (offre_id)');
        $this->addSql('CREATE INDEX IDX_15F57ECBBCF5E72D ON offre_categorie (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achats DROP FOREIGN KEY FK_9920924E4CC8505A');
        $this->addSql('ALTER TABLE offre_categorie DROP FOREIGN KEY FK_15F57ECB4CC8505A');
        $this->addSql('CREATE TABLE offres (id INT AUTO_INCREMENT NOT NULL, companies_id INT NOT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, datedepublication DATE NOT NULL, datededebut DATE NOT NULL, datedefin DATE NOT NULL, tarif DOUBLE PRECISION NOT NULL, INDEX IDX_C6AC35446AE4741E (companies_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE offres ADD CONSTRAINT FK_C6AC35446AE4741E FOREIGN KEY (companies_id) REFERENCES companie (id)');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F9DC4CE1F');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP INDEX IDX_9920924E4CC8505A ON achats');
        $this->addSql('ALTER TABLE achats CHANGE offre_id offres_id INT NOT NULL');
        $this->addSql('ALTER TABLE achats ADD CONSTRAINT FK_9920924E6C83CD9F FOREIGN KEY (offres_id) REFERENCES offres (id)');
        $this->addSql('CREATE INDEX IDX_9920924E6C83CD9F ON achats (offres_id)');
        $this->addSql('ALTER TABLE offre_categorie DROP FOREIGN KEY FK_15F57ECBBCF5E72D');
        $this->addSql('DROP INDEX IDX_15F57ECB4CC8505A ON offre_categorie');
        $this->addSql('DROP INDEX IDX_15F57ECBBCF5E72D ON offre_categorie');
        $this->addSql('ALTER TABLE offre_categorie CHANGE offre_id offres_id INT NOT NULL, CHANGE categorie_id categories_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre_categorie ADD CONSTRAINT FK_15F57ECB6C83CD9F FOREIGN KEY (offres_id) REFERENCES offres (id)');
        $this->addSql('ALTER TABLE offre_categorie ADD CONSTRAINT FK_15F57ECBA21214B7 FOREIGN KEY (categories_id) REFERENCES catégorie (id)');
        $this->addSql('CREATE INDEX IDX_15F57ECB6C83CD9F ON offre_categorie (offres_id)');
        $this->addSql('CREATE INDEX IDX_15F57ECBA21214B7 ON offre_categorie (categories_id)');
    }
}
