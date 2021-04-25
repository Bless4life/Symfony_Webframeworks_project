<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210425133423 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suggest_book ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE suggest_book ADD CONSTRAINT FK_2997973767B3B43D FOREIGN KEY (users_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_2997973767B3B43D ON suggest_book (users_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suggest_book DROP FOREIGN KEY FK_2997973767B3B43D');
        $this->addSql('DROP INDEX IDX_2997973767B3B43D ON suggest_book');
        $this->addSql('ALTER TABLE suggest_book DROP users_id');
    }
}
