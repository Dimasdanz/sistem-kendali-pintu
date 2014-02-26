Sistem Kendali Pintu
--------------------
###Created by : Dimas Rullyan Danu
Door Control System based on Arduino with Web Programming Integration and Push-Notification via Android
###What you need:
 1. 3x4 Keypad for Password Input
 1. I2C LCD 20x4 for display
 1. A Servo to move the door latch
 1. Magnetic sensor to tell the Arduino whether the door is open or lock
 1. Push Button to open the door from the inside
 1. Arduino and Ethernet Shield. Obviously
 1. Web Server that support PHP 5.4 and MySQL
 1. Android device 4.1 and Up

###Setup:
 1. Run the server
 1. Add some user and password
 1. Keypad goes to pin 2-8
 1. Servo on pin 9
 1. Push Button on A1
 1. Magnetic Sensor on A0
 1. LCD on A4 and A5
 1. Install the app on your Android, and Login as Admin

###How it works:
 1. Once you have user and password on the server
 1. Input the ID and Password of the user through the keypad
 1. It will check if the password is right or wrong on the server
 1. If it's right, it will open the door and log who opens it. Also send notification to Android (Including name and time).
 1. If it's wrong, you have another chance to enter the password
 1. Password attempt can be set from the web. 
 1. If user reach password attempt, the door will be locked and can only be unlock from the web.

###Note:
 1. Android still have many bugs but it's usable.
 2. You may need to change a few IP Addresses to suits your environment.
 3. Feel free to use this and don't forget to include my name :D

###Credit:
 1. [Bootstrap](http://www.getbootstrap.com/) for the front-end framework
 1. [Arduino.cc](http://www.arduino.cc/)
 1. If you think your name should be included feel free to contact me

###Contact:
 + [Facebook](http://www.facebook.com/Dimasdanz)
 + [Twitter](http://www.twitter.com/Dimasdanz)
 + dimasdanz@gmail.com
