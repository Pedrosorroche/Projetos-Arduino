
int led = 4;
int botao = 3;
boolean saida = LOW;

void setup() {
  pinMode(led, OUTPUT);
  pinMode(botao, INPUT);
  Serial.begin(9600);

}

void loop() {
  int entrada = digitalRead(botao);
  

  if (entrada ==1){
    saida = !saida;
    digitalWrite(led, saida);
    delay(500);
  }
}
