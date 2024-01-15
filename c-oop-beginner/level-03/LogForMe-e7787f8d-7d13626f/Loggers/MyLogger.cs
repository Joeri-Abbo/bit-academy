namespace Loggers;

public class MyLogger
{
    private string origin = null;

    public string Origin
    {
        get { return origin; }
    }

    public void SetOrigin(string newOrigin)
    {
        if (origin == null)
        {
            origin = newOrigin;
        }
        else
        {
            throw new InvalidOperationException("Origin can only be set once.");
        }
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
        if (origin != null)
        {
            LogWithTime(level + " [" + origin + "] " + message);
        }
        else
        {
            LogWithTime(level + " " + message);
        }
    }
    private void LogWithTime( string message)
    {
        Console.WriteLine( DateTime.Now.ToString("[dd-MM-yyyy HH:mm:ss]") + " " + message);
    }
}