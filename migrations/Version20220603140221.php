<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220603140221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demandes ADD suivi_demande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE demandes ADD CONSTRAINT FK_BD940CBB2A8AB2BC FOREIGN KEY (suivi_demande_id) REFERENCES suivi_info (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BD940CBB2A8AB2BC ON demandes (suivi_demande_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demandes DROP FOREIGN KEY FK_BD940CBB2A8AB2BC');
        $this->addSql('DROP INDEX UNIQ_BD940CBB2A8AB2BC ON demandes');
        $this->addSql('ALTER TABLE demandes DROP suivi_demande_id');
    }
}
