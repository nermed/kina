<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200322231308 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_jeu (category_id INT NOT NULL, jeu_id INT NOT NULL, INDEX IDX_A72620EF12469DE2 (category_id), INDEX IDX_A72620EF8C9E392E (jeu_id), PRIMARY KEY(category_id, jeu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_activity (category_id INT NOT NULL, activity_id INT NOT NULL, INDEX IDX_1B0E8D2112469DE2 (category_id), INDEX IDX_1B0E8D2181C06096 (activity_id), PRIMARY KEY(category_id, activity_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_jeu ADD CONSTRAINT FK_A72620EF12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_jeu ADD CONSTRAINT FK_A72620EF8C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_activity ADD CONSTRAINT FK_1B0E8D2112469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_activity ADD CONSTRAINT FK_1B0E8D2181C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category_jeu DROP FOREIGN KEY FK_A72620EF12469DE2');
        $this->addSql('ALTER TABLE category_activity DROP FOREIGN KEY FK_1B0E8D2112469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_jeu');
        $this->addSql('DROP TABLE category_activity');
    }
}
