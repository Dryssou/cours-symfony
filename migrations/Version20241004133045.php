<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241004133045 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE media_category (media_id INTEGER NOT NULL, category_id INTEGER NOT NULL, PRIMARY KEY(media_id, category_id))');
        $this->addSql('CREATE INDEX IDX_92D3773EA9FDD75 ON media_category (media_id)');
        $this->addSql('CREATE INDEX IDX_92D377312469DE2 ON media_category (category_id)');
        $this->addSql('CREATE TABLE media_media (media_source INTEGER NOT NULL, media_target INTEGER NOT NULL, PRIMARY KEY(media_source, media_target))');
        $this->addSql('CREATE INDEX IDX_753565BDE3F3E5AD ON media_media (media_source)');
        $this->addSql('CREATE INDEX IDX_753565BDFA16B522 ON media_media (media_target)');
        $this->addSql('ALTER TABLE media_category ADD CONSTRAINT FK_92D3773EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_category ADD CONSTRAINT FK_92D377312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_media ADD CONSTRAINT FK_753565BDE3F3E5AD FOREIGN KEY (media_source) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_media ADD CONSTRAINT FK_753565BDFA16B522 FOREIGN KEY (media_target) REFERENCES media (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_category DROP FOREIGN KEY FK_92D3773EA9FDD75');
        $this->addSql('ALTER TABLE media_category DROP FOREIGN KEY FK_92D377312469DE2');
        $this->addSql('ALTER TABLE media_media DROP FOREIGN KEY FK_753565BDE3F3E5AD');
        $this->addSql('ALTER TABLE media_media DROP FOREIGN KEY FK_753565BDFA16B522');
        $this->addSql('DROP TABLE media_category');
        $this->addSql('DROP TABLE media_media');
    }
}
