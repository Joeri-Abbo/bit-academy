int dominiqueStemmen = 0;
int zachariaStemmen = 0;

while (true)
{
    Console.WriteLine("Voer uw stem in (Dominique / Zacharia), of typ 'uitslag' om de stemmen te tellen:");
    string stem = Console.ReadLine().ToLower();

    if (stem == "uitslag")
    {
        Console.WriteLine("Stemmen voor Dominique: " + dominiqueStemmen);
        Console.WriteLine("Stemmen voor Zacharia: " + zachariaStemmen);
        break;
    }

    if (stem == "dominique")
    {
        dominiqueStemmen++;
        Console.WriteLine("U heeft gestemd op Dominique.");
    }
    else if (stem == "zacharia")
    {
        zachariaStemmen++;
        Console.WriteLine("U heeft gestemd op Zacharia.");
    }
    else
    {
        Console.WriteLine("Ongeldige invoer. Probeer het opnieuw.");
    }
}

Console.WriteLine("Bedankt voor het stemmen!");