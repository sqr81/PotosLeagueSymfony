<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220403152358 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nfl_team DROP FOREIGN KEY FK_68F4FA0789C48F0B');
        $this->addSql('DROP INDEX IDX_68F4FA0789C48F0B ON nfl_team');
        $this->addSql('ALTER TABLE nfl_team DROP fan_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nfl_team ADD fan_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE nfl_team ADD CONSTRAINT FK_68F4FA0789C48F0B FOREIGN KEY (fan_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_68F4FA0789C48F0B ON nfl_team (fan_id)');
    }
}
