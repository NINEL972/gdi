<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220527125925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demandes ADD type_demande_id INT DEFAULT NULL, ADD type_etat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE demandes ADD CONSTRAINT FK_BD940CBB9DEA883D FOREIGN KEY (type_demande_id) REFERENCES demande_types (id)');
        $this->addSql('ALTER TABLE demandes ADD CONSTRAINT FK_BD940CBB257FE90A FOREIGN KEY (type_etat_id) REFERENCES demande_etats (id)');
        $this->addSql('CREATE INDEX IDX_BD940CBB9DEA883D ON demandes (type_demande_id)');
        $this->addSql('CREATE INDEX IDX_BD940CBB257FE90A ON demandes (type_etat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demandes DROP FOREIGN KEY FK_BD940CBB9DEA883D');
        $this->addSql('ALTER TABLE demandes DROP FOREIGN KEY FK_BD940CBB257FE90A');
        $this->addSql('DROP INDEX IDX_BD940CBB9DEA883D ON demandes');
        $this->addSql('DROP INDEX IDX_BD940CBB257FE90A ON demandes');
        $this->addSql('ALTER TABLE demandes DROP type_demande_id, DROP type_etat_id');
    }
}
