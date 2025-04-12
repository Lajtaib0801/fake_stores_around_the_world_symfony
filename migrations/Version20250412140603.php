<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250412140603 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE cities (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, name VARCHAR(255) NOT NULL, is_capital TINYINT(1) NOT NULL, INDEX IDX_D95DB16BF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE countries (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, continent VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5D66EBAD5E237E06 (name), UNIQUE INDEX UNIQ_5D66EBAD77153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE people (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, birthday DATE NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, is_male TINYINT(1) NOT NULL, picture VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE stores (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, founded_date DATE DEFAULT NULL, opening_time TIME DEFAULT NULL, closing_time TIME DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_D5907CCCD4E6F81 (address), INDEX IDX_D5907CCC8BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE cities ADD CONSTRAINT FK_D95DB16BF92F3E70 FOREIGN KEY (country_id) REFERENCES countries (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE stores ADD CONSTRAINT FK_D5907CCC8BAC62AF FOREIGN KEY (city_id) REFERENCES cities (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE cities DROP FOREIGN KEY FK_D95DB16BF92F3E70
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE stores DROP FOREIGN KEY FK_D5907CCC8BAC62AF
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE cities
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE countries
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE people
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE stores
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
    }
}
