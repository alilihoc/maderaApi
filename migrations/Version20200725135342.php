<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200725135342 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plan DROP FOREIGN KEY FK_DD5A5B7D166D1F9C');
        $this->addSql('DROP INDEX UNIQ_DD5A5B7D166D1F9C ON plan');
        $this->addSql('ALTER TABLE plan DROP project_id');
        $this->addSql('ALTER TABLE project DROP INDEX UNIQ_2FB3D0EEE899029B, ADD INDEX IDX_2FB3D0EEE899029B (plan_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plan ADD project_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE plan ADD CONSTRAINT FK_DD5A5B7D166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DD5A5B7D166D1F9C ON plan (project_id)');
        $this->addSql('ALTER TABLE project DROP INDEX IDX_2FB3D0EEE899029B, ADD UNIQUE INDEX UNIQ_2FB3D0EEE899029B (plan_id)');
    }
}
