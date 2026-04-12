<?php
/*

File handling allows you to:
- Create files
- Read files
- Write / append data
- Delete files

COMMON FUNCTIONS:
- fopen()               Open file
- fwrite()              Write data
- fread()               Read data
- fclose()              Close file
- file_get_contents()   Read entire file
- file_put_contents()   Write entire file
- unlink()              Delete file

FILE MODES:
- "r"  Read
- "w"  Write (overwrite)
- "a"  Append
- "x" → Create new file
*/


echo "<h2>PHP File Handling Examples</h2>";


// 1. CREATE + WRITE FILE
echo "<h3>1. Create & Write File</h3>";

$file = fopen("example.txt", "w"); 
fwrite($file, "Hello, this is a file example!");
fclose($file);

echo "File 'example.txt' created and written.<br>";



// 2. READ FILE (fread)
echo "<h3>2. Read File using fread()</h3>";

if (file_exists("example.txt")) {
    $file = fopen("example.txt", "r");
    echo fread($file, filesize("example.txt"));
    fclose($file);
} else {
    echo "File not found!";
}

echo "<br><br>";


// 3. READ FILE (file_get_contents)
echo "<h3>3. Read using file_get_contents()</h3>";

echo file_get_contents("example.txt");
echo "<br><br>";


// 4. APPEND DATA
echo "<h3>4. Append Data</h3>";

$file = fopen("example.txt", "a");
fwrite($file, "\nThis line is appended!");
fclose($file);

echo "Data appended successfully.<br><br>";


// 5. WRITE USING file_put_contents
echo "<h3>5. file_put_contents()</h3>";

file_put_contents("quick.txt", "Quick write example");
echo "quick.txt created.<br><br>";


// 6. DELETE FILE
echo "<h3>6. Delete File</h3>";

if (file_exists("quick.txt")) {
    unlink("quick.txt");
    echo "quick.txt deleted.<br>";
} else {
    echo "File already deleted.<br>";
}

?>