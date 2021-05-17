# urlshortner
Custom URL shortner, create short URL with your own domain name.
This script creates a clean, short, and tiny link that can be shared easily via email or social media. The database is used to store the information about long and short URL. Also, you can track the number of hits the short URL gets by the visitors.

URL Shortener Library (class.URLShortener.php)
The URL Shortener class allow to programmatically create short URL using PHP and MySQL. This class uses PDO Extension to work with the MySQL database, so, PDO object instance is required on initialization of URLShortener class.

Static Variables:
<ul>
<li>$characters &ndash; Allowed characters for the short code. (Characters group is separated by |)</li>
<li>$tbl_name &ndash; Database table name to store the URL and short code info.</li>
<li>$ifURLExists &ndash; Set to TRUE, to check whether the long URL exists.</li>
<li>$codeLength &ndash; The length of the short code characters.</li>
</ul>

Functions:

__construct() – Set PDO object reference and timestamp.
urlToShortCode() – Validate URL and create short code.
validateUrlFormat() – Validate the format of the URL.
verifyUrlExists() – Verify the URL whether it exist or not using cURL in PHP.
urlExistsInDB() – Check whether the long URL is exist in the database. If exist, return the shot code, otherwise, return FALSE.
createShortCode() – Create short code for the long URL and insert the long URL & short code in the database.
generateRandomString() – Generate random string (short code) with the specified characters in the $chars variable.
insertUrlInDB() – Insert URL info in the database using PDO Extension and MySQL and return the row ID.
shortCodeToUrl() – Convert the short code to long URL and insert the hits count in the database.
validateShortCode() – Validate the short code based on the allowed characters.
getUrlFromDB() – Fetch the long URL from the database based on the short code.
incrementCounter() – Increment the URL visits counter in the database for a particular record.


URL Rewrite with HTACCESS
If you want to make the URL user-friendly, use HTACCESS with RewriteRule. With mod_rewrite, you can make the URL length shorter and easy to share.

Create a .htaccess file and add the following code.

<IfModule mod_rewrite.c>
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^([a-zA-Z0-9]+)/?$ redirect.php?c=$1 [L] 
</IfModule>
The above HTACCESS RewriteRule will send the request to redirect.php file. So, the redirect.php file name doesn’t need to mention in the short URL.

The short URL without using HTACCESS looks something like this – https://example.com/redirect.php?c=gzYN7BK
The short URL with using HTACCESS looks something like this – https://example.com/gzYN7BK
