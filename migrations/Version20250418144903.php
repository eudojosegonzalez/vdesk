<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250418144903 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pago (id INT AUTO_INCREMENT NOT NULL, empresa_id INT NOT NULL, metodo_id INT NOT NULL, conciliador_id INT NOT NULL, fecha_pago DATE NOT NULL, referencia VARCHAR(255) DEFAULT NULL, monto DOUBLE PRECISION NOT NULL, descripcion VARCHAR(255) NOT NULL, comprobado INT NOT NULL, observaciones LONGTEXT NOT NULL, INDEX IDX_F4DF5F3E521E1991 (empresa_id), INDEX IDX_F4DF5F3EA45CBFCF (metodo_id), INDEX IDX_F4DF5F3EA520EB5F (conciliador_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pago ADD CONSTRAINT FK_F4DF5F3E521E1991 FOREIGN KEY (empresa_id) REFERENCES empresa (id)');
        $this->addSql('ALTER TABLE pago ADD CONSTRAINT FK_F4DF5F3EA45CBFCF FOREIGN KEY (metodo_id) REFERENCES metodo_pago (id)');
        $this->addSql('ALTER TABLE pago ADD CONSTRAINT FK_F4DF5F3EA520EB5F FOREIGN KEY (conciliador_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pago DROP FOREIGN KEY FK_F4DF5F3E521E1991');
        $this->addSql('ALTER TABLE pago DROP FOREIGN KEY FK_F4DF5F3EA45CBFCF');
        $this->addSql('ALTER TABLE pago DROP FOREIGN KEY FK_F4DF5F3EA520EB5F');
        $this->addSql('DROP TABLE pago');
    }
}
