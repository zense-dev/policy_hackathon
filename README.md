Policy_hackathon
================

IIM Bangalore Policy Hackathon 2014 
Team - Common Man
Live Website available on 

http://ctdkarnataka.zense.co.in

A central repository of all government schemes. Fully crowd sourced.

All the features are in development stage right now. Contributions are always welcome.

Challenges right now 
1. A good and effective user interface. 
2. Ways to handle the duplicate submissions.
3. User contributions and history.
4. History and archiving of all the changes done to a scheme or policy.


Advanced Features (under Development)
1. Read the QR Code using Webcam 
    Parse relevant data from them and return PDF in regional language 
    Major Challenges in this feature involve -> Webcam of Desktop doesn't have autofocus and hence is not able to read the
    QR code properly 
    
2. Fully implement a live SMS Gateway
3. A working admin console. 
    Details will be shared with anyone who's interested


How to install and run this application 
1. Apache and mysql should be installed 
2. Make a new database in mysql named "policy_hack"
3. Import the file policy_hack.sql
4. Go to application/config/database.php
5. Change the database information there 

In case you need any help with this then do contact 
vikas.yadav@iiitb.org

NOTE: I'll sugest you to contribute here only if you know about the codeigniter framework or some MVC architecture in general, Otherwise you can mail your simple code with all the requirements and I will integrate it. 
