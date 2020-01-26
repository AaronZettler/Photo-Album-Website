# Photo-Album-Website
![Pi_Remote_IR](http://m.UploadEdit.com/bbtc/1579994855661.jpg)

Photo-Album-Website is a website that can catalog your pictures. You can add **Years**, **Subjects** and **Pictures**. Each Year contains multiple Subject and each subject contains multiple Pictures. Note that you **can't upload big pictures or to many pictures at once**. For that you might need to reconfigure your Apache Server.

**Team members**: Aaron Zettler

## How to install
I used an **Apache** Server to host this website and **MySQL** for the database.
  - copy the "album" folder to the execution folder of you Apache Webserver (<your paht>\htdocs\album)
  - add the database by entering the following URL into a web browser, create a new database called " 5ahel_zettler" and import the "5ahel_zettler.sql" file.

## Adding a Year
![adding_a_year](http://m.UploadEdit.com/bbtc/1579997610563.jpg)
To add a year the following steps are required.
1. click on the **"select year"** button 
2. click on the **"+"** button
3. open the **"year selection menu"**
4. select a year
5. click **"add"** to add the year to the database

## Adding a Subject
![adding_a_subject](http://m.UploadEdit.com/bbtc/1579997627795.jpg)
 It is important that you select the year that will contain your new subject first by **clicking on the "select year"** button and selecting the year. To add a subject the following steps are required.
1. click on the **"+"**" button 
2. enter your subject name
3. click on the **"add"** button

## Adding a Picture
![adding_a_picture](http://m.UploadEdit.com/bbtc/1579997638905.jpg)
It is important that you **select the subject that will contain your new photos**.
To add a picture the following steps are required.
1. select your subject 
2. click on **"Choose a file"**
3. select your images
4. and click on **"open"**

[lirc_tutorial_1]: <https://clever.coex.tech/en/ir_sensors.html>
[lirc_tutorial_2]: <https://tutorials-raspberrypi.de/raspberry-pi-ir-remote-control/>
[IR-Remote-Receiver-Python-Module]: <https://github.com/owainm713/IR-Remote-Receiver-Python-Module>
