<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220727152738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER SEQUENCE num INCREMENT BY 1');
        $this->addSql('ALTER TABLE order_num ALTER training_centre TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE order_num ALTER training_centre DROP DEFAULT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER SEQUENCE num INCREMENT BY 1');
        $this->addSql('ALTER TABLE order_num ALTER training_centre TYPE INT');
        $this->addSql('ALTER TABLE order_num ALTER training_centre DROP DEFAULT');
    }
}
