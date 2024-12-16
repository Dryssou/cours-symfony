<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241128075612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE messenger_messages_id_seq CASCADE');
        $this->addSql('CREATE TABLE media_language (media_id INT NOT NULL, language_id INT NOT NULL, PRIMARY KEY(media_id, language_id))');
        $this->addSql('CREATE INDEX IDX_DBBA5F07EA9FDD75 ON media_language (media_id)');
        $this->addSql('CREATE INDEX IDX_DBBA5F0782F1BAF4 ON media_language (language_id)');
        $this->addSql('CREATE TABLE movie (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE serie (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE media_language ADD CONSTRAINT FK_DBBA5F07EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE media_language ADD CONSTRAINT FK_DBBA5F0782F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26FBF396750 FOREIGN KEY (id) REFERENCES media (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A9334BF396750 FOREIGN KEY (id) REFERENCES media (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE media_media DROP CONSTRAINT fk_753565bde3f3e5ad');
        $this->addSql('ALTER TABLE media_media DROP CONSTRAINT fk_753565bdfa16b522');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('DROP TABLE media_media');
        $this->addSql('ALTER TABLE category ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE category ALTER id ADD GENERATED BY DEFAULT AS IDENTITY');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT fk_9474526ca76ed395');
        $this->addSql('DROP INDEX idx_9474526ca76ed395');
        $this->addSql('ALTER TABLE comment ADD publisher_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE comment ALTER id ADD GENERATED BY DEFAULT AS IDENTITY');
        $this->addSql('ALTER TABLE comment RENAME COLUMN user_id TO parent_comment_id');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CBF2AF943 FOREIGN KEY (parent_comment_id) REFERENCES comment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C40C86FCE FOREIGN KEY (publisher_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9474526CBF2AF943 ON comment (parent_comment_id)');
        $this->addSql('CREATE INDEX IDX_9474526C40C86FCE ON comment (publisher_id)');
        $this->addSql('ALTER TABLE episode ADD season_id INT NOT NULL');
        $this->addSql('ALTER TABLE episode ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE episode ALTER id ADD GENERATED BY DEFAULT AS IDENTITY');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_DDAA1CDA4EC001D1 ON episode (season_id)');
        $this->addSql('ALTER TABLE language ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE language ALTER id ADD GENERATED BY DEFAULT AS IDENTITY');
        $this->addSql('ALTER TABLE media ADD short_description TEXT NOT NULL');
        $this->addSql('ALTER TABLE media ADD long_description TEXT NOT NULL');
        $this->addSql('ALTER TABLE media ADD title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE media ADD release_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE media ADD cover_image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE media ADD staff JSON NOT NULL');
        $this->addSql('ALTER TABLE media ADD casting JSON NOT NULL');
        $this->addSql('ALTER TABLE media ADD discr VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE media ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE media ALTER id ADD GENERATED BY DEFAULT AS IDENTITY');
        $this->addSql('ALTER TABLE playlist ADD creator_id INT NOT NULL');
        $this->addSql('ALTER TABLE playlist ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE playlist ALTER id ADD GENERATED BY DEFAULT AS IDENTITY');
        $this->addSql('ALTER TABLE playlist ADD CONSTRAINT FK_D782112D61220EA6 FOREIGN KEY (creator_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D782112D61220EA6 ON playlist (creator_id)');
        $this->addSql('ALTER TABLE playlist_media ADD playlist_id INT NOT NULL');
        $this->addSql('ALTER TABLE playlist_media ADD media_id INT NOT NULL');
        $this->addSql('ALTER TABLE playlist_media ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE playlist_media ALTER id ADD GENERATED BY DEFAULT AS IDENTITY');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84F6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84FEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_C930B84F6BBD148 ON playlist_media (playlist_id)');
        $this->addSql('CREATE INDEX IDX_C930B84FEA9FDD75 ON playlist_media (media_id)');
        $this->addSql('ALTER TABLE playlist_subscription ADD subscriber_id INT NOT NULL');
        $this->addSql('ALTER TABLE playlist_subscription ADD playlist_id INT NOT NULL');
        $this->addSql('ALTER TABLE playlist_subscription ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE playlist_subscription ALTER id ADD GENERATED BY DEFAULT AS IDENTITY');
        $this->addSql('ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940C7808B1AD FOREIGN KEY (subscriber_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940C6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_832940C7808B1AD ON playlist_subscription (subscriber_id)');
        $this->addSql('CREATE INDEX IDX_832940C6BBD148 ON playlist_subscription (playlist_id)');
        $this->addSql('ALTER TABLE season ADD serie_id INT NOT NULL');
        $this->addSql('ALTER TABLE season ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE season ALTER id ADD GENERATED BY DEFAULT AS IDENTITY');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA9D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_F0E45BA9D94388BD ON season (serie_id)');
        $this->addSql('ALTER TABLE subscription DROP CONSTRAINT fk_a3c664d3a76ed395');
        $this->addSql('DROP INDEX idx_a3c664d3a76ed395');
        $this->addSql('ALTER TABLE subscription DROP user_id');
        $this->addSql('ALTER TABLE subscription ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE subscription ALTER id ADD GENERATED BY DEFAULT AS IDENTITY');
        $this->addSql('ALTER TABLE subscription_history ADD subscriber_id INT NOT NULL');
        $this->addSql('ALTER TABLE subscription_history ADD subscription_id INT NOT NULL');
        $this->addSql('ALTER TABLE subscription_history ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE subscription_history ALTER id ADD GENERATED BY DEFAULT AS IDENTITY');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D07808B1AD FOREIGN KEY (subscriber_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D09A1887DC FOREIGN KEY (subscription_id) REFERENCES subscription (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_54AF90D07808B1AD ON subscription_history (subscriber_id)');
        $this->addSql('CREATE INDEX IDX_54AF90D09A1887DC ON subscription_history (subscription_id)');
        $this->addSql('ALTER TABLE "user" ADD roles JSON NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD current_subscription_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE "user" ALTER id ADD GENERATED BY DEFAULT AS IDENTITY');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D649DDE45DDE FOREIGN KEY (current_subscription_id) REFERENCES subscription (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_8D93D649DDE45DDE ON "user" (current_subscription_id)');
        $this->addSql('ALTER TABLE watch_history ADD watcher_id INT NOT NULL');
        $this->addSql('ALTER TABLE watch_history ADD media_id INT NOT NULL');
        $this->addSql('ALTER TABLE watch_history ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE watch_history ALTER id ADD GENERATED BY DEFAULT AS IDENTITY');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD8C300AB5D FOREIGN KEY (watcher_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD8EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_DE44EFD8C300AB5D ON watch_history (watcher_id)');
        $this->addSql('CREATE INDEX IDX_DE44EFD8EA9FDD75 ON watch_history (media_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE messenger_messages_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT DEFAULT messenger_messages_id_seq NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_75ea56e016ba31db ON messenger_messages (delivered_at)');
        $this->addSql('CREATE INDEX idx_75ea56e0e3bd61ce ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX idx_75ea56e0fb7336f0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE TABLE media_media (media_source INT NOT NULL, media_target INT NOT NULL, PRIMARY KEY(media_source, media_target))');
        $this->addSql('CREATE INDEX idx_753565bdfa16b522 ON media_media (media_target)');
        $this->addSql('CREATE INDEX idx_753565bde3f3e5ad ON media_media (media_source)');
        $this->addSql('ALTER TABLE media_media ADD CONSTRAINT fk_753565bde3f3e5ad FOREIGN KEY (media_source) REFERENCES media (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE media_media ADD CONSTRAINT fk_753565bdfa16b522 FOREIGN KEY (media_target) REFERENCES media (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE media_language DROP CONSTRAINT FK_DBBA5F07EA9FDD75');
        $this->addSql('ALTER TABLE media_language DROP CONSTRAINT FK_DBBA5F0782F1BAF4');
        $this->addSql('ALTER TABLE movie DROP CONSTRAINT FK_1D5EF26FBF396750');
        $this->addSql('ALTER TABLE serie DROP CONSTRAINT FK_AA3A9334BF396750');
        $this->addSql('DROP TABLE media_language');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE serie');
        $this->addSql('ALTER TABLE category ALTER id SET DEFAULT category_id_seq');
        $this->addSql('ALTER TABLE category ALTER id DROP IDENTITY');
        $this->addSql('ALTER TABLE media DROP short_description');
        $this->addSql('ALTER TABLE media DROP long_description');
        $this->addSql('ALTER TABLE media DROP title');
        $this->addSql('ALTER TABLE media DROP release_date');
        $this->addSql('ALTER TABLE media DROP cover_image');
        $this->addSql('ALTER TABLE media DROP staff');
        $this->addSql('ALTER TABLE media DROP casting');
        $this->addSql('ALTER TABLE media DROP discr');
        $this->addSql('ALTER TABLE media ALTER id SET DEFAULT media_id_seq');
        $this->addSql('ALTER TABLE media ALTER id DROP IDENTITY');
        $this->addSql('ALTER TABLE playlist_media DROP CONSTRAINT FK_C930B84F6BBD148');
        $this->addSql('ALTER TABLE playlist_media DROP CONSTRAINT FK_C930B84FEA9FDD75');
        $this->addSql('DROP INDEX IDX_C930B84F6BBD148');
        $this->addSql('DROP INDEX IDX_C930B84FEA9FDD75');
        $this->addSql('ALTER TABLE playlist_media DROP playlist_id');
        $this->addSql('ALTER TABLE playlist_media DROP media_id');
        $this->addSql('ALTER TABLE playlist_media ALTER id SET DEFAULT playlist_media_id_seq');
        $this->addSql('ALTER TABLE playlist_media ALTER id DROP IDENTITY');
        $this->addSql('ALTER TABLE playlist_subscription DROP CONSTRAINT FK_832940C7808B1AD');
        $this->addSql('ALTER TABLE playlist_subscription DROP CONSTRAINT FK_832940C6BBD148');
        $this->addSql('DROP INDEX IDX_832940C7808B1AD');
        $this->addSql('DROP INDEX IDX_832940C6BBD148');
        $this->addSql('ALTER TABLE playlist_subscription DROP subscriber_id');
        $this->addSql('ALTER TABLE playlist_subscription DROP playlist_id');
        $this->addSql('ALTER TABLE playlist_subscription ALTER id SET DEFAULT playlist_subscription_id_seq');
        $this->addSql('ALTER TABLE playlist_subscription ALTER id DROP IDENTITY');
        $this->addSql('ALTER TABLE subscription ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE subscription ALTER id SET DEFAULT subscription_id_seq');
        $this->addSql('ALTER TABLE subscription ALTER id DROP IDENTITY');
        $this->addSql('ALTER TABLE subscription ADD CONSTRAINT fk_a3c664d3a76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_a3c664d3a76ed395 ON subscription (user_id)');
        $this->addSql('ALTER TABLE season DROP CONSTRAINT FK_F0E45BA9D94388BD');
        $this->addSql('DROP INDEX IDX_F0E45BA9D94388BD');
        $this->addSql('ALTER TABLE season DROP serie_id');
        $this->addSql('ALTER TABLE season ALTER id SET DEFAULT season_id_seq');
        $this->addSql('ALTER TABLE season ALTER id DROP IDENTITY');
        $this->addSql('ALTER TABLE episode DROP CONSTRAINT FK_DDAA1CDA4EC001D1');
        $this->addSql('DROP INDEX IDX_DDAA1CDA4EC001D1');
        $this->addSql('ALTER TABLE episode DROP season_id');
        $this->addSql('ALTER TABLE episode ALTER id SET DEFAULT episode_id_seq');
        $this->addSql('ALTER TABLE episode ALTER id DROP IDENTITY');
        $this->addSql('ALTER TABLE subscription_history DROP CONSTRAINT FK_54AF90D07808B1AD');
        $this->addSql('ALTER TABLE subscription_history DROP CONSTRAINT FK_54AF90D09A1887DC');
        $this->addSql('DROP INDEX IDX_54AF90D07808B1AD');
        $this->addSql('DROP INDEX IDX_54AF90D09A1887DC');
        $this->addSql('ALTER TABLE subscription_history DROP subscriber_id');
        $this->addSql('ALTER TABLE subscription_history DROP subscription_id');
        $this->addSql('ALTER TABLE subscription_history ALTER id SET DEFAULT subscription_history_id_seq');
        $this->addSql('ALTER TABLE subscription_history ALTER id DROP IDENTITY');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526CBF2AF943');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526C40C86FCE');
        $this->addSql('DROP INDEX IDX_9474526CBF2AF943');
        $this->addSql('DROP INDEX IDX_9474526C40C86FCE');
        $this->addSql('ALTER TABLE comment DROP publisher_id');
        $this->addSql('ALTER TABLE comment ALTER id SET DEFAULT comment_id_seq');
        $this->addSql('ALTER TABLE comment ALTER id DROP IDENTITY');
        $this->addSql('ALTER TABLE comment RENAME COLUMN parent_comment_id TO user_id');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT fk_9474526ca76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_9474526ca76ed395 ON comment (user_id)');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D649DDE45DDE');
        $this->addSql('DROP INDEX IDX_8D93D649DDE45DDE');
        $this->addSql('ALTER TABLE "user" DROP roles');
        $this->addSql('ALTER TABLE "user" DROP current_subscription_id');
        $this->addSql('ALTER TABLE "user" ALTER id SET DEFAULT user_id_seq');
        $this->addSql('ALTER TABLE "user" ALTER id DROP IDENTITY');
        $this->addSql('ALTER TABLE language ALTER id SET DEFAULT language_id_seq');
        $this->addSql('ALTER TABLE language ALTER id DROP IDENTITY');
        $this->addSql('ALTER TABLE watch_history DROP CONSTRAINT FK_DE44EFD8C300AB5D');
        $this->addSql('ALTER TABLE watch_history DROP CONSTRAINT FK_DE44EFD8EA9FDD75');
        $this->addSql('DROP INDEX IDX_DE44EFD8C300AB5D');
        $this->addSql('DROP INDEX IDX_DE44EFD8EA9FDD75');
        $this->addSql('ALTER TABLE watch_history DROP watcher_id');
        $this->addSql('ALTER TABLE watch_history DROP media_id');
        $this->addSql('ALTER TABLE watch_history ALTER id SET DEFAULT watch_history_id_seq');
        $this->addSql('ALTER TABLE watch_history ALTER id DROP IDENTITY');
        $this->addSql('ALTER TABLE playlist DROP CONSTRAINT FK_D782112D61220EA6');
        $this->addSql('DROP INDEX IDX_D782112D61220EA6');
        $this->addSql('ALTER TABLE playlist DROP creator_id');
        $this->addSql('ALTER TABLE playlist ALTER id SET DEFAULT playlist_id_seq');
        $this->addSql('ALTER TABLE playlist ALTER id DROP IDENTITY');
    }
}
