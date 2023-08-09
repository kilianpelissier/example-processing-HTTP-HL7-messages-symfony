<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230626083353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient_identification CHANGE set_id_patient set_id_patient VARCHAR(150) DEFAULT NULL, CHANGE patient_id patient_id VARCHAR(150) DEFAULT NULL, CHANGE alternate_patient_id alternate_patient_id VARCHAR(150) DEFAULT NULL, CHANGE patient_account_number patient_account_number VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient_identification CHANGE set_id_patient set_id_patient INT NOT NULL, CHANGE patient_id patient_id INT NOT NULL, CHANGE alternate_patient_id alternate_patient_id INT DEFAULT NULL, CHANGE patient_account_number patient_account_number VARCHAR(255) NOT NULL');
    }
}
