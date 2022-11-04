
int pot;

void setup() {
  Serial.begin(9600);
  
}

void loop() {
  pot = analogRead(A0);   //retorna valores de 0 até 1023
  Serial.println(pot);

  delay(100);
 

}
