# Photo-Album-Website
![Pi_Remote_IR](http://m.UploadEdit.com/bbtc/1579994855661.jpg)]

Photo-Album-Website is a website that can catalog your picturs. You can add Years, Subjects and Pictures. Each Year contains multiple Subject and each subject contains multiple Pictures. Note that you can't upload big pictures or to manny pictures at once. For that you might need to reconfigure your Apache Server.

**Team members**: Aaron Zettler

## How to install
I used an Apache Server to host this website and MySQL for the database.
  - coppy the "album" to the execution folder of you Apache Webserver (<your paht>\htdocs\album)
  - add the database by entering the following url into a webbrowser, create a new database called " 5ahel_zettler" and import the "5ahel_zettler.sql" file.

## How to use
The following stepps are required to start the python script.
  - cd to the git repository with
    ```sh
    cd <your setup path>\Pi_Remote_IR
    ```
  - start the python script
    ```sh
    python Pi_Remote_IR.py
    ```
