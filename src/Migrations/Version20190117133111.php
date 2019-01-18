<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190117133111 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE logement ADD commodites VARCHAR(255) NOT NULL, ADD reglement VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495577E5854A FOREIGN KEY (mode_id) REFERENCES type_paiement (id)');
        $this->addSql('CREATE INDEX IDX_42C8495577E5854A ON reservation (mode_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE logement DROP commodites, DROP reglement, CHANGE ville_id ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495577E5854A');
        $this->addSql('DROP INDEX IDX_42C8495577E5854A ON reservation');
    }
}
