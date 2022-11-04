
int led = 3; //defino pino 3 com o nome de led
int tempo;
void setup() {
  pinMode(led, OUTPUT); //define o led( pino 3) como saida
  }

void loop() {
  tempo = 300;
  digitalWrite(led, HIGH); // liga a saida led
  delay(tempo); //pausa de 1s
  digitalWrite(led, LOW); //desliga o led
  delay(tempo);

}
