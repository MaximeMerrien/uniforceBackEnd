<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191216150757 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE actualite (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compo_equipe (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compo_evenement (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compo_jeu (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeu (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, date_sortie DATETIME DEFAULT NULL, deiteur VARCHAR(255) DEFAULT NULL, mode_jeu VARCHAR(255) NOT NULL, categorie VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materiel (id INT AUTO_INCREMENT NOT NULL, nom_materiel VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, date_achat DATETIME NOT NULL, quantite INT NOT NULL, etat VARCHAR(255) DEFAULT NULL, lieu_stockage VARCHAR(255) DEFAULT NULL, specs VARCHAR(255) DEFAULT NULL, infos VARCHAR(255) DEFAULT NULL, prix DOUBLE PRECISION DEFAULT NULL, fournisseur VARCHAR(255) DEFAULT NULL, dispo VARCHAR(255) DEFAULT NULL, marque VARCHAR(255) DEFAULT NULL, modele VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE palmares (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, date_naissance DATE DEFAULT NULL, mail VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, statut VARCHAR(255) NOT NULL, niveau VARCHAR(255) DEFAULT NULL, pseudo_joueur VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_1D1C63B386CC499D (pseudo), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE actualite');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE compo_equipe');
        $this->addSql('DROP TABLE compo_evenement');
        $this->addSql('DROP TABLE compo_jeu');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE jeu');
        $this->addSql('DROP TABLE materiel');
        $this->addSql('DROP TABLE palmares');
        $this->addSql('DROP TABLE utilisateur');
    }
}
