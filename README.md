kea
===

Kurs Equippen Anmeldung (KEA)

Installation
------------

(not batched yet :)

1. Checkout
$> git clone <REPO> <DIR>

2. Downlaod (if necessary composer.phar)
$> curl -sS https://getcomposer.org/installer | php

3. Install Silex and the defined components in composer.json
$> php composer.phar install

4. Create DB/User and configure /src/config/db.json

5. Create DB-Structure
$> mysql -u <USERNAME> -p -h localhost <DB_NAME> < ./ressource/db_structure.sql

6. Import Base-Date
$> mysql -u <USERNAME> -p -h localhost <DB_NAME> < ./ressource/db_data.sql

7. Create ./tmp/log-Directory and give webserver right wor write.

8. Done.
