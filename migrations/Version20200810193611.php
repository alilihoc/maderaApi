<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200810193611 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE payment ADD step1_amount DOUBLE PRECISION NOT NULL, ADD step2_amount DOUBLE PRECISION NOT NULL, ADD step3_amount DOUBLE PRECISION NOT NULL, ADD step4_amount DOUBLE PRECISION NOT NULL, ADD step5_amount DOUBLE PRECISION NOT NULL, ADD step6_amount INT NOT NULL, ADD step7_amount DOUBLE PRECISION NOT NULL, ADD step8_amount DOUBLE PRECISION NOT NULL, CHANGE step6_percentage step6_percentage DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE payment DROP step1_amount, DROP step2_amount, DROP step3_amount, DROP step4_amount, DROP step5_amount, DROP step6_amount, DROP step7_amount, DROP step8_amount, CHANGE step6_percentage step6_percentage INT NOT NULL');
    }
}
