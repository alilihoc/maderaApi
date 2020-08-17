<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200810204749 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE payment CHANGE step1_date_paiement step1_date_paiement DATETIME DEFAULT NULL, CHANGE step2_date_paiement step2_date_paiement DATETIME DEFAULT NULL, CHANGE step3_date_paiement step3_date_paiement DATETIME DEFAULT NULL, CHANGE step4_date_paiement step4_date_paiement DATETIME DEFAULT NULL, CHANGE step5_date_paiement step5_date_paiement DATETIME DEFAULT NULL, CHANGE step6_date_paiement step6_date_paiement DATETIME DEFAULT NULL, CHANGE step7_date_paiement step7_date_paiement DATETIME DEFAULT NULL, CHANGE step8_date_paiement step8_date_paiement DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE payment CHANGE step1_date_paiement step1_date_paiement DATETIME NOT NULL, CHANGE step2_date_paiement step2_date_paiement DATETIME NOT NULL, CHANGE step3_date_paiement step3_date_paiement DATETIME NOT NULL, CHANGE step4_date_paiement step4_date_paiement DATETIME NOT NULL, CHANGE step5_date_paiement step5_date_paiement DATETIME NOT NULL, CHANGE step6_date_paiement step6_date_paiement DATETIME NOT NULL, CHANGE step7_date_paiement step7_date_paiement DATETIME NOT NULL, CHANGE step8_date_paiement step8_date_paiement DATETIME NOT NULL');
    }
}
