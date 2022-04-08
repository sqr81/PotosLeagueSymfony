<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220403152923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD nflteam_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649309916BF FOREIGN KEY (nflteam_id) REFERENCES nfl_team (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649309916BF ON user (nflteam_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649309916BF');
        $this->addSql('DROP INDEX IDX_8D93D649309916BF ON `user`');
        $this->addSql('ALTER TABLE `user` DROP nflteam_id');
    }
}
