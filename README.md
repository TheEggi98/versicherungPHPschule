# versicherungPHPschule

Features:
- Greift auf DB zu
- Kann Datensätze erstellen (vorrausgesetzt PK ist auto increment)
- Kann Datensätze bearbeiten (im normalfall)
- Kann Datensätze löschen (gibt Fehlermeldung wenn relation woanders)
- FKs werden aufgeschlüsselt und im Formular als Dropdown angeboten

Bei DB änderungen:
- createModelsFromDB.php ausführen um Models anhand der DB neu zu erstellen
- createApis.php ausführen um Apis anhand der DB neu zu erstellen

Probleme:
- Autoincrement bei jeder Tabele vorrausgesetzt
