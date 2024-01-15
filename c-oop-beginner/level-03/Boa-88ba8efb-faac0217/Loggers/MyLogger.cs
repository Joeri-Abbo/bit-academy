namespace Loggers;

public class MyLogger
{
    public MyLogger(string origin)
    {
        if (string.IsNullOrWhiteSpace(origin))
        {
            throw new ArgumentException("The parameter 'origin' cannot be empty or null.", nameof(origin));
        }
        this.origin = origin;
    }

    private string origin;

    public string Origin
    {
        get { return origin; }
    }
    
    public void Debug(string message)
    {
        Log("DEBUG", message);
    }

    public void Info(string message)
    {
        Log("INFO", message);
    }

    public void Warning(string message)
    {
        Log("WARNING", message);
    }

    public void Error(string message)
    {
        Log("ERROR", message);
    }

    public void Log(string level, string message)
    {
        LogWithTime(level + " [" + origin + "] " + message);
    }
    private void LogWithTime( string message)
    {
        Console.WriteLine( DateTime.Now.ToString("[dd-MM-yyyy HH:mm:ss]") + " " + message);
    }
}