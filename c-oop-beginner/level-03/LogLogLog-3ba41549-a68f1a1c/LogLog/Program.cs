
var logger = new Loggers.MyLogger();
// Netter om package te gebruiken. Reden dat ik de file toevoeg is omdat linter niet leuk vind als deze file ontbreekt
logger.Debug("Het programma draait op localhost:8000");
// DEBUG: Het programma draait op localhost:8000

logger.Info("Het programma is succesvol gestart");
// INFO: Het programma is succesvol gestart

logger.Warning("De harde schijf is bijna vol, zorg dat je ruimte maakt");
// WARNING: De harde schijf is bijna vol, zorg dat je ruimte maakt

logger.Error("Er is een fout opgetreden in de database, start mysql opnieuw op!");
// ERROR: Er is een fout opgetreden in de database, start mysql opnieuw op!

logger.Log("SPACESHIP", "Hallo aarde!");
// SPACESHIP: Hallo aarde!