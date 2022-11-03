# Book Records

Small application to extract author and book details from XML files. There can be a tree of a folder, or subfolders.

## Installation

Download the repository locally and make sure you have [composer](https://getcomposer.org/download/) in your system. Execute the following command:

```bash
composer install
```

## Instructions
* Navigate to the file: ```config/parameters.php``` and configure database driver and related changes to database.

* Navigate to ```mysql-script/create-tables.sql``` and execute the sql script to create tables under the database.

* For the first time, you can open the following URL in the browser: ```http://localhost/BookRecords/run_script```.
   The above point will populate the author and books.

* Automated cron job needs to be set in order to synchronize the data periodically. Please follow the steps 
   for the LINUX-based system:
    1. Type the following command in the terminal to enter cronjob: ```crontab -e```
    2. Add the following in crontab ```30 * * * * curl -s http://localhost/BookRecords/run_script > /dev/null```. The command executes the script 2 times an hour, this can be altered as per the desired frequencies.

## XML 
You can add books through XML file and it should be kept under the folder name ```books```. You can find various folders consisting of XML files.

Demo XML:
```
<?xml version="1.0"?>
<catalog>
    <book>
        <name>Book 1</name>
        <author>Pavel Vejinov</author>
    </book>
    <book>
        <name>Book 2</name>
        <author>Pavel Vejinov</author>
    </book>
</catalog>
``` 
### Run
Now it's time to run index.php and search author name, you will get results.

**HINT**: you can type 'sh' and the results will be displayed below.

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](https://choosealicense.com/licenses/mit/)