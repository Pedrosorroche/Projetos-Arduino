

int led1 = 4;
int led2 = 5;
int led3 = 6;
int tempo;
void setup() {
  pinMode(led1, OUTPUT); //define o led1( pino 3) como saida
  pinMode(led2, OUTPUT); //define o led2 (pino 4) como saida
  pinMode(led3, OUTPUT); //define o led3 (pino 4) como saida
 
  }

void loop() {
  //tempo = 100;
  digitalWrite(led1, HIGH); // liga a saida led
  digitalWrite(led2, LOW);
  digitalWrite(led3, LOW);
  
  delay(10000); //pausa de 1s
  
  digitalWrite(led1, LOW); //desliga o led
  digitalWrite(led2, HIGH);
  digitalWrite(led3, LOW);
  
  delay(3000);

  digitalWrite(led1, LOW); //desliga o led
  digitalWrite(led2, LOW);
  digitalWrite(led3, HIGH);
  
  delay(10000);

  

}
