<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200810193037 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE payment ADD step1_name VARCHAR(255) NOT NULL, ADD step1_percentage INT NOT NULL, ADD step1_state TINYINT(1) NOT NULL, ADD step2_name VARCHAR(255) NOT NULL, ADD step2_percentage INT NOT NULL, ADD step2_state TINYINT(1) NOT NULL, ADD step3_name VARCHAR(255) NOT NULL, ADD step3_percentage INT NOT NULL, ADD step3_state TINYINT(1) NOT NULL, ADD step4_name VARCHAR(255) NOT NULL, ADD step4_percentage INT NOT NULL, ADD step4_state TINYINT(1) NOT NULL, ADD step5_name VARCHAR(255) NOT NULL, ADD step5_percentage INT NOT NULL, ADD step5_state TINYINT(1) NOT NULL, ADD step6_name VARCHAR(255) NOT NULL, ADD step6_percentage INT NOT NULL, ADD step6_state TINYINT(1) NOT NULL, ADD step7_name VARCHAR(255) NOT NULL, ADD step7_percentage INT NOT NULL, ADD step7_state TINYINT(1) NOT NULL, ADD step8_name VARCHAR(255) NOT NULL, ADD step8_percentage INT NOT NULL, ADD step8_state TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE payment DROP step1_name, DROP step1_percentage, DROP step1_state, DROP step2_name, DROP step2_percentage, DROP step2_state, DROP step3_name, DROP step3_percentage, DROP step3_state, DROP step4_name, DROP step4_percentage, DROP step4_state, DROP step5_name, DROP step5_percentage, DROP step5_state, DROP step6_name, DROP step6_percentage, DROP step6_state, DROP step7_name, DROP step7_percentage, DROP step7_state, DROP step8_name, DROP step8_percentage, DROP step8_state');
    }
}
