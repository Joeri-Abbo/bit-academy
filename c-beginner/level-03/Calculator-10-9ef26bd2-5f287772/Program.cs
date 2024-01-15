using System;

string[] operations = { "-", "+", "*", "/" };

Console.WriteLine("Operatie?(" + string.Join(", ", operations) + ")");
string? input_operation = Console.ReadLine();

if (Array.IndexOf(operations, input_operation) > -1)
{
    Console.WriteLine("Eerste getal?");
    string? input_1 = Console.ReadLine();

    Console.WriteLine("Tweede getal?");
    string? input_2 = Console.ReadLine();

    float getal_1, getal_2;

    if (!string.IsNullOrEmpty(input_1) && !string.IsNullOrEmpty(input_2) &&
        float.TryParse(input_1, out getal_1) && float.TryParse(input_2, out getal_2))
    {
        float result;

        switch (input_operation)
        {
            case "+":
                result = getal_1 + getal_2;
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
                    return; // Exit the program
                }

                break;
            default:
                Console.WriteLine("Ongeldige operatie.");
                // This should only be reached if a operation is added to the array, but not to the switch statement.
                return; // Exit the program
        }

        Console.WriteLine("Resultaat:");
        Console.WriteLine(result);
    }
    else
    {
        Console.WriteLine("Ongeldige invoer voor het eerste of tweede getal.");
    }
}
else
{
    Console.WriteLine("Operatie niet gevonden. Probeer een van de volgende operaties: " +
                      string.Join(", ", operations) + ".");
}