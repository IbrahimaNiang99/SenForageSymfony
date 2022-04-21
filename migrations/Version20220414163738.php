<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220414163738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abonnement (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, clients_id INT NOT NULL, date_abon DATE NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_351268BB67B3B43D (users_id), INDEX IDX_351268BBAB014612 (clients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE attribution (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, num_compteur_id INT NOT NULL, client_id INT NOT NULL, date_attr DATE NOT NULL, INDEX IDX_C751ED4967B3B43D (users_id), INDEX IDX_C751ED49D0DED5F8 (num_compteur_id), INDEX IDX_C751ED4919EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, villages_id INT DEFAULT NULL, nom VARCHAR(100) NOT NULL, adresse VARCHAR(100) NOT NULL, telephone NUMERIC(10, 0) NOT NULL, INDEX IDX_C744045567B3B43D (users_id), INDEX IDX_C7440455E499527C (villages_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compteur (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, attribution_id INT DEFAULT NULL, numero VARCHAR(100) NOT NULL, cumul NUMERIC(10, 0) NOT NULL, INDEX IDX_4D021BD567B3B43D (users_id), INDEX IDX_4D021BD5EEB69F7B (attribution_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consommation (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, numero_compteur_id INT NOT NULL, periode INT NOT NULL, cumul INT NOT NULL, quantite INT NOT NULL, INDEX IDX_F993F0A267B3B43D (users_id), INDEX IDX_F993F0A2E58497DF (numero_compteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, reglement_id INT NOT NULL, users_id INT NOT NULL, consommation_id INT NOT NULL, numero NUMERIC(10, 0) NOT NULL, montant NUMERIC(10, 0) NOT NULL, date DATE NOT NULL, etat TINYINT(1) NOT NULL, INDEX IDX_FE8664106A477111 (reglement_id), INDEX IDX_FE86641067B3B43D (users_id), INDEX IDX_FE866410C1076F84 (consommation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reglement (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, numero NUMERIC(10, 0) NOT NULL, date_r DATE NOT NULL, INDEX IDX_EBE4C14C67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, roles_id INT NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D64938C751C4 (roles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE village (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, nom VARCHAR(255) NOT NULL, chef_village VARCHAR(50) NOT NULL, INDEX IDX_4E6C7FAA67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BB67B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BBAB014612 FOREIGN KEY (clients_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE attribution ADD CONSTRAINT FK_C751ED4967B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE attribution ADD CONSTRAINT FK_C751ED49D0DED5F8 FOREIGN KEY (num_compteur_id) REFERENCES compteur (id)');
        $this->addSql('ALTER TABLE attribution ADD CONSTRAINT FK_C751ED4919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C744045567B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455E499527C FOREIGN KEY (villages_id) REFERENCES village (id)');
        $this->addSql('ALTER TABLE compteur ADD CONSTRAINT FK_4D021BD567B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE compteur ADD CONSTRAINT FK_4D021BD5EEB69F7B FOREIGN KEY (attribution_id) REFERENCES attribution (id)');
        $this->addSql('ALTER TABLE consommation ADD CONSTRAINT FK_F993F0A267B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE consommation ADD CONSTRAINT FK_F993F0A2E58497DF FOREIGN KEY (numero_compteur_id) REFERENCES compteur (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE8664106A477111 FOREIGN KEY (reglement_id) REFERENCES reglement (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE86641067B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410C1076F84 FOREIGN KEY (consommation_id) REFERENCES consommation (id)');
        $this->addSql('ALTER TABLE reglement ADD CONSTRAINT FK_EBE4C14C67B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64938C751C4 FOREIGN KEY (roles_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE village ADD CONSTRAINT FK_4E6C7FAA67B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compteur DROP FOREIGN KEY FK_4D021BD5EEB69F7B');
        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BBAB014612');
        $this->addSql('ALTER TABLE attribution DROP FOREIGN KEY FK_C751ED4919EB6921');
        $this->addSql('ALTER TABLE attribution DROP FOREIGN KEY FK_C751ED49D0DED5F8');
        $this->addSql('ALTER TABLE consommation DROP FOREIGN KEY FK_F993F0A2E58497DF');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410C1076F84');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE8664106A477111');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64938C751C4');
        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BB67B3B43D');
        $this->addSql('ALTER TABLE attribution DROP FOREIGN KEY FK_C751ED4967B3B43D');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C744045567B3B43D');
        $this->addSql('ALTER TABLE compteur DROP FOREIGN KEY FK_4D021BD567B3B43D');
        $this->addSql('ALTER TABLE consommation DROP FOREIGN KEY FK_F993F0A267B3B43D');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE86641067B3B43D');
        $this->addSql('ALTER TABLE reglement DROP FOREIGN KEY FK_EBE4C14C67B3B43D');
        $this->addSql('ALTER TABLE village DROP FOREIGN KEY FK_4E6C7FAA67B3B43D');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455E499527C');
        $this->addSql('DROP TABLE abonnement');
        $this->addSql('DROP TABLE attribution');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE compteur');
        $this->addSql('DROP TABLE consommation');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE reglement');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE village');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
