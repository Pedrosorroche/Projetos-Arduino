
int led = 3; //defino pino 3 com o nome de led

void setup() {
  pinMode(led, OUTPUT); //define o led( pino 3) como saida
  }

void loop() {
  digitalWrite(led, HIGH); // liga a saida led
  delay(300); //pausa de 1s
  digitalWrite(led, LOW); //desliga o led
  delay(100);

}
