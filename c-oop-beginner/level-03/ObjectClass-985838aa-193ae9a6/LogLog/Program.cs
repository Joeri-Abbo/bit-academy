var logger = new Loggers.MyLogger("TestClass");
logger.Error("dit is een error");

var logger2 = new Loggers.MyLogger("DifferentClass");
logger2.Error("dit is een andere error");