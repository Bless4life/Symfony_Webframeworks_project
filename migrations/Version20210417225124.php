<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210417225124 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book ADD club_name_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3317C5F3954 FOREIGN KEY (club_name_id) REFERENCES club (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CBE5A3317C5F3954 ON book (club_name_id)');
        $this->addSql('ALTER TABLE club CHANGE club_name club_name VARCHAR(255) NOT NULL, CHANGE member member INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3317C5F3954');
        $this->addSql('DROP INDEX UNIQ_CBE5A3317C5F3954 ON book');
        $this->addSql('ALTER TABLE book DROP club_name_id');
        $this->addSql('ALTER TABLE club CHANGE club_name club_name VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, CHANGE member member INT DEFAULT NULL');
    }
}
