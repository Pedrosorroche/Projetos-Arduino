#include <SPI.h>
#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <MFRC522.h>

//Definir TRIG, ECHO e Buzzer
#define SS_PIN    D8
#define RST_PIN   D3
#define httpPort 80

String IDtag = "";
MFRC522 LeitorRFID(SS_PIN, RST_PIN);

WiFiClient cliente;

const char* ssid     = "CASA_PTC";
const char* password = "38823434";
const char* host = "db4free.net";

void setup() {

  Serial.begin(921600);
  SPI.begin();
  LeitorRFID.PCD_Init();

  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());

}

void loop() {
  Leitura();
}

void Leitura(){
  
  IDtag = "";
  if (!LeitorRFID.PICC_IsNewCardPresent()) {
    return;
  }
  // Select one of the cards
  if (!LeitorRFID.PICC_ReadCardSerial()) {
    return;
  }
  for (byte i = 0; i < LeitorRFID.uid.size; i++) 
  {
    IDtag.concat(String(LeitorRFID.uid.uidByte[i], HEX));
  }
  baterPonto();
  delay(2000);
}

void baterPonto(){
  
  Serial.println("Codigo lido: " + IDtag);

  if (!cliente.connect(host, httpPort)) {
    Serial.println();
    Serial.println("Falha na conexao com o servidor");
    delay(5000);
    return;
  } else{
    cliente.print("GET /PF_IoT_P/salvar.php?");
    cliente.print("id=");
    cliente.print(IDtag);
    cliente.println(" HTTP/1.1");
    cliente.println("Host: 192.168.0.91");
    cliente.println("Connection: close");
    cliente.println();
  }
    
  unsigned long timeout = millis();
  while (cliente.available() == 0) {
    if (millis() - timeout > 5000) {
       Serial.println();
       Serial.println(">>> Client Timeout !");
       cliente.stop();
       return;
    }
  }

  while (cliente.available()) {
    String line = cliente.readStringUntil('\r');
    Serial.println();
    if(line.indexOf("excluido_com_sucesso") != -1){
      Serial.println("Produto excluido com sucesso");
    }
    else if(line.indexOf("produto_inexistente") != -1){
      Serial.println("Ops! Produto inexistente");
    }
  }
  
  // Close the connection
  Serial.println();
  Serial.println("conexao fechada");
  cliente.stop();
}
