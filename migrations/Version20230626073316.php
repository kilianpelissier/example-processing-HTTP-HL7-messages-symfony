<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230626073316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE patient_identification (id INT AUTO_INCREMENT NOT NULL, set_id_patient INT NOT NULL, patient_id INT NOT NULL, patient_identifier_list VARCHAR(255) DEFAULT NULL, alternate_patient_id INT DEFAULT NULL, patient_name VARCHAR(255) DEFAULT NULL, mother_maiden_name VARCHAR(255) DEFAULT NULL, date_time_of_birth VARCHAR(255) DEFAULT NULL, administrative_sex VARCHAR(25) DEFAULT NULL, patient_alias VARCHAR(255) DEFAULT NULL, ethnicity VARCHAR(255) DEFAULT NULL, patient_adress VARCHAR(500) DEFAULT NULL, country_code VARCHAR(25) DEFAULT NULL, phone_number_home VARCHAR(25) DEFAULT NULL, phone_number_business VARCHAR(25) DEFAULT NULL, primary_language VARCHAR(50) DEFAULT NULL, marital_status VARCHAR(25) DEFAULT NULL, religion VARCHAR(255) DEFAULT NULL, patient_account_number VARCHAR(255) NOT NULL, ssnnumber VARCHAR(255) DEFAULT NULL, driver_licence_number VARCHAR(255) DEFAULT NULL, mother_identifier VARCHAR(255) DEFAULT NULL, ethnic_group VARCHAR(255) DEFAULT NULL, birth_place VARCHAR(255) DEFAULT NULL, multiple_birth VARCHAR(255) DEFAULT NULL, multiple_birth_indicator VARCHAR(255) DEFAULT NULL, birth_order VARCHAR(150) DEFAULT NULL, citizenship VARCHAR(255) DEFAULT NULL, veterans_military_status VARCHAR(255) DEFAULT NULL, nationality VARCHAR(255) DEFAULT NULL, patient_death_date_time VARCHAR(25) DEFAULT NULL, patient_death_indicator VARCHAR(255) DEFAULT NULL, identity_unknown_indicator VARCHAR(255) DEFAULT NULL, identity_reliability_code VARCHAR(255) DEFAULT NULL, last_update_date_time VARCHAR(25) DEFAULT NULL, last_update_facility VARCHAR(255) DEFAULT NULL, production_class_code VARCHAR(255) DEFAULT NULL, in_visit TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE patient_identification');
    }
}
