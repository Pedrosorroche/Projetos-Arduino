#include <Keypad.h>


int led1 = 10;
int led2 = 11;
int led3 = 9;
int led4 = 8;

boolean saida = LOW;

byte pinosLinhas[]  = {3,2,1,0};

byte pinosColunas[] = {7,6,5,4};

char teclas[4][4] = {{'1','2','3','A'},
                     {'4','5','6','B'},
                     {'7','8','9','C'},
                     {'*','0','#','D'}};

Keypad teclado1 = Keypad( makeKeymap(teclas), pinosLinhas, pinosColunas, 4, 4);  

void setup() {
  Serial.begin(9600);
  Serial.println("Teclado 4x4 com Biblioteca Keypad");
  Serial.println("Aguardando acionamento das teclas...");
  Serial.println();
  pinMode(led1, OUTPUT);
  pinMode(led2, OUTPUT);
  pinMode(led3, OUTPUT);
  pinMode(led4, OUTPUT);
}

void loop() {
  //Verifica se alguma tecla foi pressionada
  char tecla_pressionada = teclado1.getKey();
  
  //Mostra no serial monitor o caracter da matriz,
  //referente a tecla que foi pressionada
  if (tecla_pressionada=='1')
  {
    saida = !saida;
    digitalWrite(led1, saida);
    delay(500);
    Serial.print("Tecla: ");
    Serial.println(tecla_pressionada);
  } 
  if (tecla_pressionada=='2')
  {
    saida = !saida;
    digitalWrite(led2, saida);
    delay(500);
    Serial.print("Tecla: ");
    Serial.println(tecla_pressionada);
  } 
   
  if (tecla_pressionada=='3')
  {
    saida = !saida;
    digitalWrite(led3, saida);
    delay(500);
    Serial.print("Tecla: ");
    Serial.println(tecla_pressionada);
  } 
   
  if (tecla_pressionada=='4')
  {
    saida = !saida;
    digitalWrite(led4, saida);
    delay(500);
    Serial.print("Tecla: ");
    Serial.println(tecla_pressionada);
  } 
}
