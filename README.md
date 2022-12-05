# ci3-modern-setup
Codeigniter 3 the setup that I think is the most comfortable :).

### Install
```
# Use git clone
git clone https://github.com/kumpul4semut/ci3-modern-setup
# Download ZIP
https://github.com/kumpul4semut/ci3-modern-setup/archive/refs/heads/main.zip
```

### Usage
- Put ci3-modern-setup in htdocs
- Envirovment copy file .env.example to fale .env
- Setting .env
```
ENVIRONMENT=development
BASE_URL=http://localhost/ci3-modern-setup

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
- Cli https://github.com/avenirer/codeigniter-matches-cli
- Ion Auth https://github.com/benedmunds/CodeIgniter-Ion-Auth
- Datatables https://github.com/kintamahadji/Ignited-Datatable
