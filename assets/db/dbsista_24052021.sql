-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: dbsista
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `detail_penilaian`
--

DROP TABLE IF EXISTS `detail_penilaian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penilaian_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `seminar_id` int(11) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detail_penilaian_penilaian1_idx` (`penilaian_id`),
  KEY `fk_detail_penilaian_dosen1_idx` (`dosen_id`),
  CONSTRAINT `fk_detail_penilaian_dosen1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detail_penilaian_penilaian1` FOREIGN KEY (`penilaian_id`) REFERENCES `penilaian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_penilaian`
--

LOCK TABLES `detail_penilaian` WRITE;
/*!40000 ALTER TABLE `detail_penilaian` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_penilaian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nidn` varchar(10) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen`
--

LOCK TABLES `dosen` WRITE;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` VALUES (1,'084020211','AMALIA RAHMAH, S.T, S.T, M.T'),(2,'084040200','BACHTIAR FIRDAUS, S.T, M.P'),(3,'084151108','KURNIAWAN DWI PRASETYO, S.T, M.T'),(4,'084201001','MUHAMMAD BINTANG, S.Kom'),(5,'084310911','NUGROHO DWI SAPUTRA, S.Kom, M.Ti'),(6,'084290607','REZA ALDIANSYAH, S.T, M.Ti'),(7,'084230787','RUSMANTO, M.M., Drs'),(8,'084260989','SAPTO WALUYO, S.Sos, M.Sc.'),(9,'0860696','SUHENDI, M.M.S.I, S.T'),(10,'084010195','WARSONO, S.Kom, M.Ti'),(11,'084241010','YEKTI WIRANI, S.T, M.Ti'),(12,'084080200','DEDY ACHMADI, S.T, M.T'),(13,'084071314','MISNA ASQIA, S.Kom, M.Kom'),(14,'084050315','NURUL JANAH, S.IIP, M.HUM'),(15,'084300500','EDI WIBOWO, S.E, M.M'),(16,'084131310','AHMAD RIO ADRIANSYAH, S.Si, M.Si'),(17,'084260511','APRIL RUSTIANTO, S.Kom, M.T'),(18,'084070998','HENRY SAPTONO, S.Si, M.Kom'),(19,'084111208','HILMY ABIDZAR TAWAKAL, S.T, M.Kom'),(20,'084211202','LUKMAN ROSYIDI, S.T, M.M., M.T'),(21,'084270601','REZA PRIMARDIANSYAH, S.T, M.Kom'),(22,'084240913','SALMAN EL FARISI, S.Kom, M.Kom'),(23,'084290398','SIGIT PUSPITO WIGATI JAROT,PhD'),(24,'084140495','SIROJUL MUNIR, S.Si, M.Kom'),(25,'084100915','TUBAGUS RIZKY DHARMAWAN, S.T, M.Sc.'),(26,'084260907','ZAKI IMADUDDIN, S.T, M.Kom'),(27,'084281214','ADITYA PUTRA, S.T, M.T'),(28,'084101104','NASRUL, S.Kom, M.Kom'),(29,'084200914','TIFANI NABARIAN, S.Kom, M.T.I'),(30,'084301213','PUDY PRIMA, S.T, M.Kom'),(31,'084240795','EFRIZAL ZAIDA, S.KOM, M.M, M.KOM'),(32,'0899902010','TEGUH RAHARJO, S.Kom, M.Kom'),(33,'084290906','ISHOM MUHAMMAD DREHEM,S.Kom, M.Kom'),(34,'084141310','IMAM HAROMAIN, S.Si, M.Kom');
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_seminar`
--

DROP TABLE IF EXISTS `kategori_seminar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_seminar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_seminar`
--

LOCK TABLES `kategori_seminar` WRITE;
/*!40000 ALTER TABLE `kategori_seminar` DISABLE KEYS */;
INSERT INTO `kategori_seminar` VALUES (1,'Seminar Proposal'),(2,'Seminar Hasil'),(3,'Sidang Skripsi');
/*!40000 ALTER TABLE `kategori_seminar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penilaian`
--

DROP TABLE IF EXISTS `penilaian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penilaian`
--

LOCK TABLES `penilaian` WRITE;
/*!40000 ALTER TABLE `penilaian` DISABLE KEYS */;
INSERT INTO `penilaian` VALUES (1,'Presentasi','pembukaan, intonasi, kesopanan, kerapihan pakaian'),(2,'Penguasaan Materi','cukup jelas'),(3,'Penulisan Dokumen','cukup jelas');
/*!40000 ALTER TABLE `penilaian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peserta_seminar`
--

DROP TABLE IF EXISTS `peserta_seminar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peserta_seminar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(10) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `seminar_id` int(11) NOT NULL,
  `kehadiran` smallint(6) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_peserta_seminar_mahasiswa_seminar1_idx` (`seminar_id`),
  CONSTRAINT `fk_peserta_seminar_mahasiswa_seminar1` FOREIGN KEY (`seminar_id`) REFERENCES `seminar_ta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peserta_seminar`
--

LOCK TABLES `peserta_seminar` WRITE;
/*!40000 ALTER TABLE `peserta_seminar` DISABLE KEYS */;
/*!40000 ALTER TABLE `peserta_seminar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seminar_ta`
--

DROP TABLE IF EXISTS `seminar_ta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seminar_ta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semester` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `kategori_seminar_id` int(11) NOT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `nama_mahasiswa` varchar(45) DEFAULT NULL,
  `judul` text,
  `pembimbing_id` int(11) NOT NULL,
  `penguji1_id` int(11) DEFAULT NULL,
  `penguji2_id` int(11) DEFAULT NULL,
  `nilai_pembimbing` double DEFAULT NULL,
  `nilai_penguji1` double DEFAULT NULL,
  `nilai_penguji2` double DEFAULT NULL,
  `lokasi` varchar(40) DEFAULT NULL,
  `nilai_akhir` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mahasiswa_seminar_kategori_seminar_idx` (`kategori_seminar_id`),
  KEY `fk_mahasiswa_seminar_dosen1_idx` (`pembimbing_id`),
  CONSTRAINT `fk_mahasiswa_seminar_dosen1` FOREIGN KEY (`pembimbing_id`) REFERENCES `dosen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mahasiswa_seminar_kategori_seminar` FOREIGN KEY (`kategori_seminar_id`) REFERENCES `kategori_seminar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminar_ta`
--

LOCK TABLES `seminar_ta` WRITE;
/*!40000 ALTER TABLE `seminar_ta` DISABLE KEYS */;
/*!40000 ALTER TABLE `seminar_ta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-24  8:50:55
