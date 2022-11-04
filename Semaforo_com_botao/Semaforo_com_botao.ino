
int led1 = 13; //led vermelho carro
int led2 = 12; //led amarelo carro
int led3 = 11; //led verde carro
int led4 = 5; //led vermelho pedestre
int led5 = 4; //led verde pedestre
int botao = 3; //acionador


void setup() {
  pinMode(led1, OUTPUT);
  pinMode(led2, OUTPUT);
  pinMode(led3, OUTPUT);
  pinMode(led4, OUTPUT);
  pinMode(led5, OUTPUT);
  pinMode(botao, INPUT);
}

void loop() {
  
  digitalWrite(led1,LOW);
  digitalWrite(led2,LOW);
  digitalWrite(led3,HIGH);
  digitalWrite(led4,HIGH);
  digitalWrite(led5,LOW);
  

  boolean entrada = digitalRead(botao);
  
 
  if (entrada == 1){

    digitalWrite(led3, LOW);
    digitalWrite(led2, HIGH);//desliga verde e liga amarelo
    delay(1000);//delay
    
    digitalWrite(led2, LOW);
    digitalWrite(led1, HIGH);//desliga amarelo e liga o vermelho carro
    //delay(1000);//delay
    
    digitalWrite(led5, HIGH);//liga o verde pedestre e desliga o vermelho pedestre
    digitalWrite(led4, LOW);
    delay(5000);//delay
    
    digitalWrite(led5,LOW);//desligar o verde pedestre e pisca o vermelho
    digitalWrite(led4, HIGH);
    delay(500);
    digitalWrite(led4, LOW);
    delay(500);
    digitalWrite(led4, HIGH);
    delay(500);
    digitalWrite(led4, LOW);
    delay(500);
    digitalWrite(led4, HIGH);
    delay(500);
    digitalWrite(led4, LOW);
    delay(1000);//delay
  }
}
