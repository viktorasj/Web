#include <TFT.h>
#include <SPI.h>

#define cs   10
#define dc   8
#define rst  9
TFT TFTscreen = TFT(cs, dc, rst);

float R1 = 91500.0; // resistance of R1 (100K) -see text!
float R2 = 9800.0; // resistance of R2 (10K) - see text!

int relePin = 4;
int p = 135;
int t1 = 5;
int t2 = 103;

char sensorPrintout1[5];
char sensorPrintout2[6];
void setup() {
  Serial.begin(9600);
  pinMode(relePin, OUTPUT);
  digitalWrite(relePin, HIGH);
  
  TFTscreen.begin();
  TFTscreen.background(0, 0, 0);
  TFTscreen.stroke(255, 255, 255);
  TFTscreen.setTextSize(2);
  TFTscreen.text("Srove:\n ", 0, 0);
  TFTscreen.text("Itampa:\n ", 0, 45);
  TFTscreen.setTextSize(3);
  TFTscreen.text("A \n ", 130, 20);
  TFTscreen.text("V \n ", 130, 68);
 }



void loop() {
  //Srove
  unsigned int x1 = 0;
  float SrovesReiksme = 0.0;
  float Samples1 = 0.0;
  float SrovesVidurkis = 0.0;
  float NaujaSrove = 0.0;
  for (int x1 = 0; x1 < 150; x1++) {
    SrovesReiksme = analogRead(A0);
    Samples1 = Samples1 + SrovesReiksme;
    delay(3);
  }
  SrovesVidurkis = Samples1 / 150.0;

  NaujaSrove = ((SrovesVidurkis * (5.0 / 1024.0)) - 2.5) / 0.100;

  //itampa

  unsigned int x2 = 0;
  float ItamposReiksme = 0.00;
  float Samples2 = 0.00;
  float ItamposVidurkis = 0.00;
  float NaujaItampa = 0.00;
   for (int x2 = 0; x2 < 150; x2++) {
    ItamposReiksme = analogRead(A1);
    Samples2 = Samples2 + ItamposReiksme;
    delay(3);
  }
  ItamposVidurkis = Samples2 / 150.00;

  NaujaItampa = ((ItamposVidurkis * 5) / 1024.00) / (R2 / (R1 + R2));

  Serial.print("Srove = ");
  Serial.print(NaujaSrove + 0.06); //srove
  Serial.print("\n");
  Serial.print("Itampa = ");
  Serial.print(NaujaItampa);
  Serial.print("\n");

  String sensorVal1 = String(NaujaSrove + 0.06);
  sensorVal1.toCharArray(sensorPrintout1, 5); //nezinau kas
  TFTscreen.stroke(50, 255, 50);  //spalva
  TFTscreen.text(sensorPrintout1, 52, 20); //pozicija

  String sensorVal2 = String(NaujaItampa);
  sensorVal2.toCharArray(sensorPrintout2, 6);
  TFTscreen.stroke(50, 255, 50);  // spalva
  TFTscreen.text(sensorPrintout2, 35, 68); // pozicija
  
  if (NaujaItampa > 14.40) {
    turnOff();
  }
 
  delay(2500);
  TFTscreen.stroke(0, 0, 0);
  TFTscreen.text(sensorPrintout1, 52, 20);
  TFTscreen.text(sensorPrintout2, 35, 68);

}
void turnOff () {

  digitalWrite(relePin, LOW);
  flashing();
  exit(0);
  
}

void flashing() {
  TFTscreen.stroke(0, 0, 255);
  TFTscreen.setTextSize(2);
  TFTscreen.text("*", t1, t2);
  delay(p);
  TFTscreen.stroke(0, 255, 0);
  TFTscreen.text(" *", t1, t2);
  delay(p);
  TFTscreen.stroke(255, 0, 0);
  TFTscreen.text("  *", t1, t2);
  delay(p);
  TFTscreen.stroke(255, 255, 0);
  TFTscreen.text("   I", t1, t2);
  delay(p); 
  TFTscreen.stroke(128, 0, 255);
  TFTscreen.text("    K", t1, t2);
  delay(p); 
  TFTscreen.stroke(0, 255, 255);
  TFTscreen.text("     R", t1, t2);
  delay(p); 
  TFTscreen.stroke(0, 0, 255);
  TFTscreen.text("      A", t1, t2);
  delay(p); 
  TFTscreen.stroke(255, 255, 255);
  TFTscreen.text("       U", t1, t2);
  delay(p); 
  TFTscreen.stroke(255, 128, 0);
  TFTscreen.text("        T", t1, t2);
  delay(p); 
  TFTscreen.stroke(0, 255, 0);
  TFTscreen.text("         A", t1, t2);
  delay(p); 
  TFTscreen.stroke(255, 255, 0);
  TFTscreen.text("          *", t1, t2);
  delay(p); 
  TFTscreen.stroke(0, 255, 0);
  TFTscreen.text("           *", t1, t2);
  delay(p); 
  TFTscreen.stroke(0, 0, 255);
  TFTscreen.text("            *", t1, t2);
  delay(p); 
  TFTscreen.stroke(0, 0, 0);
  TFTscreen.text("*", t1, t2);
  delay(p);
  TFTscreen.stroke(0, 0, 0);
  TFTscreen.text(" *", t1, t2);
  delay(p);
  TFTscreen.stroke(0, 0, 0);
  TFTscreen.text("  *", t1, t2);
  delay(p);
  TFTscreen.stroke(0, 0, 0);
  TFTscreen.text("   I", t1, t2);
  delay(p); 
  TFTscreen.stroke(0, 0, 0);
  TFTscreen.text("    K", t1, t2);
  delay(p); 
  TFTscreen.stroke(0, 0, 0);
  TFTscreen.text("     R", t1, t2);
  delay(p); 
  TFTscreen.stroke(0, 0, 0);
  TFTscreen.text("      A", t1, t2);
  delay(p); 
  TFTscreen.stroke(0, 0, 0);
  TFTscreen.text("       U", t1, t2);
  delay(p); 
  TFTscreen.stroke(0, 0, 0);
  TFTscreen.text("        T", t1, t2);
  delay(p); 
  TFTscreen.stroke(0, 0, 0);
  TFTscreen.text("         A", t1, t2);
  delay(p); 
  TFTscreen.stroke(0, 0, 0);
  TFTscreen.text("          *", t1, t2);
  delay(p); 
  TFTscreen.stroke(0, 0, 0);
  TFTscreen.text("           *", t1, t2);
  delay(p); 
  TFTscreen.stroke(0, 0, 0);
  TFTscreen.text("            *", t1, t2);
  delay(p); 

  return(flashing());




  
}
