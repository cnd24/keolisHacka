<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191219104826 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, line_id INT NOT NULL, path VARCHAR(255) NOT NULL, display TINYINT(1) NOT NULL, INDEX IDX_16DB4F894D7B7542 (line_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F894D7B7542 FOREIGN KEY (line_id) REFERENCES line (id)');
        $this->addSql('DROP TABLE image');
        $this->addSql('ALTER TABLE line DROP image_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, ligne_id INT NOT NULL, image_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, display TINYINT(1) NOT NULL, INDEX IDX_C53D045F5A438E76 (ligne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F5A438E76 FOREIGN KEY (ligne_id) REFERENCES line (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE picture');
        $this->addSql('ALTER TABLE line ADD image_id INT NOT NULL');
    }
}
