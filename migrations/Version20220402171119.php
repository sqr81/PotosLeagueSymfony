<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220402171119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fantasy_team DROP FOREIGN KEY FK_FD8AF7E653B6268F');
        $this->addSql('DROP TABLE fantasy_team_statistic');
        $this->addSql('DROP INDEX IDX_FD8AF7E653B6268F ON fantasy_team');
        $this->addSql('ALTER TABLE fantasy_team DROP statistic_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fantasy_team_statistic (id INT AUTO_INCREMENT NOT NULL, win INT NOT NULL, lose INT NOT NULL, tie INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE fantasy_team ADD statistic_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fantasy_team ADD CONSTRAINT FK_FD8AF7E653B6268F FOREIGN KEY (statistic_id) REFERENCES fantasy_team_statistic (id)');
        $this->addSql('CREATE INDEX IDX_FD8AF7E653B6268F ON fantasy_team (statistic_id)');
    }
}
