<img src="https://github.com/aesedepece/librepos/raw/master/frontend/img/biglogo.png" alt="librePOS" />
## Current development status
THIS SOFTWARE IS UNDER STRONG DEVELOPMENT BUT STILL NOT USABLE OR EVEN USEFUL AS IT LACKS MOST FEATURES YET.

## Installing
 1. Import `sql/structure.sql` and `sql/settings.data.sql` into your MySQL setup.
 2. Create a user with full privileges over the imported tables or grant them to a existing one.
 3. Write down your host, username and password in `frontend/index.php` as follows:
    `$db = mysql_connect("host","user","password");`
 4. Voilà!

## TODO:
 1. General: Receipt printing and drawer opening (backend)
 2. Sales interface: Receipt printing and drawer opening (frontend), Client selection, Discounts, Returns
 3. Management: Sellers, Clients, Discounts, Purchases, Informs (Sales, Stock)
 4. System: Settings, License, Credits