string[] operations = { "-", "+", "*", "/", "%" };

Console.WriteLine("Operatie?(" + string.Join(", ", operations) + ")");
string? input_operation = Console.ReadLine();

if (Array.IndexOf(operations, input_operation) > -1)
{
    Console.WriteLine("Eerste getal?");
    string? input_1 = Console.ReadLine();

    Console.WriteLine("Tweede getal?");
    string? input_2 = Console.ReadLine();

    try
    {
        float getal_1 = float.Parse(input_1);
        float getal_2 = float.Parse(input_2);

        float result;

        switch (input_operation)
        {
            case "+":
                result = getal_1 + getal_2;
                break;
            case "%":
                result = getal_1 % getal_2;
                break;
            case "-":
                result = getal_1 - getal_2;
                break;
            case "*":
                result = getal_1 * getal_2;
                break;
            case "/":
                if (getal_2 != 0)
                    result = getal_1 / getal_2;
                else
                {
                    Console.WriteLine("Kan niet delen door 0");
                    return;
                }

                break;
            default:
                Console.WriteLine("Ongeldige operatie.");
                // This should only be reached if an operation is added to the array, but not to the switch statement.
                return;
        }

        Console.WriteLine("Resultaat:");
        Console.WriteLine(result);
    }
    catch (FormatException)
    {
        Console.WriteLine("Ongeldige invoer voor het eerste of tweede getal.");
    }
}
else
{
    Console.WriteLine("Operatie niet gevonden. Probeer een van de volgende operaties: " +
                      string.Join(", ", operations) + ".");
}