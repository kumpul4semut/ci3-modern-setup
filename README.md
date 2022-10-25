# ci3-modern-setup
Codeigniter 3 the setup that I think is the most comfortable :).

### Install
``` git clone https://github.com/kumpul4semut/ci3-modern-setup ```

### Usage
- Put in htdocs
- Envirovment use .env file. Rename .env.example file to .env file
- Setting .env
```
ENVIRONMENT=development
BASE_URL=http://localhost/

DB_HOST=localhost
DB_USER=root
DB_PASSWORD=
DB_NAME=ci3-modern-setup
 ```
 - Migration default table
```
php index.php matches do:migration
```

### Extends Library
- CLI https://github.com/avenirer/codeigniter-matches-cli
- Ion Auth https://github.com/benedmunds/CodeIgniter-Ion-Auth
