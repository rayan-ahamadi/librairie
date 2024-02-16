<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240214111156 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE livre (id INT AUTO_INCREMENT NOT NULL, isbn VARCHAR(50) NOT NULL, titre_livre VARCHAR(100) NOT NULL, theme_livre VARCHAR(100) NOT NULL, nbr_pages_livre BIGINT NOT NULL, format_livre VARCHAR(50) NOT NULL, nom_auteur VARCHAR(100) NOT NULL, prenom_auteur VARCHAR(100) NOT NULL, editeur VARCHAR(100) NOT NULL, annee_edition BIGINT NOT NULL, prix_vente NUMERIC(5, 2) NOT NULL, langue_livre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commander DROP FOREIGN KEY commander_ibfk_1');
        $this->addSql('DROP TABLE commander');
        $this->addSql('DROP TABLE fournisseurs');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('ALTER TABLE livres MODIFY Id_Livre INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON livres');
        $this->addSql('ALTER TABLE livres DROP ISBN, DROP Titre_livre, DROP theme_livre, DROP nbr_pages_livre, DROP Format_livre, DROP Nom_auteur, DROP Prenom_auteur, DROP Editeur, DROP annee_edition, DROP prix_vente, DROP Langue_livre, CHANGE Id_Livre id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE livres ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE available_at available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commander (id INT AUTO_INCREMENT NOT NULL, Date_achat DATE NOT NULL, prix_achat NUMERIC(5, 2) NOT NULL, nbr_exemplaires BIGINT NOT NULL, Id_Livre INT NOT NULL, Id_fournisseur INT NOT NULL, idUtilisateur INT NOT NULL, INDEX Id_Livre (Id_Livre), INDEX Id_fournisseur (Id_fournisseur), INDEX idUtilisateur (idUtilisateur), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE fournisseurs (Id_fournisseur INT AUTO_INCREMENT NOT NULL, code_fournisseur VARCHAR(50) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, raison_sociale VARCHAR(50) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, rue_fournisseur VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, code_postal VARCHAR(50) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, localite VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, pays VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, tel_fournisseur VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, url_fournisseur VARCHAR(100) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, email_fournisseur VARCHAR(100) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, fax_fournisseur VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, PRIMARY KEY(Id_fournisseur)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utilisateur (idUtilisateur INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, nom VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, prenom VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, date_naissance DATE NOT NULL, adresse VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, code_postal VARCHAR(5) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, localite VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, tel VARCHAR(15) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, date DATE NOT NULL, MdP VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, statut VARCHAR(50) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, PRIMARY KEY(idUtilisateur)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE commander ADD CONSTRAINT commander_ibfk_1 FOREIGN KEY (Id_Livre) REFERENCES livres (Id_Livre) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE livre');
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL, CHANGE available_at available_at DATETIME NOT NULL, CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE livres MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON livres');
        $this->addSql('ALTER TABLE livres ADD ISBN VARCHAR(50) NOT NULL, ADD Titre_livre VARCHAR(100) NOT NULL, ADD theme_livre VARCHAR(100) NOT NULL, ADD nbr_pages_livre BIGINT NOT NULL, ADD Format_livre VARCHAR(50) NOT NULL, ADD Nom_auteur VARCHAR(100) NOT NULL, ADD Prenom_auteur VARCHAR(100) NOT NULL, ADD Editeur VARCHAR(100) NOT NULL, ADD annee_edition BIGINT NOT NULL, ADD prix_vente NUMERIC(5, 2) NOT NULL, ADD Langue_livre VARCHAR(50) NOT NULL, CHANGE id Id_Livre INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE livres ADD PRIMARY KEY (Id_Livre)');
    }
}
