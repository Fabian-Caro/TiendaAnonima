-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: tiendaanonima
-- ------------------------------------------------------
-- Server version	8.0.37

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `idAdministrador` int NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `clave` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idAdministrador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'Hector','Florez','hf@ta.com','202cb962ac59075b964b07152d234b70');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrito` (
  `Producto_idProducto` int NOT NULL,
  `Cliente_idCliente` int NOT NULL,
  `cantidad` int NOT NULL,
  PRIMARY KEY (`Producto_idProducto`,`Cliente_idCliente`),
  KEY `fk_Producto_has_Cliente_Cliente1_idx` (`Cliente_idCliente`),
  KEY `fk_Producto_has_Cliente_Producto1_idx` (`Producto_idProducto`),
  CONSTRAINT `fk_Producto_has_Cliente_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`),
  CONSTRAINT `fk_Producto_has_Cliente_Producto1` FOREIGN KEY (`Producto_idProducto`) REFERENCES `producto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `idCategoria` int NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (201,'Nevera'),(202,'Lavadora'),(203,'Televisores'),(204,'Audio'),(205,'Drones');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `idCliente` int NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `clave` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (501,'Sandra','Arjona','sanarj@hotmail.com','c12e01f2a13ff5587e1e9e4aedb8242d',1),(502,'Pedro','Torres','petor@gmail.com','fc9fdf084e290f26a270390dc49061a2',2),(503,'Thomas','Aguirre','tomasesteban20100@gmail.com','fec8f2a3f2e808ccb17c4d278b4fa469',1),(504,'Sofia','Carvajal','Spfitp@gmail.com','d54185b71f614c30a396ac4bc44d3269',1),(505,'Felipe','Sanchez','Sanchez08@gmail.com','bc7b36fe4d2924e49800d9b3dc4a325c',1),(506,'Juan','Pérez','juan.perez@gmail.com','55add3d845bfcd87a9b0949b0da49c0a',1),(507,'Ana','Torres','ana.torres@gmail.com','7d0db380a5b95a8ba1da0bca241abda1',1);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `factura` (
  `numeroFactura` int NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `subtotal` int NOT NULL,
  `iva` int NOT NULL,
  `total` int NOT NULL,
  `Cliente_idCliente` int NOT NULL,
  PRIMARY KEY (`numeroFactura`),
  KEY `fk_Factura_Cliente1_idx` (`Cliente_idCliente`),
  CONSTRAINT `fk_Factura_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marca` (
  `idMarca` int NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (101,'Whirlpool'),(102,'Kalley'),(103,'LG'),(104,'Samsung'),(105,'Challenger'),(106,'DJI');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `idProducto` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cantidad` int NOT NULL,
  `precioCompra` int NOT NULL,
  `precioVenta` int NOT NULL,
  `Marca_idMarca` int NOT NULL,
  `Categoria_idCategoria` int NOT NULL,
  `Administrador_idAdministrador` int NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `fk_Producto_Marca_idx` (`Marca_idMarca`),
  KEY `fk_Producto_Categoria1_idx` (`Categoria_idCategoria`),
  KEY `fk_Producto_Administrador1_idx` (`Administrador_idAdministrador`),
  CONSTRAINT `fk_Producto_Administrador1` FOREIGN KEY (`Administrador_idAdministrador`) REFERENCES `administrador` (`idAdministrador`),
  CONSTRAINT `fk_Producto_Categoria1` FOREIGN KEY (`Categoria_idCategoria`) REFERENCES `categoria` (`idCategoria`),
  CONSTRAINT `fk_Producto_Marca` FOREIGN KEY (`Marca_idMarca`) REFERENCES `marca` (`idMarca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (401,'Lavadora WW19LTAHLA',1000,1500000,1900000,101,202,1),(402,'Nevera GB33WPT',2000,1500000,1800000,102,201,1),(403,'Televisor 50UR7410PSA',10,1000000,1499900,101,201,1),(404,'Televisor 65cu7000',5,2500000,3099900,102,203,1),(405,'Televisor UHD 65HW SMART BT',10,1500000,2099900,102,203,1),(406,'Lavadora LG Carga Frontal 22 Kilos WM22VV2S6BR Gris',4,3000000,3499900,103,202,1),(407,'DJI Mavic Air 2',50,3000000,6000000,106,205,1),(408,'Super mega dron',50,2000000,8000000,106,205,1),(409,'Super televisor',10,1000,2000,104,203,1),(410,'Parlante mega grande',100,400000,800000,102,204,1),(411,'Super lavadora 3000',30,400000,300000,101,202,1);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productofactura`
--

DROP TABLE IF EXISTS `productofactura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productofactura` (
  `Producto_idProducto` int NOT NULL,
  `Factura_numeroFactura` int NOT NULL,
  `cantidad` int NOT NULL,
  `precioVenta` int NOT NULL,
  PRIMARY KEY (`Producto_idProducto`,`Factura_numeroFactura`),
  KEY `fk_Producto_has_Factura_Factura1_idx` (`Factura_numeroFactura`),
  KEY `fk_Producto_has_Factura_Producto1_idx` (`Producto_idProducto`),
  CONSTRAINT `fk_Producto_has_Factura_Factura1` FOREIGN KEY (`Factura_numeroFactura`) REFERENCES `factura` (`numeroFactura`),
  CONSTRAINT `fk_Producto_has_Factura_Producto1` FOREIGN KEY (`Producto_idProducto`) REFERENCES `producto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productofactura`
--

LOCK TABLES `productofactura` WRITE;
/*!40000 ALTER TABLE `productofactura` DISABLE KEYS */;
/*!40000 ALTER TABLE `productofactura` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-27 12:56:14
