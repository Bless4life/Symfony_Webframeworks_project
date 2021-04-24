<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210423212055 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3317DD8AC20');
        $this->addSql('DROP INDEX IDX_CBE5A3317DD8AC20 ON book');
        $this->addSql('ALTER TABLE book CHANGE books_id club_name_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3317C5F3954 FOREIGN KEY (club_name_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A3317C5F3954 ON book (club_name_id)');
        $this->addSql('ALTER TABLE club DROP club_name');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3317C5F3954');
        $this->addSql('DROP INDEX IDX_CBE5A3317C5F3954 ON book');
        $this->addSql('ALTER TABLE book CHANGE club_name_id books_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3317DD8AC20 FOREIGN KEY (books_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A3317DD8AC20 ON book (books_id)');
        $this->addSql('ALTER TABLE club ADD club_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
