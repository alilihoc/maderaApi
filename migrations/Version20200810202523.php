<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200810202523 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE payment ADD step1_date_paiement DATETIME NOT NULL, ADD step2_date_paiement DATETIME NOT NULL, ADD step3_date_paiement DATETIME NOT NULL, ADD step4_date_paiement DATETIME NOT NULL, ADD step5_date_paiement DATETIME NOT NULL, ADD step6_date_paiement DATETIME NOT NULL, ADD step7_date_paiement DATETIME NOT NULL, ADD step8_date_paiement DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE payment DROP step1_date_paiement, DROP step2_date_paiement, DROP step3_date_paiement, DROP step4_date_paiement, DROP step5_date_paiement, DROP step6_date_paiement, DROP step7_date_paiement, DROP step8_date_paiement');
    }
}
