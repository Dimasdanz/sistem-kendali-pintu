#include <SPI.h>
#include <Ethernet.h>
#include <Keypad.h>
#include <Wire.h> 
#include <LiquidCrystal_I2C.h>
#include <Servo.h>

const byte ROWS = 4;
const byte COLS = 3;
char keys[ROWS][COLS] = {
  {
    '1','2','3'}
  ,
  {
    '4','5','6'}
  ,
  {
    '7','8','9'}
  ,
  {
    '*','0','#'}
};
byte rowPins[ROWS] = {2, 3, 4, 5};
byte colPins[COLS] = {6, 7, 8};

Keypad keypad = Keypad(makeKeymap(keys), rowPins, colPins, ROWS, COLS );
LiquidCrystal_I2C lcd(0x27,20,4);
EthernetClient client;
Servo myservo;

byte server[] = {192,168,1,3};
byte mac[] = {0x90, 0xA2, 0xDA, 0x0E, 0xF5, 0x30};
byte ip[] = {192,168,1,7};

const int led = A0;
const int push_btn = A2;
const int sensor = A3;

int tried = 0;
int attempts;
String password = "";
int servo = 9;

String dev_con;
String dev_status;
boolean condition = false;
String srv_status = "/danzsecurity/device/status.txt HTTP/1.0";
String srv_con = "/danzsecurity/device/condition.txt HTTP/1.0";

char strPass[16];
int count = 0;

String display = "";
boolean display_armed = false;
boolean display_disarmed = false;
boolean display_locked = false;

void setup()
{
  myservo.attach(9);
  lcd.init();
  lcd.backlight();
  lcd.setCursor(3, 0);
  lcd.print("Danz  Security");
  lcd.setCursor(0,1);
  lcd.print("Initializing...");
  Ethernet.begin(mac, ip);
  pinMode(led, OUTPUT);
  pinMode(push_btn, INPUT);
  pinMode(sensor, INPUT);
  checkCondition();
  checkDevice();
  myservo.write(60);
}

void loop(){
  char key = keypad.getKey();
  int push_value = 0;
  
  if (checkDevice()) {
    if (condition){
      push_value = analogRead(push_btn);
      if(push_value > 1000){
        openDoor();
      }
      if (key != NO_KEY){
        display += "*";
        lcd.setCursor(0,2);
        lcd.print(display);
        strPass[count] = key;
        count++;
      }
      if (key == '*'){
        tried++;
        for(int i=0; i<(count-1); i++){
          password += (strPass[i]);
        }
        count = 0;
        display = "";
        lcd_init();
        send_password();
        delay(250);
        get_password();
        password = "";
      }
      if (key == '#'){
        display = "";
        lcd_init();
        memset(strPass, '\0', count);
        count = 0;
      }
    }
    else{
      checkCondition();
    }
  }
}

void lcd_init(){
  lcd.setCursor(3,0);
  lcd.print("Danz  Security");
  lcd.setCursor(0,1);
  lcd.print("Input Password :");
  lcd.setCursor(0,2);
  for(int i=0;i<20;i++){
    lcd.print(" ");
  }
}

void lcd_disarmed(){
  lcd.clear();
  lcd.setCursor(3, 0);
  lcd.print("Danz  Security");
  lcd.setCursor(2,2);
  lcd.print("Device  Disarmed");
}

void lcd_locked(){
  lcd.clear();
  lcd.setCursor(3, 0);
  lcd.print("Danz  Security");
  lcd.setCursor(3,2);
  lcd.print("Device Locked!");
}

void lcd_wrong(int tried){
  lcd.setCursor(3,2);
  lcd.print("Wrong Password");
  lcd.setCursor(13,3);
  lcd.print(tried);
  delay(1000);
  lcd.setCursor(0,2);
  for(int i=0;i<20;i++){
	lcd.print(" ");
  }
}

void lcd_open(){
  lcd.clear();
  lcd.setCursor(3,0);
  lcd.print("Danz  Security");
  lcd.setCursor(4,2);
  lcd.print("Door  Opened");
}

void lcd_attempts(int tried, int attempts){
  lcd.setCursor(0,3);
  lcd.print("Attempts :");
  lcd.setCursor(13,3);
  lcd.print(tried);
  lcd.setCursor(15,3);
  lcd.print("/");
  lcd.print(attempts);
}

boolean checkDevice(){
  dev_status = read_server(srv_status);
  if(dev_status == "1"){
    if(!display_armed){
      lcd.clear();
      lcd_init();
      display_armed = true;
	  digitalWrite(led, HIGH);
    }
    display_disarmed = false;
	return true;
  }
  else{
    digitalWrite(led, LOW);
    tried = 0;
    if(!display_disarmed){
      lcd_disarmed();
      display_disarmed = true;
    }
    display_armed = false;
	return false;
  }
}

void checkCondition(){
  dev_con = read_server(srv_con);
  if(dev_con == "1"){
    lcd.clear();
    lcd_init();
    condition = true;
    display_locked = false;
  }
  else{
    condition = false;
    if(!display_locked){
      lcd_locked();
      display_locked = true;
    }
  }
}

void send_password()
{
  String data ="";
  EthernetClient client;
  data = "password="+ password;

  if (client.connect(server,80))
  {
    client.print("POST /danzsecurity/device/get_password.php HTTP/1.1\n");
    client.print("Host: 192.168.1.3\n");
    client.print("Connection: close\n");
    client.print("Content-Type: application/x-www-form-urlencoded\n");
    client.print("Content-Length: ");
    client.print(data.length());
    client.print("\n\n");
    client.print(data);
  }
}

void get_password(){
  String result;
  String srv_result = "/danzsecurity/device/result.txt HTTP/1.0";
  String pswd_attempts = "/danzsecurity/device/attempts.txt HTTP/1.0";

  if(tried == 1){
    attempts = read_server(pswd_attempts).toInt();
    lcd_attempts(tried, attempts);
  }
  
  result = read_server(srv_result);
  if (result == "1"){
    openDoor();
  }else{
    lcd_wrong(tried);
    if(attempts != 0){
      if(tried >= attempts){
        condition = false;
        tried = 0;
        lockDevice();
      }
    }
  }
}

void openDoor(){
  int val = 0;
  lcd_open();
  myservo.write(0);
  delay(3000);
  val = analogRead(sensor);
  while(val < 1020){
    val = analogRead(sensor);
  }
  delay(1000);
  myservo.write(60);
  tried = 0;
  lcd.clear();
  lcd_init();
}

String read_server(String url){
  if (client.connect(server, 80)) {
    client.print("GET ");
    client.println(url);
    client.println();
    return readData();
  }
  else{
    return "connection failed";
  }
}

String readData(){
  int stringPos = 0; 
  boolean startRead = false;
  char inString[32];

  memset( &inString, 0, 32 );
  while(true){
    if (client.available()) {
      char c = client.read();
      if (c == '<' ) {
        startRead = true;
      }
      else if(startRead){
        if(c != '>'){
          inString[stringPos] = c;
          stringPos ++;
        }
        else{
          startRead = false;
          client.stop();
          client.flush();
          return inString;
        }
      }
    }
  }
}

void lockDevice(){
  String data ="";
  EthernetClient client;
  data = "condition=<0>";

  if (client.connect(server,80))
  {
    client.print("POST /danzsecurity/device/lock_device.php HTTP/1.1\n");
    client.print("Host: 192.168.1.3\n");
    client.print("Connection: close\n");
    client.print("Content-Type: application/x-www-form-urlencoded\n");
    client.print("Content-Length: ");
    client.print(data.length());
    client.print("\n\n");
    client.print(data);
  }
}



