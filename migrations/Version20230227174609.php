<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230227174609 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classroom (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, department VARCHAR(255) NOT NULL, number_of_menbers INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE score (id INT AUTO_INCREMENT NOT NULL, subject_id INT NOT NULL, student_id INT NOT NULL, UNIQUE INDEX UNIQ_3299375123EDC87 (subject_id), INDEX IDX_32993751CB944F1A (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, class_id INT NOT NULL, name VARCHAR(255) NOT NULL, dob DATE NOT NULL, gender VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, INDEX IDX_B723AF33EA000B10 (class_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subject (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_3299375123EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_32993751CB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33EA000B10 FOREIGN KEY (class_id) REFERENCES classroom (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_3299375123EDC87');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_32993751CB944F1A');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33EA000B10');
        $this->addSql('DROP TABLE classroom');
        $this->addSql('DROP TABLE score');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE subject');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
