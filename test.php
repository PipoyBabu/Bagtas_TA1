<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h2>1. Server Diagnostics</h2>";
echo "PHP Version: " . phpversion() . "<br>";
echo "Intl extension: " . (extension_loaded('intl') ? '<span style="color:green">ENABLED</span>' : '<span style="color:red">DISABLED</span>') . "<br>";
echo "Mbstring extension: " . (extension_loaded('mbstring') ? '<span style="color:green">ENABLED</span>' : '<span style="color:red">DISABLED</span>') . "<br>";

echo "<h2>2. Testing Directory & Permissions</h2>";
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

if (!file_exists(FCPATH . 'app/Config/Paths.php')) {
    die("<span style='color:red'>ERROR: app/Config/Paths.php NOT found in " . FCPATH . "</span>");
}

require FCPATH . 'app/Config/Paths.php';
$paths = new Config\Paths();
echo "System Dir: " . htmlspecialchars($paths->systemDirectory) . " (" . (is_dir($paths->systemDirectory) ? '<span style="color:green">EXISTS</span>' : '<span style="color:red">MISSING</span>') . ")<br>";
echo "Writable Dir: " . htmlspecialchars($paths->writableDirectory) . " (" . (is_writable($paths->writableDirectory) ? '<span style="color:green">WRITABLE</span>' : '<span style="color:red">NOT WRITABLE</span>') . ")<br>";

echo "<h2>3. Booting CodeIgniter</h2>";
try {
    require $paths->systemDirectory . '/Boot.php';
    echo "Boot.php loaded successfully.<br>";
    exit(CodeIgniter\Boot::bootWeb($paths));
} catch (\Throwable $e) {
    echo "<div style='background:#fee;border:2px solid #c00;padding:15px;color:#900;font-family:monospace;margin-top:15px;'>";
    echo "<h3>DIAGNOSTIC ERROR REPORT</h3>";
    echo "<strong>Type:</strong> " . htmlspecialchars(get_class($e)) . "<br>";
    echo "<strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "<br>";
    echo "<strong>File:</strong> " . htmlspecialchars($e->getFile()) . " (line " . $e->getLine() . ")<br><br>";
    echo "<strong>Trace:</strong><br><pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</div>";
}
