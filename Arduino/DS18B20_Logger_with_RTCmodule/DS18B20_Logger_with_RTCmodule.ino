#include <DallasTemperature.h>
#include <OneWire.h>
#include <Wire.h>
#include <RTClib.h>
#include <Time.h>
#include <SPI.h>
#include <SD.h>

#define ONE_WIRE_BUS_PIN 2

OneWire oneWire(ONE_WIRE_BUS_PIN);
DallasTemperature sensors(&oneWire);
RTC_DS1307 RTC;
OneWire  ds(2);

DeviceAddress Sensor1 = { 0x28, 0xFF, 0x3C, 0x05, 0x44, 0x16, 0x03, 0x67 };
DeviceAddress Sensor2 = { 0x28, 0xFF, 0x6B, 0xD3, 0x43, 0x16, 0x03, 0xD1 }; 
DeviceAddress Sensor3 = { 0x28, 0xFF, 0x09, 0xE0, 0x43, 0x16, 0x03, 0x83 }; 

float tempC1, tempC2, tempC3;

int ledPin = 12;  // Set our LED pin
const int chipSelect = 9;  //CS Pin for SD card reader

byte startHour = 1;    // Set our start and end times
byte startMinute = 44;  // Don't add leading zero to hour or minute - 7, not 07
byte endHour = 8;      // Use 24h format for the hour, without leading zero
byte endMinute = 30;

byte validStart = 0;    // Declare and set to 0 our start flag
byte poweredOn = 0;     // Declare and set to 0 our current power flag
byte validEnd = 0;      // Declare and set to 0 our end flag

void setup () {
  Serial.begin(9600);
  sensors.begin();                                                                        
  
  sensors.setResolution(Sensor1, 12);
  sensors.setResolution(Sensor2, 12);
  sensors.setResolution(Sensor3, 12);                                                                                                                      




  
  pinMode(ledPin, OUTPUT); // Set our LED as an output pin
  digitalWrite(ledPin, LOW); // Set the LED to LOW (off)

  Wire.begin();              // Start our wire and real time clock
  RTC.begin();

  if (! RTC.isrunning()) {                       // Make sure RTC is running
    Serial.println("RTC is NOT running!");
    //RTC.adjust(DateTime(__DATE__, __TIME__));  // Uncomment to set the date and time
  }
  Serial.print("Initializing SD card...");
    if (!SD.begin(chipSelect)) {
      Serial.println("Card failed, or not present");
      // don't do anything more:
      return;
    }
  Serial.println("card initialized.");

 
    float a = sensors.getDeviceCount();
  Serial.println();
  Serial.print("Number of DS18B20 found on bus = ");  
  Serial.println(a);
}

void loop () {

  DateTime now = RTC.now(); // Read in what our current datestamp is from RTC
  
 if (poweredOn == 0) {  // Check if lights currently powered on
      Serial.print(now.hour()); Serial.print(":"); Serial.print(now.minute()); Serial.print(":"); Serial.print(now.second()); Serial.println("");
      delay(1000);
      checkStartTime();    // If they are not, check if it's time to turn them on
    } else {
      checkEndTime();      // Otherwise, check if it's time to turn them off
      
     
    }

    if (validStart == 1) { // If our timer is flagged to start, turn the lights on 
//        turnLedOn();
        ReadData();        // cia kisti koda kuris veiks po taimerio ON
                
  }
    if (validEnd == 1) {   // If our time is flagged to end, turn the lights off
//      turnLedOff();
      return;
          }
  

  
}

byte checkStartTime() {
  DateTime now = RTC.now();  // Read in what our current datestamp is from RTC
  if (now.hour() == startHour && now.minute() == startMinute) {
    validStart = 1;  // If our start hour and minute match the current time, set 'on' flags
    poweredOn = 1;
  } else {
    validStart = 0;  // Otherwise we don't need to power up the lights yet
  }

  return validStart; // Return the status for powering up
}
// iki ci gerai
byte checkEndTime() {
  DateTime now = RTC.now();  // Read in what our current datestamp is from RTC

  if (now.hour() == endHour && now.minute() == endMinute) {
    validEnd = 1;    // If our end hour and minute match the current time, set the 'off' flags
    poweredOn = 0;
        
  } else {
    validEnd = 0;    // Otherwise we don't need to power off the lights yet
  }

  return validEnd;   // Return the status for powering off
}
// iki cia gerai
//void turnLedOn() {
//  digitalWrite(ledPin, HIGH);// Turn on the LED
//  return;
//}

//iki cia gerai

void ReadData() {
    byte i;
  byte data[12];
  byte addr[8];
  delay(1000);  
  if ( !ds.search(addr)) {
    Serial.println("No more addresses.");
    Serial.println();
    ds.reset_search();
    delay(250);
    return;
  }
  
  Serial.print("ROM =");
  for( i = 0; i < 8; i++) {
    Serial.write(' ');
    Serial.print(addr[i], HEX);
  }

  if (OneWire::crc8(addr, 7) != addr[7]) {
      Serial.println("CRC is not valid!");
      return;
  }
  Serial.println();
 
  // the first ROM byte indicates which chip
  switch (addr[7]) {
    case 0x67:
      delay(1000);
      sensors.requestTemperatures();
      tempC1 = sensors.getTempC(Sensor1);
      Serial.print("C: ");
      Serial.print(tempC1);
      Serial.println();
      DateTime now = RTC.now();
    File dataFile = SD.open("rtc.csv", FILE_WRITE);
    dataFile.print(now.hour()); 
    dataFile.print(":");
    dataFile.print(now.minute());
    dataFile.print(":");
    dataFile.print(now.second());
    dataFile.print("\t");
    dataFile.print("Sensor1 temp: ");
    dataFile.print("\t");
    dataFile.print(tempC1);
    dataFile.println("");
    dataFile.close();
    delay(1000);
    break;
    
    
    case 0xD1:
      delay(1000);
      sensors.requestTemperatures();
      tempC2 = sensors.getTempC(Sensor2);
      Serial.print("C: ");
      Serial.print(tempC2);
      Serial.println();
      DateTime now = RTC.now();
    File dataFile = SD.open("rtc.csv", FILE_WRITE);
    dataFile.print(now.hour()); 
    dataFile.print(":");
    dataFile.print(now.minute());
    dataFile.print(":");
    dataFile.print(now.second());
    dataFile.print("\t");
    dataFile.print("Sensor2 temp: ");
    dataFile.print("\t");
    dataFile.print(tempC2);
    dataFile.println("");
    dataFile.close();
    delay(1000);
    break;  

   default:
      Serial.println("Device is not a DS18x20 family device.");
   return;
   

    
  }

  ds.reset();
  ds.select(addr);
  // maybe 750ms is enough, maybe not
  // we might do a ds.depower() here, but the reset will take care of it.
}

//void turnLedOff() {
//  digitalWrite(ledPin, LOW);   // Turn off the LED
//  return;
//}


