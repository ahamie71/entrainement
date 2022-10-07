<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220920102531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE achats (id INT AUTO_INCREMENT NOT NULL, offres_id INT NOT NULL, clients_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, datedachat DATE NOT NULL, quantite INT NOT NULL, INDEX IDX_9920924E6C83CD9F (offres_id), INDEX IDX_9920924EAB014612 (clients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE catégorie (id INT AUTO_INCREMENT NOT NULL, vols VARCHAR(255) NOT NULL, trips VARCHAR(255) NOT NULL, hotels VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE companie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messages (id INT AUTO_INCREMENT NOT NULL, clients_id INT NOT NULL, titre VARCHAR(255) NOT NULL, text VARCHAR(255) NOT NULL, INDEX IDX_DB021E96AB014612 (clients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre_categorie (id INT AUTO_INCREMENT NOT NULL, offres_id INT NOT NULL, categories_id INT DEFAULT NULL, INDEX IDX_15F57ECB6C83CD9F (offres_id), INDEX IDX_15F57ECBA21214B7 (categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offres (id INT AUTO_INCREMENT NOT NULL, companies_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, datedepublication DATE NOT NULL, datededebut DATE NOT NULL, datedefin DATE NOT NULL, tarif DOUBLE PRECISION NOT NULL, INDEX IDX_C6AC35446AE4741E (companies_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE achats ADD CONSTRAINT FK_9920924E6C83CD9F FOREIGN KEY (offres_id) REFERENCES offres (id)');
        $this->addSql('ALTER TABLE achats ADD CONSTRAINT FK_9920924EAB014612 FOREIGN KEY (clients_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E96AB014612 FOREIGN KEY (clients_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE offre_categorie ADD CONSTRAINT FK_15F57ECB6C83CD9F FOREIGN KEY (offres_id) REFERENCES offres (id)');
        $this->addSql('ALTER TABLE offre_categorie ADD CONSTRAINT FK_15F57ECBA21214B7 FOREIGN KEY (categories_id) REFERENCES catégorie (id)');
        $this->addSql('ALTER TABLE offres ADD CONSTRAINT FK_C6AC35446AE4741E FOREIGN KEY (companies_id) REFERENCES companie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achats DROP FOREIGN KEY FK_9920924E6C83CD9F');
        $this->addSql('ALTER TABLE achats DROP FOREIGN KEY FK_9920924EAB014612');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E96AB014612');
        $this->addSql('ALTER TABLE offre_categorie DROP FOREIGN KEY FK_15F57ECB6C83CD9F');
        $this->addSql('ALTER TABLE offre_categorie DROP FOREIGN KEY FK_15F57ECBA21214B7');
        $this->addSql('ALTER TABLE offres DROP FOREIGN KEY FK_C6AC35446AE4741E');
        $this->addSql('DROP TABLE achats');
        $this->addSql('DROP TABLE catégorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE companie');
        $this->addSql('DROP TABLE messages');
        $this->addSql('DROP TABLE offre_categorie');
        $this->addSql('DROP TABLE offres');
        $this->addSql('DROP TABLE messenger_messages');
        
    }
}
