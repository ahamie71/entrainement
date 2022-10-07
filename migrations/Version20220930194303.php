<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220930194303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE achats (id INT AUTO_INCREMENT NOT NULL, offre_id INT NOT NULL, clients_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, datedachat DATE NOT NULL, quantite INT NOT NULL, INDEX IDX_9920924E4CC8505A (offre_id), INDEX IDX_9920924EAB014612 (clients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE catégorie (id INT AUTO_INCREMENT NOT NULL, vols VARCHAR(255) NOT NULL, trips VARCHAR(255) NOT NULL, hotels VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE companie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messages (id INT AUTO_INCREMENT NOT NULL, clients_id INT NOT NULL, titre VARCHAR(255) NOT NULL, text VARCHAR(255) NOT NULL, INDEX IDX_DB021E96AB014612 (clients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, companie_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, datedepublication DATE NOT NULL, datededebut DATE NOT NULL, datedefin DATE NOT NULL, tarif DOUBLE PRECISION NOT NULL, INDEX IDX_AF86866F9DC4CE1F (companie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre_categorie (id INT AUTO_INCREMENT NOT NULL, offre_id INT NOT NULL, categorie_id INT DEFAULT NULL, INDEX IDX_15F57ECB4CC8505A (offre_id), INDEX IDX_15F57ECBBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE achats ADD CONSTRAINT FK_9920924E4CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id)');
        $this->addSql('ALTER TABLE achats ADD CONSTRAINT FK_9920924EAB014612 FOREIGN KEY (clients_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E96AB014612 FOREIGN KEY (clients_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F9DC4CE1F FOREIGN KEY (companie_id) REFERENCES companie (id)');
        $this->addSql('ALTER TABLE offre_categorie ADD CONSTRAINT FK_15F57ECB4CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id)');
        $this->addSql('ALTER TABLE offre_categorie ADD CONSTRAINT FK_15F57ECBBCF5E72D FOREIGN KEY (categorie_id) REFERENCES catégorie (id)');
        $this->addSql('ALTER TABLE Client CHANGE password password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE User CHANGE roles roles JSON NOT NULL, CHANGE password password VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON User (email)');
        $this->addSql('ALTER TABLE Welcome CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achats DROP FOREIGN KEY FK_9920924E4CC8505A');
        $this->addSql('ALTER TABLE achats DROP FOREIGN KEY FK_9920924EAB014612');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E96AB014612');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F9DC4CE1F');
        $this->addSql('ALTER TABLE offre_categorie DROP FOREIGN KEY FK_15F57ECB4CC8505A');
        $this->addSql('ALTER TABLE offre_categorie DROP FOREIGN KEY FK_15F57ECBBCF5E72D');
        $this->addSql('DROP TABLE achats');
        $this->addSql('DROP TABLE catégorie');
        $this->addSql('DROP TABLE companie');
        $this->addSql('DROP TABLE messages');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE offre_categorie');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE client CHANGE password password VARCHAR(200) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user CHANGE roles roles VARCHAR(100) NOT NULL, CHANGE password password VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE welcome MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON welcome');
        $this->addSql('ALTER TABLE welcome CHANGE id id INT DEFAULT NULL');
    }
}
