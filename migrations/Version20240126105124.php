<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240126105124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE announcements DROP FOREIGN KEY FK_F422A9DA76ED395');
        $this->addSql('ALTER TABLE announcements DROP FOREIGN KEY FK_F422A9D12469DE2');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A913AEA17');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AA76ED395');
        $this->addSql('ALTER TABLE evaluations DROP FOREIGN KEY FK_3B72691D452C2C51');
        $this->addSql('ALTER TABLE evaluations DROP FOREIGN KEY FK_3B72691D913AEA17');
        $this->addSql('ALTER TABLE evaluations DROP FOREIGN KEY FK_3B72691D43575BE2');
        $this->addSql('ALTER TABLE transactions DROP FOREIGN KEY FK_EAA81A4CA76ED395');
        $this->addSql('ALTER TABLE transaction_details DROP FOREIGN KEY FK_48C37682FC0CB0F');
        $this->addSql('ALTER TABLE transaction_details DROP FOREIGN KEY FK_48C3768913AEA17');
        $this->addSql('DROP TABLE announcements');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE evaluations');
        $this->addSql('DROP TABLE transactions');
        $this->addSql('DROP TABLE transaction_details');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE announcements (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, price DOUBLE PRECISION DEFAULT NULL, related_products VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, brand VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, images VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_F422A9D12469DE2 (category_id), INDEX IDX_F422A9DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, announcement_id INT DEFAULT NULL, comment VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME DEFAULT NULL, INDEX IDX_5F9E962AA76ED395 (user_id), INDEX IDX_5F9E962A913AEA17 (announcement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE evaluations (id INT AUTO_INCREMENT NOT NULL, evaluator_id INT DEFAULT NULL, evaluated_user_id INT DEFAULT NULL, announcement_id INT DEFAULT NULL, comment VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, note DOUBLE PRECISION DEFAULT NULL, INDEX IDX_3B72691D913AEA17 (announcement_id), INDEX IDX_3B72691D43575BE2 (evaluator_id), INDEX IDX_3B72691D452C2C51 (evaluated_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE transactions (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, date_transaction DATETIME DEFAULT NULL, status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_EAA81A4CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE transaction_details (id INT AUTO_INCREMENT NOT NULL, transaction_id INT DEFAULT NULL, announcement_id INT DEFAULT NULL, INDEX IDX_48C37682FC0CB0F (transaction_id), INDEX IDX_48C3768913AEA17 (announcement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE announcements ADD CONSTRAINT FK_F422A9DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE announcements ADD CONSTRAINT FK_F422A9D12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A913AEA17 FOREIGN KEY (announcement_id) REFERENCES announcements (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE evaluations ADD CONSTRAINT FK_3B72691D452C2C51 FOREIGN KEY (evaluated_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE evaluations ADD CONSTRAINT FK_3B72691D913AEA17 FOREIGN KEY (announcement_id) REFERENCES announcements (id)');
        $this->addSql('ALTER TABLE evaluations ADD CONSTRAINT FK_3B72691D43575BE2 FOREIGN KEY (evaluator_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT FK_EAA81A4CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transaction_details ADD CONSTRAINT FK_48C37682FC0CB0F FOREIGN KEY (transaction_id) REFERENCES transactions (id)');
        $this->addSql('ALTER TABLE transaction_details ADD CONSTRAINT FK_48C3768913AEA17 FOREIGN KEY (announcement_id) REFERENCES announcements (id)');
    }
}
