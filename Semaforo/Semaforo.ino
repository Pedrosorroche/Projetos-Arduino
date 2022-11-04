

int led_vermelho = 6;
int led_verde = 4;
int led_amarelo = 5;

void setup() {
  pinMode(led_vermelho, OUTPUT); //define o led1( pino 3) como saida
  pinMode(led_verde, OUTPUT); //define o led2 (pino 4) como saida
  pinMode(led_amarelo, OUTPUT); //define o led3 (pino 4) como saida
 
  }

void loop() {
  digitalWrite(led_vermelho, HIGH); // liga a saida led
  digitalWrite(led_verde, LOW);
  digitalWrite(led_amarelo, LOW);
  
  delay(5000); //pausa de 5s
  
  digitalWrite(led_vermelho, LOW); //desliga o led
  digitalWrite(led_verde, HIGH);
  digitalWrite(led_amarelo, LOW);
  
  delay(5000); //pausa de 5s

  digitalWrite(led_vermelho, LOW); //desliga o led
  digitalWrite(led_verde, LOW);
  digitalWrite(led_amarelo, HIGH);
  
  delay(1000); //pausa de 1s

  

}
