<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220411175234 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attribution DROP clients_id');
        $this->addSql('ALTER TABLE attribution RENAME INDEX fk_c751ed4919eb6921 TO IDX_C751ED4919EB6921');
        $this->addSql('ALTER TABLE compteur DROP client_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attribution ADD clients_id INT NOT NULL');
        $this->addSql('ALTER TABLE attribution RENAME INDEX idx_c751ed4919eb6921 TO FK_C751ED4919EB6921');
        $this->addSql('ALTER TABLE compteur ADD client_id INT NOT NULL');
    }
}
