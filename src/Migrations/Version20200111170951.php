<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200111170951 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE activity_correction (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, file LONGBLOB NOT NULL, INDEX IDX_F77F9FB0F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classroom (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, instruction LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activity_exo (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, activity_id INT NOT NULL, file LONGBLOB NOT NULL, INDEX IDX_F98FC16CF675F31B (author_id), INDEX IDX_F98FC16C81C06096 (activity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesson (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, summary LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_category (course_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_AFF87497591CC992 (course_id), INDEX IDX_AFF8749712469DE2 (category_id), PRIMARY KEY(course_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_user (course_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_45310B4F591CC992 (course_id), INDEX IDX_45310B4FA76ED395 (user_id), PRIMARY KEY(course_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activity_correction ADD CONSTRAINT FK_F77F9FB0F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE activity_exo ADD CONSTRAINT FK_F98FC16CF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE activity_exo ADD CONSTRAINT FK_F98FC16C81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
        $this->addSql('ALTER TABLE course_category ADD CONSTRAINT FK_AFF87497591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_category ADD CONSTRAINT FK_AFF8749712469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_user ADD CONSTRAINT FK_45310B4F591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_user ADD CONSTRAINT FK_45310B4FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activity_correction DROP FOREIGN KEY FK_F77F9FB0F675F31B');
        $this->addSql('ALTER TABLE activity_exo DROP FOREIGN KEY FK_F98FC16CF675F31B');
        $this->addSql('ALTER TABLE course_user DROP FOREIGN KEY FK_45310B4FA76ED395');
        $this->addSql('ALTER TABLE activity_exo DROP FOREIGN KEY FK_F98FC16C81C06096');
        $this->addSql('ALTER TABLE course_category DROP FOREIGN KEY FK_AFF8749712469DE2');
        $this->addSql('ALTER TABLE course_category DROP FOREIGN KEY FK_AFF87497591CC992');
        $this->addSql('ALTER TABLE course_user DROP FOREIGN KEY FK_45310B4F591CC992');
        $this->addSql('DROP TABLE activity_correction');
        $this->addSql('DROP TABLE classroom');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE activity_exo');
        $this->addSql('DROP TABLE lesson');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE course_category');
        $this->addSql('DROP TABLE course_user');
    }
}
