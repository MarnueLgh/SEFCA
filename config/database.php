<?php
/*
 * Fecha: 22/04/2026
 * Descripción: Clase de conexión a base de datos PostgreSQL usando PDO.
 *              Los parámetros de conexión se configurarán cuando la BD esté lista.
 *
 * USO:
 *   require_once __DIR__ . '/database.php';
 *   $db = new Database();
 *   $conn = $db->conectar();
 *   if ($conn) {
 *       // Ejecutar consultas con PDO
 *   }
 */

class Database
{
    /* ── Parámetros de conexión (ajustar cuando la BD esté en producción) ── */
    private $host     = "localhost";
    private $port     = "5432";
    private $db_name  = "sefca";
    private $username = "postgres";
    private $password = "";

    /** @var PDO|null Instancia de conexión PDO */
    public $conexion;

    /**
     * Establece y retorna la conexión PDO a PostgreSQL.
     *
     * @return PDO|null  Objeto PDO si la conexión es exitosa, null en caso de error.
     */
    public function conectar()
    {
        $this->conexion = null;

        try {
            $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->db_name}";

            $this->conexion = new PDO($dsn, $this->username, $this->password);

            // Modo de error: excepciones para depuración limpia
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Consultas preparadas emuladas desactivadas (mejor seguridad)
            $this->conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            // Codificación UTF-8
            $this->conexion->exec("SET client_encoding TO 'UTF8'");

        } catch (PDOException $e) {
            // En producción, registrar en log en lugar de mostrar en pantalla
            error_log("Error de conexión PostgreSQL: " . $e->getMessage());
        }

        return $this->conexion;
    }
}