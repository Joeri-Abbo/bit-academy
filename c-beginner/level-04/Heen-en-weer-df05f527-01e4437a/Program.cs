Console.Write("Tot welk getal?");
Console.WriteLine();
int getal = Convert.ToInt32(Console.ReadLine());

for (int i = 1; i <= getal; i++)
{
    Console.WriteLine(i);
}

for (int i = getal - 1; i >= 1; i--)
{
    Console.WriteLine(i);
}