<img src="https://github.com/aesedepece/librepos/raw/master/frontend/img/biglogo.png" alt="librePOS" />
## Installing
 1. Import `sql/structure.sql` and `sql/settings.data.sql` into your MySQL setup.
 2. Create a user with full privileges over the imported tables or grant them to a existing one.
 3. Write down your host, username and password in `frontend/index.php` as follows:
    `$db = mysql_connect("host","user","password");`
 4. Voilà!