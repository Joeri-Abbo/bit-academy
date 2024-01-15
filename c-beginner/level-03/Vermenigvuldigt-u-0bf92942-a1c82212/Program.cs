Console.WriteLine("Eerste getal?");
string input_1 = Console.ReadLine();

Console.WriteLine("Tweede getal?");
string input_2 = Console.ReadLine();

int getal_1 = Convert.ToInt32(input_1);
int getal_2 = Convert.ToInt32(input_2);

int som = getal_1 * getal_2;
Console.WriteLine("Resultaat:");
Console.WriteLine(som);