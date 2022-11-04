
int pot;
int entrada = A0;
int led_verde = 5;
int led_amarelo = 6;
int led_vermelho = 7;

void setup() {
  Serial.begin(9600);
  pinMode(5, OUTPUT);
  pinMode(6, OUTPUT);
  pinMode(7, OUTPUT);
  
  
}

void loop() {
  pot = analogRead(entrada);   //retorna valores de 0 até 1023
  Serial.println(pot);

  
  if(pot == 0){
    digitalWrite(led_verde, LOW);
    digitalWrite(led_amarelo, LOW); 
    digitalWrite(led_vermelho, LOW); 
  }
  
  
  else if (pot<300){
    digitalWrite(led_verde, HIGH);
    digitalWrite(led_amarelo, LOW); 
    digitalWrite(led_vermelho, LOW); 
  }
  else if(pot<900){
    digitalWrite(led_amarelo, HIGH);
    digitalWrite(led_vermelho, LOW); 
  }
  else {
    digitalWrite(led_vermelho, HIGH);
  }

  delay(25);
 

}
