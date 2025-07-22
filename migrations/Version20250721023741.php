<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250721023741 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE electric_specification (id INT AUTO_INCREMENT NOT NULL, time_to_charge120_v INT DEFAULT NULL, time_to_charge240_v INT DEFAULT NULL, c240_dscr VARCHAR(255) DEFAULT NULL, charge240b VARCHAR(255) DEFAULT NULL, c240_bdscr VARCHAR(255) DEFAULT NULL, electric_motor VARCHAR(255) DEFAULT NULL, epa_range_ft2 INT DEFAULT NULL, mfr_code VARCHAR(255) DEFAULT NULL, phev_city INT DEFAULT NULL, phev_highway INT DEFAULT NULL, phev_combined INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE engine (id INT AUTO_INCREMENT NOT NULL, cylinders INT DEFAULT NULL, displacement NUMERIC(5, 2) DEFAULT NULL, drive VARCHAR(255) DEFAULT NULL, engine_descriptor VARCHAR(255) DEFAULT NULL, epa_model_type_index INT DEFAULT NULL, system_start_stop VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fuel_specification (id INT AUTO_INCREMENT NOT NULL, fuel_type VARCHAR(255) DEFAULT NULL, fuel_type1 VARCHAR(255) DEFAULT NULL, fuel_type2 VARCHAR(255) DEFAULT NULL, epa_fuel_economy_score INT DEFAULT NULL, ghg_score INT DEFAULT NULL, ghg_score_alternative_fuel INT DEFAULT NULL, annual_petroleum_consumption_ft1 NUMERIC(15, 10) DEFAULT NULL, annual_petroleum_consumption_ft2 NUMERIC(15, 10) DEFAULT NULL, annual_fuel_cost_ft1 INT DEFAULT NULL, annual_fuel_cost_ft2 INT DEFAULT NULL, city_mpg_ft1 INT DEFAULT NULL, city_mpg_ft2 INT DEFAULT NULL, unrounded_city_mpg_ft1 NUMERIC(15, 10) DEFAULT NULL, unrounded_city_mpg_ft2 NUMERIC(15, 10) DEFAULT NULL, combined_mpg_ft1 INT DEFAULT NULL, combined_mpg_ft2 INT DEFAULT NULL, unrounded_combined_mpg_ft1 NUMERIC(15, 10) DEFAULT NULL, unrounded_combined_mpg_ft2 NUMERIC(15, 10) DEFAULT NULL, highway_mpg_ft1 INT DEFAULT NULL, highway_mpg_ft2 INT DEFAULT NULL, unrounded_highway_mpg_ft1 NUMERIC(15, 10) DEFAULT NULL, unrounded_highway_mpg_ft2 NUMERIC(15, 10) DEFAULT NULL, city_gasoline_consumption NUMERIC(15, 10) DEFAULT NULL, city_electricity_consumption NUMERIC(15, 10) DEFAULT NULL, combined_electricity_consumption NUMERIC(15, 10) DEFAULT NULL, combined_gasoline_consumption NUMERIC(15, 10) DEFAULT NULL, highway_gasoline_consumption NUMERIC(15, 10) DEFAULT NULL, highway_electricity_consumption NUMERIC(15, 10) DEFAULT NULL, co2_ft1 NUMERIC(15, 10) DEFAULT NULL, co2_ft2 NUMERIC(15, 10) DEFAULT NULL, co2_tailpipe_ft1 NUMERIC(15, 10) DEFAULT NULL, co2_tail_pipe_ft2 NUMERIC(15, 10) DEFAULT NULL, epa_city_utility_factor NUMERIC(15, 10) DEFAULT NULL, epa_combined_utility_factor NUMERIC(15, 10) DEFAULT NULL, epa_highway_utility_factor NUMERIC(15, 10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE performance_data (id INT AUTO_INCREMENT NOT NULL, range_ft1 INT DEFAULT NULL, range_city_ft1 INT DEFAULT NULL, range_city_ft2 INT DEFAULT NULL, range_highway_ft1 INT DEFAULT NULL, range_highway_ft2 INT DEFAULT NULL, unadjusted_city_mpg_ft1 NUMERIC(8, 4) DEFAULT NULL, unadjusted_city_mpg_ft2 NUMERIC(8, 4) DEFAULT NULL, unadjusted_highway_mpg_ft1 NUMERIC(8, 4) DEFAULT NULL, unadjusted_highway_mpg_ft2 NUMERIC(8, 4) DEFAULT NULL, mpg_data VARCHAR(255) DEFAULT NULL, phev_blended TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transmission (id INT AUTO_INCREMENT NOT NULL, transmission VARCHAR(255) DEFAULT NULL, transmission_descriptor VARCHAR(255) DEFAULT NULL, t_charger VARCHAR(255) DEFAULT NULL, s_charger VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, engine_specs_id INT DEFAULT NULL, fuel_specs_id INT DEFAULT NULL, transmission_specs_id INT DEFAULT NULL, dimension_specs_id INT DEFAULT NULL, performance_specs_id INT DEFAULT NULL, electric_specs_id INT DEFAULT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, year INT NOT NULL, base_model VARCHAR(255) DEFAULT NULL, vehicle_size_class VARCHAR(255) DEFAULT NULL, atv_type VARCHAR(255) DEFAULT NULL, guzzler VARCHAR(255) DEFAULT NULL, vehicle_save_spend INT DEFAULT NULL, created_on DATE DEFAULT NULL, modified_on DATE DEFAULT NULL, INDEX IDX_1B80E48617469268 (engine_specs_id), INDEX IDX_1B80E486F2AE23BA (fuel_specs_id), INDEX IDX_1B80E486226990F2 (transmission_specs_id), INDEX IDX_1B80E4862465B5E2 (dimension_specs_id), INDEX IDX_1B80E48646A97D17 (performance_specs_id), INDEX IDX_1B80E486F7CA1386 (electric_specs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_dimensions (id INT AUTO_INCREMENT NOT NULL, hatchback_luggage_volume INT DEFAULT NULL, hatchback_passenger_volume INT DEFAULT NULL, two_door_luggage_volume INT DEFAULT NULL, four_door_luggage_volume INT DEFAULT NULL, two_door_passenger_volume INT DEFAULT NULL, four_door_passenger_volume INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E48617469268 FOREIGN KEY (engine_specs_id) REFERENCES engine (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E486F2AE23BA FOREIGN KEY (fuel_specs_id) REFERENCES fuel_specification (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E486226990F2 FOREIGN KEY (transmission_specs_id) REFERENCES transmission (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4862465B5E2 FOREIGN KEY (dimension_specs_id) REFERENCES vehicle_dimensions (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E48646A97D17 FOREIGN KEY (performance_specs_id) REFERENCES performance_data (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E486F7CA1386 FOREIGN KEY (electric_specs_id) REFERENCES electric_specification (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E48617469268');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E486F2AE23BA');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E486226990F2');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E4862465B5E2');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E48646A97D17');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E486F7CA1386');
        $this->addSql('DROP TABLE electric_specification');
        $this->addSql('DROP TABLE engine');
        $this->addSql('DROP TABLE fuel_specification');
        $this->addSql('DROP TABLE performance_data');
        $this->addSql('DROP TABLE transmission');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('DROP TABLE vehicle_dimensions');
    }
}
