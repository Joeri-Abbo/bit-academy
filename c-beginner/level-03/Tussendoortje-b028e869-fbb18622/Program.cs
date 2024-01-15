Console.WriteLine("Welk getal?");
string? input = Console.ReadLine();
// Check if input is even
if (!string.IsNullOrEmpty(input) && int.TryParse(input, out int getal) && getal % 2 == 0)
{
    Console.WriteLine(input + " is even.");
}
else
{
    Console.WriteLine(input + " is oneven.");
}