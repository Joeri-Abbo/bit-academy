using System;

Console.WriteLine("Eerste getal?");
string? input_1 = Console.ReadLine();

Console.WriteLine("Tweede getal?");
string? input_2 = Console.ReadLine();

float getal_1, getal_2;

if (!string.IsNullOrEmpty(input_1) && !string.IsNullOrEmpty(input_2))
{
    getal_1 = float.Parse(input_1);
    getal_2 = float.Parse(input_2);

    if (getal_2 == 0)
    {
        Console.WriteLine("Kan niet delen door 0");
    }
    else
    {
        float som = getal_1 / getal_2;
        Console.WriteLine("Resultaat:");
        Console.WriteLine(som);
    }
}
else
{
    Console.WriteLine("Ongeldige invoer voor het eerste of tweede getal.");
}